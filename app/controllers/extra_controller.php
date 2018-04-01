<?php

  require_once 'app/models/extra_model.php';
  class extra_controller {
    // Consultar listado de extras
    public function route_list_extra() {
      $parametros = NULL;
      $view       = 'extra/vista_extra';
      $extra = new extra_model();
      // Obtenemos todas los extras en la base de datos
      $parametros['extras'] = $extra->getExtras();
      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );
    }

    }

?>
