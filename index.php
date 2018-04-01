<?php

  // Cambiar idioma de las fechas en php
  // OJO: cambiar de acuerdo al comando
  // 'locale -a' en terminal
  setlocale(LC_ALL, 'es_BO.utf8');

  // Incluir la carga automática de archivos
  // que declaran constantes globales
  require_once 'autoload.php';

  // Incluir el modelo usuario, con el objetivo
  // de conocer los roles actuales del usuario logueado
  require_once 'app/models/usuario_model.php';
  $usuario_model = new usuario_model();

  // Incluir el modelo de módulos y menus, para
  // lograr dibujar los menus de acuerdo a los roles
  require_once 'app/models/modulo_model.php';
  $modulo_model = new modulo_model();
  $sidebar = NULL;

  // Inicializamos sesión
  session_name(SESSION_PREFIX.APP_NAME);
  session_start();
  // Inicializamos lectura de contenido
  // y tiempo de ejecución
  $tiempo_ejecucion = microtime(true);

  ob_start();

  // Declaramos variables de controlador y vistas
  $controlador = NULL;
  if (isset($_GET['controlador'])) {
    $controlador = $_GET['controlador'];
  }
  $vista = NULL;
  if (isset($_GET['vista'])) {
    $vista       = $_GET['vista'];
  }

  // CASO:
  // - No se especifica vista ni controlador
  // - Se especifica controlador pero no vista
  //   RESULTADO: mandar a página default del sistema
  if ( (is_null($vista) && is_null($controlador)) || (is_null($vista) && !is_null($controlador)) ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.SYSTEM_DEFAULT_CONTROLLER.'/'.SYSTEM_DEFAULT_VIEW.'/');
  }

  // CASO:
  // - ¿Existe controlador?
  if (file_exists('app/controllers/'.$controlador.'_controller.php')) {

    require_once 'app/controllers/'.$controlador.'_controller.php';
    $class = $controlador.'_controller';

    // CASO:
    // - ¿Existe la clase "CONTROLADOR_CONTROLLER"?
    if (class_exists($class)) {
      $controller_class = new $class();

      // CASO:
      // - ¿Existe vista?
      if (method_exists($controller_class, $vista)) {

        // CASO:
        // - ¿Está mandando request?
        // Respuesta: se ejecuta función con parámetros
        //            caso contrario, se ejecuta función con nada
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $view = $controller_class->$vista($_POST);
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $view = $controller_class->$vista($_GET);
        } else {
            $view = $controller_class->$vista();
        }

        $parametros = $view['parametros'];
      } else {
        $view = array(
          'parametros'  => array(),
          'view'        => 'errors/404',
          'viewType'    => 'estatica'
        );
      }
    } else {
      $view = array(
        'parametros'  => array(),
        'view'        => 'errors/404',
        'viewType'    => 'estatica'
      );
    }

  } else {
    $view = array(
      'parametros'  => array(),
      'view'        => 'errors/404',
      'viewType'    => 'estatica'
    );
  }

  // CASO:
  // Si es AJAX, solamente imprimir json_encode
  // caso contrario, se imprime la vista en sí
  if ($view['viewType'] === 'AJAX') {
    echo json_encode($parametros);
  } else {
    // CASO:
    // - ¿Está logueado al sistema?
    //   CASO NO: Mostrar vista de login, luego
    //   de loguear mandar a la página en cuestión
    if (!array_key_exists('logueado', $_SESSION)) {

      if (!($controlador == LOGIN_PAGE_CONTROLLER && $vista == LOGIN_PAGE_VIEW)) {
        if ($view['viewType'] !== 'estatica') {
          header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.LOGIN_PAGE_CONTROLLER.'/'.LOGIN_PAGE_VIEW.'/');
        }
      }

    } else {
      if ($controlador == LOGIN_PAGE_CONTROLLER && $vista == LOGIN_PAGE_VIEW) {
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.SYSTEM_DEFAULT_CONTROLLER.'/'.SYSTEM_DEFAULT_VIEW.'/');
      }

      if ($view['viewType'] !== 'estatica') {
        // CASO:
        // ¿Existe el menú en el que se encuentra?
        // Respuesta SI: Siguiente CASO:
        // - ¿Qué roles pueden acceder al menú?
        // Caso contrario, error 404
        $menuData = $modulo_model->getMenuDataByURL($controlador.'/'.$vista.'/');
        if ($menuData === false) {
          $view = array(
            'parametros'  => array(),
            'view'        => 'errors/404',
            'viewType'    => 'estatica'
          );
        } else {
          // CASO:
          // ¿Qué roles pueden acceder al menú?
          // Respuesta SI: Verifica los roles con los actuales del usuario_model
          // caso contrario, te manda error 403
          $rolesMenu = $modulo_model->getMenuRoles($menuData->iMenu_id);

          // Si no existen roles para el menú
          if ($rolesMenu === false) {
            $view = array(
              'parametros'  => array(),
              'view'        => 'errors/403',
              'viewType'    => 'estatica'
            );
          } else {
            // Código si existe el menú
            // Consulto los roles del usuario
            $rolesUsuario = $usuario_model->getUsuarioRoles($_SESSION['iUsuario_id']);

            // CASO:
            // ¿Existen roles del usuario?
            // Respuesta SI: Siguiente CASO
            // Caso contrario: error 403
            if ($rolesUsuario === false) {
              $view = array(
                'parametros'  => array(),
                'view'        => 'errors/403',
                'viewType'    => 'estatica'
              );
            } else {
              // Verifico si los roles del usuario están en los roles de menú
              // Caso contrario, error 403
              if (count(array_intersect($rolesUsuario, $rolesMenu)) === 0) {
                $view = array(
                  'parametros'  => array(),
                  'view'        => 'errors/403',
                  'viewType'    => 'estatica'
                );
              }
            }
          }
        }

        // Listado de módulos del sistema
        // Todos los módulos y menus se guardarán
        // de la siguiente manera:
        // sidebar =
        //  - [0] -
        //        - data:
        //        - - OBJETO 'fw_modulos'
        //        - menus:
        //        - - array de OBJETO 'fw_menus'
        $listaModulos = $modulo_model->getModulos();
        if ($listaModulos != false) {
          foreach ($listaModulos as $modulo) {

            //Listamos todos los menus
            $listaMenus = $modulo_model->getMenusEnModulo($modulo->iModulo_id);
            $arrayMenus = NULL;
            // CASO:
            // ¿Hay menús en módulo?
            // Respuesta SI:
            // - los agrego al módulo
            // Respuesta NO:
            // - No hay módulo
            if ($listaMenus != false) {
              $sidebar[] = array(
              'data'  => $modulo,
              'menus' => $listaMenus
              );
            }

          }
        }
      }
    }
    require_once 'app/views/'.$view['view'].'.php';
  }


  // Declaramos contenido
  $contenido = ob_get_contents();

  ob_end_clean();

  //Reiniciamos objeto de contenido para el view (ADDONS)
  ob_start();

  // CASO:
  // - ¿Tiene archivo addons?
  //   RESULTADO: si tiene, se agrega al código
  if (file_exists('app/views/'.$view['view'].'.addons.php')) {
      // Se agregan los parámetros de la vista
      require_once 'app/views/'.$view['view'].'.addons.php';
  }

  // Declaramos 'footer'
  $addons = ob_get_contents();

  ob_end_clean();

  //Reiniciamos objeto de contenido para el view (javascript)
  ob_start();

  // CASO:
  // - ¿Tiene archivo javascript?
  //   RESULTADO: si tiene, se agrega al código
  if (file_exists('app/views/'.$view['view'].'.javascript.php')) {
      // Se agregan los parámetros de la vista
      require_once 'app/views/'.$view['view'].'.javascript.php';
  }

  // Declaramos 'footer'
  $footer = ob_get_contents();

  ob_end_clean();

  // Guardamos tiempo de ejecución
  $tiempo_ejecucion = (microtime(true) - $tiempo_ejecucion);

  // CASO:
  // ¿Es vista normal?
  if (!is_null($view)) {
    // Si es vista normal
    // else if - Si es vista estática o AJAX
    //         - - Se imprime su contenido
    if (is_null($view['viewType']) || $view['viewType'] == 'vista') {
      include 'public/templates/'.APP_LAYOUT.'/template.php';
    } else if ($view['viewType'] == 'estatica' || $view['viewType'] == 'AJAX') {
      echo $contenido;
      echo $footer;
    }
  }


?>
