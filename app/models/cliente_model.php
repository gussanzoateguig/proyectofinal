<?php

  require_once 'system/classes/PDO.php';

  class cliente_model {

    // Consulta datos de un cliente por su ID
    // Devuelve objeto "cliente"
    // o falso si no existen resultados
    public function getClienteDataById($iCliente_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT * FROM cliente WHERE iCliente_id = :iCliente_id');
      $query->bindParam(':iCliente_id', $iCliente_id, PDO::PARAM_INT);
      $query->execute();

      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas los clientes en la base de datos
    // Devuelve array de objeto "cliente"
    // o falso si no existen resultados
    public function getClientes() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT  * FROM cliente');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja a al cliente en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iCliente_id = ID del  cliente en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarCliente($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE cliente SET iStatus_fl = :iStatus_fl WHERE iCliente_id = :iCliente_id');
        $query->bindParam(':iCliente_id', $postData['iCliente_id'], PDO::PARAM_INT);
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

    // Insertar nuevo cliente
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iCliente_id => Si es 0, agrega, caso contrario, modifica cliente en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevoCliente($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iCliente_id'] != 0) {
          $query = $db->prepare('UPDATE cliente SET sCliente_nombre = :sCliente_nombre, sCliente_telefono = :sCliente_telefono, sCliente_direccion = :sCliente_direccion, sCliente_correo = :sCliente_correo WHERE iCliente_id = :iCliente_id');
          $query->bindParam(':iCliente_id', $postData['iCliente_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO cliente (sCliente_nombre,sCliente_telefono,sCliente_direccion,sCliente_correo, iStatus_fl) VALUES (:sCliente_nombre,:sCliente_telefono,:sCliente_direccion,:sCliente_correo, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':sCliente_nombre', $postData['sCliente_nombre'], PDO::PARAM_STR);
        $query->bindParam(':sCliente_direccion', $postData['sCliente_direccion'], PDO::PARAM_STR);
        $query->bindParam(':sCliente_telefono', $postData['sCliente_telefono'], PDO::PARAM_STR);
        $query->bindParam(':sCliente_correo', $postData['sCliente_correo'], PDO::PARAM_STR);

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
