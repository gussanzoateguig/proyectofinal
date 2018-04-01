<?php

  require_once 'app/models/orden_pedido_model.php';

  class orden_pedido_controller {
    // Consultar listado de ordenes de pedido
    public function route_list_orden_pedido() {
      $parametros = NULL;
      $view       = 'ordenpedido/vista_orden_pedido';
      $orden_pedido = new orden_pedido_model();
      // Obtenemos todas las ordenes_pedido en la base de datos
      $parametros['ordenes'] = $orden_pedido->getOrden_pedido();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }
    public function route_list_orden_pedidoPDF($postData) {
      $parametros = NULL;
      $view       = 'ordenpedido/vista_detalle_pedido';
      $orden_pedido = new orden_pedido_model();
      // Obtenemos todas las ordenes_pedido en la base de datos
      $parametros['detalles'] = $orden_pedido->getDetalle_pedido($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'estatica'
      );
    }

    public function getDetalle_pedido($postData)
    {
      $parametros = NULL;
      $view       = NULL;
      $orden_pedido = new orden_pedido_model();
      // Obtenemos todas las ordenes_pedido en la base de datos
      $parametros = $orden_pedido->getDetalle_pedido($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

    // Ruta "getOrden_pedidoDataById"
    // Consulta datos de una orden de pedido en específico
    public function getOrden_pedidoDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $orden_pedido  = new orden_pedido_model();
      $parametros = $orden_pedido->getOrden_pedidoDataById($postData['iOrden_pedido_id']);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar orden_pedido"
    // Se agrega / modifica una orden_pedido
    // A => iOrden_pedido_id == 0
    // M => iOrden_pedido_id != 0
    public function insertar_orden_pedido($postData) {
      $parametros = NULL;
      $view       = NULL;
      $orden_pedido = new orden_pedido_model();
      $parametros = $orden_pedido->nuevaOrden_pedido($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminarOrden_pedido"
    // Se da de baja a la orden de pedido en cuestión
    // Guiado por iOrden_pedido_id
    public function eliminar_orden_pedido($postData) {
      $parametros = NULL;
      $view       = NULL;
      $orden_pedido = new orden_pedido_model();
      $parametros = $orden_pedido->eliminarOrden_pedido($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
