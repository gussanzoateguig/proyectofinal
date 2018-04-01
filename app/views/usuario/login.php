<!DOCTYPE html>
<html lang="es">

<head>
  <title>Matrix Admin</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../public/templates/matrix/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../public/templates/matrix/css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../../public/templates/matrix/css/matrix-login.css" />
  <link href="../../public/templates/matrix/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
  <div id="loginbox">
    <form id="loginform" class="form-vertical">
      <div class="control-group normal_text">
        <h3>
          <img src="img/logo.png" alt="Logo" />
        </h3>
      </div>
      <div class="alert alert-error fade in not-visible" id="loginErroresBox">
        <strong><i class="icon icon-info-sign"></i> Advertencia: </strong> se han encontrado los siguientes errores:
        <ul id="loginErrores">
        </ul>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="main_input_box">
            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input name="sUsuario_nombre" type="text" placeholder="Nombre de usuario" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="main_input_box">
            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="sUsuario_contrasena" type="password" placeholder="Contraseña" />
          </div>
        </div>
      </div>
      <div class="text-center">
        <small>Desarrollado por <a href="http://ftinventions.com/" target="_blank"><b>Future Technology Inventions SRL</b></a></small>
      </div>
      <div class="form-actions">
        <span class="pull-left"><a class="flip-link btn btn-info" id="to-recover">Recupera tu cuenta</a></span>
        <span class="pull-right"><a class="btn btn-success" onclick="$('#loginform').submit()" /> Acceder</a></span>
      </div>
    </form>

    <form id="recoverform" class="form-vertical">
      <p class="normal_text">
        Ingresa tu correo electrónico a continuación, te enviaremos un correo con instrucciones para recuperar tu cuenta.
      </p>

      <div class="controls">
        <div class="main_input_box">
          <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input name="sUsuario_correo" type="text" placeholder="Correo electrónico" />
        </div>
      </div>

      <div class="form-actions">
        <span class="pull-left"><a class="flip-link btn btn-success" id="to-login">&laquo; Volver</a></span>
        <span class="pull-right"><a class="btn btn-info"/>Recuperar</a></span>
      </div>
    </form>
  </div>

  <script src="../../public/templates/matrix/js/jquery.min.js"></script>
  <script src="../../public/templates/matrix/js/bootstrap.js"></script>
</body>

</html>
