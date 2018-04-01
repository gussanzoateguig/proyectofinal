<?php

  require_once 'system/classes/PDO.php';

  class usuario_model {

    // Verifica si el usuario en cuestión existe
    // SOLAMENTE EL NOMBRE DE USUARIO
    // Parámetros:
    // - sUsuario_nombre = Nombre de Usuario
    // Devuelve objeto 'fw_usuarios' o false
    public function usuarioExiste($sUsuario_nombre) {
      $database = new database();
      $db = $database->getConnection();

      $query = $db->prepare('SELECT * FROM fw_usuarios WHERE sUsuario_nombre = :sUsuario_nombre');
      $query->bindParam(':sUsuario_nombre', $sUsuario_nombre, PDO::PARAM_STR);
      $query->execute();

      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Verifica TODOS los roles del usuario
    // Parámetros
    // - iUsuario_id = ID del usuario en cuestión
    // Devuelve Array conteniendo todos los ID's de
    // los roles que tiene el usuario en tabla 'fw_detalle_usuarios_roles'
    // o false
    public function getUsuarioRoles($iUsuario_id) {
      $database = new database();
      $db = $database->getConnection();

      $query = $db->prepare('SELECT * FROM fw_detalle_usuarios_roles WHERE iUsuario_id = :iUsuario_id');
      $query->bindParam(':iUsuario_id', $iUsuario_id, PDO::PARAM_INT);
      $query->execute();

      $result = NULL;

      if ($query->rowCount() > 0) {
        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
          $result[] = $data->iRol_id;
        }
        return $result;
      } else {
        return false;
      }
    }

  }

?>
