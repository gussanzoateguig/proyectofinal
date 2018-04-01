<?php

  require_once 'app/models/proveedor_model.php';

  class proveedor_controller {

    // Consultar listado de proveedores
    public function route_list_proveedor() {

      $parametros = NULL;
      $view       = 'proveedor/vista_proveedor';
      $proveedor = new proveedor_model();
      // Obtenemos todas los proveedores en la base de datos
      $parametros['proveedores'] = $proveedor->getProveedores();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getProveedorDataById"
    // Consulta datos de un proveedor en específico
    public function getProveedorDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $proveedor     = new proveedor_model();
      $parametros = $proveedor->getProveedorDataById($postData['iProveedor_id']);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar proveedor"
    // Se agrega / modifica un proveedor
    // A => iProveedor_id == 0
    // M => iProveedor_id != 0
    public function insertar_proveedor($postData) {
      $parametros = NULL;
      $view       = NULL;
      $proveedor = new proveedor_model();
      $parametros = $proveedor->nuevoProveedor($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar proveedor"
    // Se da de baja al proveedor en cuestión
    // Guiado por iProveedor_id
    public function eliminar_proveedor($postData) {
      $parametros = NULL;
      $view       = NULL;
      $proveedor = new proveedor_model();
      $parametros = $proveedor->eliminarProveedor($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
