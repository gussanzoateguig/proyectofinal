<?php

  require_once 'app/models/ciudad_model.php';


  class ciudad_controller {

    // Consultar listado de ciudades
    public function route_list_ciudad() {

      $parametros = NULL;
      $view       = 'ciudad/vista_ciudad';
      $ciudad = new ciudad_model();


      // Obtenemos todas las ciudades en la base de datos
      $parametros['ciudades'] = $ciudad->getCiudades();

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getCiudadDataById"
    // Consulta datos de una ciudad en específico
    public function getCiudadDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $ciudad     = new ciudad_model();

      $parametros = $ciudad->getCiudadDataById($postData['iCiudad_id']);

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar ciudad"
    // Se agrega / modifica una ciudad
    // A => iCiudad_id == 0
    // M => iCiudad_id != 0
    public function insertar_ciudad($postData) {
      $parametros = NULL;
      $view       = NULL;
      $ciudad = new ciudad_model();

      $parametros = $ciudad->nuevaCiudad($postData);

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar ciudad"
    // Se da de baja a la ciudad en cuestión
    // Guiado por iCiudad_id
    public function eliminar_ciudad($postData) {
      $parametros = NULL;
      $view       = NULL;
      $ciudad = new ciudad_model();

      $parametros = $ciudad->eliminarCiudad($postData);

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
