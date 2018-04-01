<?php

  require_once 'system/classes/PDO.php';

  class categoria_model {

    // Consulta datos de una categoria por su ID
    // Devuelve objeto "categoria"
    // o falso si no existen resultados
    public function getCategoriaDataById($iCategoria_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT * FROM categoria WHERE iCategoria_id = :iCategoria_id');
      $query->bindParam(':iCategoria_id', $iCategoria_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas las categorias en la base de datos
    // Devuelve array de objeto "categoria"
    // o falso si no existen resultados
    public function getCategorias() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT * FROM categoria');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }


    // Dar de baja a la categoria en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iCategoria_id = ID de la categoria en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarCategoria($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE categoria SET iStatus_fl = :iStatus_fl WHERE iCategoria_id = :iCategoria_id');
        $query->bindParam(':iCategoria_id', $postData['iCategoria_id'], PDO::PARAM_INT);
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

    // Insertar nueva categoria
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iCategoria_id => Si es 0, agrega, caso contrario, modifica categoria en cuestión
    //              - sCategoria_nombre => Nombre de la categoria a agregar o nuevo nombre de la categoria a modificar
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevaCategoria($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iCategoria_id'] != 0) {
          $query = $db->prepare('UPDATE categoria SET sCategoria_nombre = :sCategoria_nombre WHERE iCategoria_id = :iCategoria_id');
          $query->bindParam(':iCategoria_id', $postData['iCategoria_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO categoria (sCategoria_nombre, iStatus_fl) VALUES (:sCategoria_nombre, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':sCategoria_nombre', $postData['sCategoria_nombre'], PDO::PARAM_STR);
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
