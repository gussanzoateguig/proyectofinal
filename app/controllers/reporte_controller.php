<?php

  require_once 'app/models/producto_model.php';

  
  class reporte_controller {

    // Consultar listado de productos
    public function route_list_producto() {
      $parametros = NULL;
      $view       = 'reporte/vista_reporte_producto';
      $producto = new producto_model();
      // Obtenemos todas las ciudades en la base de datos
      $parametros['productos'] = $producto->getProductos();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getProductoDataById"
    // Consulta datos de una marca en específico
    public function getProductoDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $producto     = new producto_model();

      $parametros = $producto->getProductoDataById($postData['iProducto_id']);

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }


  }

?>
