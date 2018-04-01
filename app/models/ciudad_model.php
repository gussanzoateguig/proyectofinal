<?php

  require_once 'system/classes/PDO.php';

  class ciudad_model {

    // Consulta datos de una ciudad por su ID
    // Devuelve objeto "ciudad"
    // o falso si no existen resultados
    public function getCiudadDataById($iCiudad_id) {
      $database = new database();
      $db       = $database->getConnection();

      $query    = $db->prepare('SELECT * FROM ciudad WHERE iCiudad_id = :iCiudad_id');
      $query->bindParam(':iCiudad_id', $iCiudad_id, PDO::PARAM_INT);
      $query->execute();

      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas las ciudades en la base de datos
    // Devuelve array de objeto "ciudad / pais"
    // USA LEFT JOIN de "pais"
    // o falso si no existen resultados
    public function getCiudades() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT c.iCiudad_id,c.sCiudad_nombre FROM ciudad AS c');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja a la ciudad en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iCiudad_id = ID de la ciudad en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarCiudad($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE ciudad SET iStatus_fl = :iStatus_fl WHERE iCiudad_id = :iCiudad_id');
        $query->bindParam(':iCiudad_id', $postData['iCiudad_id'], PDO::PARAM_INT);
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

    // Insertar nueva ciudad
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iCiudad_id => Si es 0, agrega, caso contrario, modifica ciudad en cuestión
    //              - sCiudad_nombre => Nombre de la ciudad a agregar o nuevo nombre de la ciudad a modificar
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevaCiudad($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iCiudad_id'] != 0) {
          $query = $db->prepare('UPDATE ciudad SET sCiudad_nombre = :sCiudad_nombre WHERE iCiudad_id = :iCiudad_id');
          $query->bindParam(':iCiudad_id', $postData['iCiudad_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO ciudad (sCiudad_nombre, iStatus_fl) VALUES (:sCiudad_nombre, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':sCiudad_nombre', $postData['sCiudad_nombre'], PDO::PARAM_STR);

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
