<?php

  require_once 'app/models/stock_model.php';
  require_once 'app/models/producto_model.php';
  require_once 'app/models/sucursal_model.php';

  class stock_controller {

    // Consultar listado de stock
    public function route_list_stock() {
      $parametros = NULL;
      $view       = 'stock/vista_stock';
      $stock = new stock_model();
      $producto = new producto_model();
      $sucursal = new sucursal_model();
      // Obtenemos todas los stock en la base de datos
      $parametros['stocks'] = $stock->getStocks();
      $parametros['productos'] = $producto->getProductos();
      $parametros['sucursales'] = $sucursal->getSucursales();

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getStockDataById"
    // Consulta datos de un stock en específico
    public function getStockDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $stock     = new stock_model();

      $parametros = $stock->getStockDataById($postData['iStock_id']);

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar stock"
    // Se agrega / modifica un stock
    // A => iStock_id == 0
    // M => iStock_id != 0
    public function insertar_stock($postData) {
      $parametros = NULL;
      $view       = NULL;
      $stock = new stock_model();
      $parametros = $stock->nuevoStock($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar Stock"
    // Se da de baja al Stock en cuestión
    // Guiado por iStock_id
    public function eliminar_Stock($postData) {
      $parametros = NULL;
      $view       = NULL;
      $stock = new stock_model();
      $parametros = $stock->eliminarStock($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
