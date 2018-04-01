<?php

  require_once 'app/models/categoria_model.php';

  class categoria_controller {
    // Consultar listado de marcas
    public function route_list_categoria() {
      $parametros = NULL;
      $view       = 'categoria/vista_categoria';
      $categoria = new categoria_model();
      // Obtenemos todas las ciudades en la base de datos
      $parametros['categorias'] = $categoria->getCategorias();

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getCategoriaDataById"
    // Consulta datos de una categoria en específico
    public function getCategoriaDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $categoria     = new categoria_model();
      $parametros = $categoria->getCategoriaDataById($postData['iCategoria_id']);

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }
    

    // Ruta "insertar categoria"
    // Se agrega / modifica una categoria
    // A => iCategoria_id == 0
    // M => iCategoria_id != 0
    public function insertar_categoria($postData) {
      $parametros = NULL;
      $view       = NULL;
      $categoria = new categoria_model();
      $parametros = $categoria->nuevaCategoria($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar Categoria"
    // Se da de baja a la categoria en cuestión
    // Guiado por iCategoria_id
    public function eliminar_categoria($postData) {
      $parametros = NULL;
      $view       = NULL;
      $categoria = new categoria_model();
      $parametros = $categoria->eliminarCategoria($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }
  }

?>
