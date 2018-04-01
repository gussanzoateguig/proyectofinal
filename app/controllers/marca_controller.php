<?php

  require_once 'app/models/marca_model.php';

  class marca_controller {

    // Consultar listado de marcas
    public function route_list_marca() {
      $parametros = NULL;
      $view       = 'marca/vista_marca';
      $marca = new marca_model();
      // Obtenemos todas las ciudades en la base de datos
      $parametros['marcas'] = $marca->getMarcas();

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getMarcaDataById"
    // Consulta datos de una marca en específico
    public function getMarcaDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $marca     = new marca_model();

      $parametros = $marca->getMarcaDataById($postData['iMarca_id']);

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar marca"
    // Se agrega / modifica una marca
    // A => iMarca_id == 0
    // M => iMarca_id != 0
    public function insertar_marca($postData) {
      $parametros = NULL;
      $view       = NULL;
      $marca = new marca_model();
      $parametros = $marca->nuevaMarca($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar Marca"
    // Se da de baja a la marca en cuestión
    // Guiado por iMarca_id
    public function eliminar_marca($postData) {
      $parametros = NULL;
      $view       = NULL;
      $marca = new marca_model();
      $parametros = $marca->eliminarMarca($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
