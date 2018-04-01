<?php
  require_once 'system/classes/PDO.php';
  class pais_model {
    // Consulta datos de un pais por su ID
    // Devuelve objeto "ciudad"
    // o falso si no existen resultados
    public function getCiudadDataById($iPais_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT * FROM pais WHERE iPais_id = :iPais_id');
      $query->bindParam(':iPais_id', $iPais_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }
    // Consulta todas los paises en la base de datos
    // Devuelve array de objeto "pais"
    // o falso si no existen resultados
    public function getPaises() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT * FROM pais');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }
    // Dar de baja al Pais en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iPais_id = ID del pais en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarPais($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE pais SET iStatus_fl = :iStatus_fl WHERE iPais_id = :iPais_id');
        $query->bindParam(':iPais_id', $postData['iPais_id'], PDO::PARAM_INT);
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
    // Insertar nuevo pais
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iPais_id => Si es 0, agrega, caso contrario, modifica pais en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevoPais($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iPais_id'] != 0) {
          $query = $db->prepare('UPDATE pais SET sPais_nombre = :sPais_nombre, iPais_codigo_postal = :iPais_codigo_postal WHERE iPais_id = :iPais_id');
          $query->bindParam(':iPais_id', $postData['iPais_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO pais (sPais_nombre,iPais_codigo_postal, iStatus_fl) VALUES (:sPais_nombre, :iPais_codigo_postal, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':sPais_nombre', $postData['sPais_nombre'], PDO::PARAM_STR);
        $query->bindParam(':iPais_codigo_postal', $postData['iPais_codigo_postal'], PDO::PARAM_INT);
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
