<?php

  require_once 'app/models/foto_model.php';

  class foto_controller {

    // Consultar listado de fotos
    public function route_list_FotoProducto($postData) {
      $parametros = NULL;
      $view       = NULL;
      $foto = new foto_model();
      // Obtenemos todas las fotos del producto en la base de datos
      $parametros = $foto->getFotoProducto($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }


    // Ruta "insertar foto"
    // Se agrega / modifica una foto
    // A => iFoto_id == 0
    // M => iFoto_id != 0
    public function insertar_foto($postData) {
      $parametros = NULL;
      $view       = NULL;
      $foto = new foto_model();
      $parametros = $foto->nuevaFoto($postData);
      //crea en el directorio del sistema una carpeta con el nombre del producto en donde se almacenara la imagen
      if (is_dir('public/templates/img/'.$postData['iProducto_id']) === false) {
        mkdir('public/templates/img/'.$postData['iProducto_id']);
      }

      if (move_uploaded_file($_FILES['file']['tmp_name'], 'public/templates/img/'.$postData['iProducto_id'].'/'.$_FILES['file']['name'])) {
        $postData['sFoto_url'] = 'public/templates/img/'.$postData['iProducto_id'].'/'.$_FILES['file']['name'];
        $foto->nuevaFoto($postData);
      }

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar Foto"
    // Se da de baja a la foto en cuestión
    // Guiado por iFoto_id
    public function eliminar_foto($postData) {
      $parametros = NULL;
      $view       = NULL;
      $foto = new foto_model();
      $parametros = $foto->eliminarFoto($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
