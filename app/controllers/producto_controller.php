<?php
  require_once 'app/models/producto_model.php';
  require_once 'app/models/marca_model.php';
  require_once 'app/models/categoria_model.php';
  class producto_controller {
    // Consultar listado de productos
    public function route_list_producto() {
      $parametros = NULL;
      $view       = 'producto/vista_producto';
      $producto = new producto_model();
      $marca = new marca_model();
      $categoria = new categoria_model();
      // Obtenemos todas los proveedores en la base de datos
      $parametros['productos'] = $producto->getProductos();
      $parametros['marcas'] = $marca->getMarcas();
      $parametros['categorias'] = $categoria->getCategorias();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }
    // Ruta "getProductoDataById"
    // Consulta datos de un producto en específico
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
    // Ruta "insertar producto"
    // Se agrega / modifica un producto
    // A => iProducto_id == 0
    // M => iProducto_id != 0
    public function insertar_producto($postData) {
      $parametros = NULL;
      $view       = NULL;
      $producto = new producto_model();
      $parametros = $producto->nuevoProducto($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar producto"
    // Se da de baja al producto en cuestión
    // Guiado por iProducto_id
    public function eliminar_producto($postData) {
      $parametros = NULL;
      $view       = NULL;
      $producto = new producto_model();
      $parametros = $producto->eliminarProducto($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
