<?php

  // Agregar modelo noticias
  require_once 'app/models/noticia_model.php';
  // Agregar modelo usuario
  require_once 'app/models/usuario_model.php';

  class usuario_controller {

    // Página principal del usuario
    // Se mostrarán todas las noticias del sistema
    public function home() {

      $parametros = NULL;
      $view       = 'usuario/home';

      $model = new noticia_model();

      // Consulto todas las noticias
      $parametros['noticias'] = $model->getNoticias();

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'vista'
      );

    }

    // Función verificar si el usuario existe
    public function ajax_usuarioExiste($postData) {

      $parametros = NULL;
      $view       = NULL;

      $model = new usuario_model();

      $usuarioExiste = $model->usuarioExiste($postData['sUsuario_nombre']);

      // CASO:
      // ¿nombre de usuario existe?
      // Respuesta: en caso NO, mostrar error
      //            en caso SI, verificar si la contraseña es correcta
      if ($usuarioExiste == false) {
        $parametros['errores'][] = FORM_ERRORS['USER_NOT_EXISTS'];
      } else {
        // CASO:
        // ¿Contraseñas son iguales?
        // Respuesta: en caso NO, mostrar error
        //            en caso SI, loguear al sistema
        if (!password_verify($postData['sUsuario_contrasena'], $usuarioExiste->sUsuario_password)) {
          $parametros['errores'][] = FORM_ERRORS['USER_PASSWORD_NOT_CORRECT'];
        } else {
          $_SESSION['iUsuario_id'] = $usuarioExiste->iUsuario_id;
          $_SESSION['sUsuario_nombre'] = $usuarioExiste->sUsuario_nombre;
          $_SESSION['logueado'] = TRUE;
        }
      }

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'AJAX'
      );

    }

    // Página de login (Formulario)
    public function login() {

      $parametros = NULL;
      $view       = 'usuario/login';

      return array(
        'parametros'  => $parametros,
        'view'        => $view,
        'viewType'    => 'estatica'
      );

    }

    // Terminar la sesión
    public function logout() {

      $_SESSION = array();

      if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
          );
      }

      session_destroy();
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/usuario/login/');

      return($this->login());

    }

  }

?>
