<?php

  require_once 'app/models/venta_model.php';
  require_once 'app/models/orden_pedido_model.php';
  require_once 'app/models/pais_model.php';

  class venta_controller {

    // Consultar listado de ventas
    public function route_list_venta() {
      $parametros = NULL;
      $view       = 'venta/vista_venta';
      $venta = new venta_model();
      $orden_pedido = new orden_pedido_model();
      $pais = new pais_model();
      // Obtenemos todas las ventas en la base de datos
      $parametros['ventas'] = $venta->getVentas();
      $parametros['ordenes'] = $orden_pedido->getOrden_pedido();
      $parametros['paises'] = $pais->getPaises();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getVentaDataById"
    // Consulta datos de una venta en específico
    public function getVentaDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $venta     = new venta_model();
      $parametros = $venta->getVentaDataById($postData['iVenta_id']);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar venta"
    // Se agrega / modifica una venta
    // A => iVenta_id == 0
    // M => iVenta_id != 0
    public function insertar_venta($postData) {
      $parametros = NULL;
      $view       = NULL;
      $venta = new venta_model();
      $parametros = $venta->nuevaVenta($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar Venta"
    // Se da de baja a la venta en cuestión
    // Guiado por iVenta_id
    public function eliminar_venta($postData) {
      $parametros = NULL;
      $view       = NULL;
      $venta = new venta_model();
      $parametros = $venta->eliminarVenta($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
