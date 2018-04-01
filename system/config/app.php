<?php

  /************************************/
  /*  CONFIGURACIÓN DE LA APLICACIÓN  */
  /************************************/

  // NOMBRE DE LA APLICACIÓN

  $config['app']['app_name'] = 'frameworkphp';

  // LAYOUT DE LA APLICACIÓN

  $config['app']['app_layout'] = 'adminhero';

  // PREFIJO DE LA SESIÓN
  // - Usado para evitar que al loguear en un sistema pueda loguear en
  //   todos los sistemas de la empresa.

  $config['app']['session_prefix'] = 'fti_';

  // CONTROLADOR Y VISTA DEFAULT DEL SISTEMA
  // - ALERTA -
  // ¡La vista debe de poder ser accesada por cualquier rol!

  $config['app']['default_controller'] = 'usuario';
  $config['app']['default_view'] = 'home';

  // PÁGINA DE LOGIN

  $config['app']['login_page_controller'] = 'usuario';
  $config['app']['login_page_view'] = 'login';


  /*********************************/
  /*     ERRORES DE FORMULARIO     */
  /*********************************/

  $config['app']['form_errors'] = array(
    'USER_NOT_EXISTS'           => 'Lo siento pero el usuario no existe.',
    'USER_PASSWORD_NOT_CORRECT' => 'Lo siento pero la contraseña es incorrecta.'
  );

  /**************************************************/
  /*  DECLARACIÓN DE VARIABLES GLOBALES (NO TOCAR)  */
  /**************************************************/

  DEFINE('SESSION_PREFIX', $config['app']['session_prefix']);
  DEFINE('APP_NAME', $config['app']['app_name']);
  DEFINE('APP_LAYOUT', $config['app']['app_layout']);

  DEFINE('SYSTEM_DEFAULT_CONTROLLER', $config['app']['default_controller']);
  DEFINE('SYSTEM_DEFAULT_VIEW', $config['app']['default_view']);
  DEFINE('LOGIN_PAGE_CONTROLLER', $config['app']['login_page_controller']);
  DEFINE('LOGIN_PAGE_VIEW', $config['app']['login_page_view']);

  DEFINE('FORM_ERRORS', $config['app']['form_errors']);

?>
