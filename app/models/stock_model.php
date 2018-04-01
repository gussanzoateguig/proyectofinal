<?php

  require_once 'system/classes/PDO.php';

  class stock_model {

    // Consulta datos del stock por su ID
    // Devuelve objeto "stock"
    // o falso si no existen resultados
    public function getStockDataById($iStock_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT st.iSucursal_id ,st.iProducto_id,st.iStock_cantidad , st.iStock_id FROM stock as st WHERE iStock_id = :iStock_id');
      $query->bindParam(':iStock_id', $iStock_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas los stock en la base de datos
    // Devuelve array de objeto "stock/sucursal/producto"
    // o falso si no existen resultados
    public function getStocks() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT s.sSucursal_nombre,p.sProducto_nombre,st.iStock_cantidad, st.iStock_id FROM stock as st LEFT JOIN sucursal as s on st.iSucursal_id = s.iSucursal_id LEFT JOIN producto as p on st.iProducto_id = p.iProducto_id');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja a el stock en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iStock_id = ID del stock en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarStock($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE stock SET iStatus_fl = :iStatus_fl WHERE iStock_id = :iStock_id');
        $query->bindParam(':iStock_id', $postData['iStock_id'], PDO::PARAM_INT);
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

    // Insertar nuevo stock
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iStock_id => Si es 0, agrega, caso contrario, modifica stock en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevoStock($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iStock_id'] != 0) {
          $query = $db->prepare('UPDATE stock SET iStock_cantidad,iSucursal_id,iProducto_id WHERE iStock_id = :iStock_id');
          $query->bindParam(':iStock_id', $postData['iStock_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO stock (iStock_cantidad,iSucursal_id,iProducto_id, iStatus_fl) VALUES (:iStock_cantidad,:iSucursal_id,:iProducto_id, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':iStock_cantidad', $postData['iStock_cantidad'], PDO::PARAM_INT);
        $query->bindParam(':iSucursal_id', $postData['iSucursal_id'], PDO::PARAM_INT);
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
