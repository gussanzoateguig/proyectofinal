<?php

  require_once 'app/models/catalogo_model.php';
  require_once 'app/models/producto_model.php';
  require_once 'app/models/proveedor_model.php';

  class catalogo_controller {

    // Consultar listado de catalogo
    public function route_list_catalogo() {
      $parametros = NULL;
      $view       = 'catalogo/vista_catalogo';
      $catalogo = new catalogo_model();
      $producto = new producto_model();
      $proveedor = new proveedor_model();
      // Obtenemos todas los catalogos en la base de datos
      $parametros['catalogos'] = $catalogo->getCatalogos();
      $parametros['productos'] = $producto->getProductos();
      $parametros['proveedores'] = $proveedor->getProveedores();

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    // Ruta "getCatalogoDataById"
    // Consulta datos de un catalogo en específico
    public function getCatalogoDataById($postData) {
      $parametros = NULL;
      $view       = NULL;
      $catalogo     = new catalogo_model();
      $parametros = $catalogo->getCatalogoDataById($postData['iCatalogo_id']);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "insertar catalogo"
    // Se agrega / modifica un catalogo
    // A => iCatalogo_id == 0
    // M => iCatalogo_id != 0
    public function insertar_catalogo($postData) {
      $parametros = NULL;
      $view       = NULL;
      $catalogo = new catalogo_model();
      $parametros = $catalogo->nuevoCatalogo($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

    // Ruta "eliminar catalogo"
    // Se da de baja al catalogo en cuestión
    // Guiado por iCatalogo_id
    public function eliminar_Catalogo($postData) {
      $parametros = NULL;
      $view       = NULL;
      $catalogo = new catalogo_model();
      $parametros = $catalogo->eliminarCatalogo($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

  }

?>
