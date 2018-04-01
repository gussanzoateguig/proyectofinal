<?php

  require_once 'system/classes/PDO.php';

  class marca_model {

    // Consulta datos de una marca por su ID
    // Devuelve objeto "marca"
    // o falso si no existen resultados
    public function getMarcaDataById($iMarca_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT * FROM marca WHERE iMarca_id = :iMarca_id');
      $query->bindParam(':iMarca_id', $iMarca_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas las marcas en la base de datos
    // Devuelve array de objeto "marca"
    // o falso si no existen resultados
    public function getMarcas() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT * FROM marca');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja a la marca en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iMarca_id = ID de la marca en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarMarca($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE marca SET iStatus_fl = :iStatus_fl WHERE iMarca_id = :iMarca_id');
        $query->bindParam(':iMarca_id', $postData['iMarca_id'], PDO::PARAM_INT);
        $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() > 0) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }

    // Insertar nueva marca
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iMarca_id => Si es 0, agrega, caso contrario, modifica marca en cuestión
    //              - sMarca_nombre => Nombre de la marca a agregar o nuevo nombre de la marca a modificar
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevaMarca($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iMarca_id'] != 0) {
          $query = $db->prepare('UPDATE marca SET sMarca_nombre = :sMarca_nombre WHERE iMarca_id = :iMarca_id');
          $query->bindParam(':iMarca_id', $postData['iMarca_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO marca (sMarca_nombre, iStatus_fl) VALUES (:sMarca_nombre, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':sMarca_nombre', $postData['sMarca_nombre'], PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }

    }

  }

?>
