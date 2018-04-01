<?php

  require_once 'system/classes/PDO.php';

  class modulo_model {

    // Consulta de todos los módulos existentes
    // Devuelve array de objetos 'fw_modulos' o false
    public function getModulos() {
      $database = new database();
      $db = $database->getConnection();

      $query = $db->prepare('SELECT * FROM fw_modulos ORDER BY iModulo_orden ASC');
      $query->execute();

      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Consulta de todos los menus existentes
    // de un módulo
    // Parámetros
    // - iModulo_id = ID del módulo en cuestión
    // Devuelve array de objetos 'fw_menus' o false
    public function getMenusEnModulo($iModulo_id) {
      $database = new database();
      $db = $database->getConnection();

      $query = $db->prepare('SELECT * FROM fw_menus WHERE iModulo_id = :iModulo_id ORDER BY iMenu_orden ASC');
      $query->bindParam(':iModulo_id', $iModulo_id, PDO::PARAM_INT);
      $query->execute();

      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Consulta de los roles del menú
    // Parámetros
    // - iMenu_id = ID del menú en cuestión
    // Devuelve array de roles del menú o false
    public function getMenuRoles($iMenu_id) {
      $database = new database();
      $db = $database->getConnection();

      $query = $db->prepare('SELECT * FROM fw_detalle_menu_roles WHERE iMenu_id = :iMenu_id');
      $query->bindParam(':iMenu_id', $iMenu_id, PDO::PARAM_INT);
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

    // Consulta si menú existe por URL
    // Parámetros
    // - sMenu_url = URL del menú en cuestión
    // Devuelve objeto 'fw_menus' o false
    public function getMenuDataByURL($sMenu_url) {
      $database = new database();
      $db = $database->getConnection();

      $query = $db->prepare('SELECT * FROM fw_menus WHERE sMenu_url = :sMenu_url');
      $query->bindParam(':sMenu_url', $sMenu_url, PDO::PARAM_STR);
      $query->execute();

      if ($query->rowCount() > 0) {
        return $query->fetch(PDO::FETCH_OBJ);
      } else {
        return false;
      }
    }


  }

?>
