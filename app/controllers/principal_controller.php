<?php

  require_once 'app/models/categoria_model.php';
  require_once 'app/models/marca_model.php';
  require_once 'app/models/producto_model.php';


  class principal_controller {

    // muestra la pagina principal de la pagina web
    public function route_list_principal() {

      $parametros = NULL;
      $view       = 'principal/vista_principal';
      $categoria = new categoria_model();
      $marca = new marca_model();
      $producto = new producto_model();
      // Obtenemos todas las categorias en la base de datos
      $parametros['categorias'] = $categoria->getCategorias();
      $parametros['marcas'] = $marca->getMarcas();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'estatica'
      );
    }
    public function getProductoMarcaCategoria($postData){
      $parametros = NULL;
      $view       = NULL;
      $producto = new producto_model();
      // Obtenemos todas las categorias en la base de datos
      $parametros = $producto->getProductoMarcaCategoria($postData);
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );
    }

  }

?>
