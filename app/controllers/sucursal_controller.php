<?php

  require_once 'app/models/sucursal_model.php';
  require_once 'app/models/ciudad_model.php';


  class sucursal_controller {

    // Consultar listado de sucursales
    public function route_list_sucursal() {

      $parametros = NULL;
      $view       = 'sucursal/vista_sucursal';
      $sucursal = new sucursal_model();
      $ciudad = new ciudad_model();


      // Obtenemos todas las sucursales en la base de datos
      $parametros['sucursales'] = $sucursal->getSucursales();
      $parametros['ciudades'] = $ciudad->getCiudades();

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getSucursalDataById"
    // Consulta datos de una sucursal en específico
    public function getSucursalDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $sucursal     = new sucursal_model();
      $parametros = $sucursal->getSucursalDataById($postData['iSucursal_id']);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar sucursal"
    // Se agrega / modifica una sucursal
    // A => iSucursal_id == 0
    // M => iSucursal_id != 0
    public function insertar_sucursal($postData) {
      $parametros = NULL;
      $view       = NULL;
      $sucursal = new sucursal_model();
      $parametros = $sucursal->nuevaSucursal($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar sucursal"
    // Se da de baja a la ciudad en cuestión
    // Guiado por iSucursal_id
    public function eliminar_sucursal($postData) {
      $parametros = NULL;
      $view       = NULL;
      $sucursal = new sucursal_model();
      $parametros = $sucursal->eliminarSucursal($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
