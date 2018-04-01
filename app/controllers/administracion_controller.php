<?php

  // Agregar modelo noticias
  require_once 'app/models/noticia_model.php';

  class administracion_controller {

    /****************************/
    /*  INICIO ABM DE NOTICIAS  */
    /****************************/

    // Listado de noticias para ABM
    public function noticias() {

      $parametros = NULL;
      $view       = 'administracion/noticias/lista';

      $model = new noticia_model();

      $parametros['noticias'] = $model->getNoticias();

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );

    }

    // Redactar nueva noticia
    public function nuevaNoticia($postData) {

      $parametros = NULL;
      $view       = NULL;

      $model = new noticia_model();

      $parametros = $model->nuevaNoticia($postData);

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

    /****************************/
    /*  FINAL: ABM DE NOTICIAS  */
    /****************************/

  }

?>
