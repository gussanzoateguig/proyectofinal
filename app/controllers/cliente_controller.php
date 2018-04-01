<?php

  require_once 'app/models/cliente_model.php';

  class cliente_controller {

    // Consultar listado de clientes
    public function route_list_cliente() {

      $parametros = NULL;
      $view       = 'cliente/vista_cliente';
      $cliente = new cliente_model();
      // Obtenemos todas los clientes en la base de datos
      $parametros['clientes'] = $cliente->getClientes();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getClienteDataById"
    // Consulta datos de un Cliente en específico
    public function getClienteDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $cliente     = new cliente_model();
      $parametros = $cliente->getClienteDataById($postData['iCliente_id']);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar Cliente"
    // Se agrega / modifica un cliente
    // A => iCliente_id == 0
    // M => iCliente_id != 0
    public function insertar_cliente($postData) {
      $parametros = NULL;
      $view       = NULL;
      $cliente = new cliente_model();
      $parametros = $cliente->nuevoCliente($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar cliente"
    // Se da de baja al cliente en cuestión
    // Guiado por iCliente_id
    public function eliminar_cliente($postData) {
      $parametros = NULL;
      $view       = NULL;
      $cliente = new cliente_model();
      $parametros = $cliente->eliminarCliente($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
