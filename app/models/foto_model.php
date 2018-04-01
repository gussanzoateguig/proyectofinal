<?php

  require_once 'system/classes/PDO.php';

  class foto_model {



    public function getFotoProducto($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT * FROM foto WHERE iProducto_id = :iProducto_id');
      $query->bindParam(':iProducto_id',$postData['iProducto_id'],PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja a la foto en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iFoto_id = ID de la foto en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarFoto($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE foto SET iStatus_fl = :iStatus_fl WHERE iFoto_id = :iFoto_id');
        $query->bindParam(':iFoto_id', $postData['iFoto_id'], PDO::PARAM_INT);
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

    // Insertar nueva foto
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iFoto_id => Si es 0, agrega, caso contrario, modifica foto en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevaFoto($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iFoto_id'] != 0) {
          $query = $db->prepare('UPDATE foto SET sFoto_url = :sFoto_url,iProducto_id = :iProducto_id WHERE iFoto_id = :iFoto_id');
          $query->bindParam(':iFoto_id', $postData['iFoto_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO foto (sFoto_url,iProducto_id, iStatus_fl) VALUES (:sFoto_url, :iProducto_id, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':sFoto_url', $postData['sFoto_url'], PDO::PARAM_STR);
        $query->bindParam(':iProducto_id', $postData['iProducto_id'], PDO::PARAM_INT);
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
