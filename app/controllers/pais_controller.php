<?php

  require_once 'app/models/pais_model.php';
  class pais_controller {
    // Consultar listado de paises
    public function route_list_pais() {
      $parametros = NULL;
      $view       = 'pais/vista_pais';
      $pais = new pais_model();
      // Obtenemos todas los paises en la base de datos
      $parametros['paises'] = $pais->getPaises();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getPaisDataById"
    // Consulta datos de un pais en específico
    public function getPaisDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $pais     = new pais_model();
      $parametros = $pais->getCiudadDataById($postData['iPais_id']);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar pais"
    // Se agrega / modifica un pais
    // A => iPais_id == 0
    // M => iPais_id != 0
    public function insertar_pais($postData) {
      $parametros = NULL;
      $view       = NULL;
      $pais = new pais_model();
      $parametros = $pais->nuevoPais($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar pais"
    // Se da de baja al pais en cuestión
    // Guiado por iPais_id
    public function eliminar_pais($postData) {
      $parametros = NULL;
      $view       = NULL;
      $pais = new pais_model();
      $parametros = $pais->eliminarPais($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }
  }

?>
