<?php

  require_once 'system/classes/PDO.php';

  class proveedor_model {

    // Consulta datos de un proveedor por su ID
    // Devuelve objeto "proveedor"
    // o falso si no existen resultados
    public function getProveedorDataById($iProveedor_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT p.* FROM proveedor as p WHERE iProveedor_id = :iProveedor_id');
      $query->bindParam(':iProveedor_id', $iProveedor_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas los proveedores en la base de datos
    // Devuelve array de objeto "proveedor"
    // o falso si no existen resultados
    public function getProveedores() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT p.* FROM proveedor as p');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja al proveedor en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iProveedor_id = ID del proveedor en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarProveedor($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE proveedor SET iStatus_fl = :iStatus_fl WHERE iProveedor_id = :iProveedor_id');
        $query->bindParam(':iProveedor_id', $postData['iProveedor_id'], PDO::PARAM_INT);
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

    // Insertar nuevo proveedor
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iProveedor_id => Si es 0, agrega, caso contrario, modifica el proveedor en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevoProveedor($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iProveedor_id'] != 0) {
          $query = $db->prepare('UPDATE proveedor SET sProveedor_nombre = :sProveedor_nombre, sProveedor_telefono = :sProveedor_telefono, sProveedor_correo = :sProveedor_correo, iProveedor_nit = :iProveedor_nit WHERE iProveedor_id = :iProveedor_id');
          $query->bindParam(':iProveedor_id', $postData['iProveedor_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO proveedor (sProveedor_nombre,sProveedor_telefono,sProveedor_correo,iProveedor_nit,iStatus_fl) VALUES (:sProveedor_nombre,:sProveedor_telefono,:sProveedor_correo,:iProveedor_nit, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':sProveedor_nombre', $postData['sProveedor_nombre'], PDO::PARAM_STR);
        $query->bindParam(':sProveedor_telefono', $postData['sProveedor_telefono'], PDO::PARAM_STR);
        $query->bindParam(':sProveedor_correo', $postData['sProveedor_correo'], PDO::PARAM_STR);
        $query->bindParam(':iProveedor_nit', $postData['iProveedor_nit'], PDO::PARAM_INT);
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
