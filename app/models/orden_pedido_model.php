<?php

  require_once 'system/classes/PDO.php';

  class orden_pedido_model {
    // Consulta datos de una orden de pedido por su ID
    // Devuelve objeto "orden_pedido"
    // o falso si no existen resultados
    public function getOrden_pedidoDataById($iOrden_pedido_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT * FROM orden_pedido WHERE iOrden_pedido_id = :iOrden_pedido_id');
      $query->bindParam(':iOrden_pedido_id', $iOrden_pedido_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }
    // Consulta todas las ordenes de pedido en la base de datos
    // Devuelve array de objeto "marca"
    // o falso si no existen resultados
    public function getOrden_pedido() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT op.*,s.sSucursal_nombre,c.sCliente_nombre FROM orden_pedido as op LEFT JOIN sucursal as s on op.iSucursal_id = s.iSucursal_id LEFT JOIN cliente as c on op.iCliente_id = c.iCliente_id ');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }
    // Consulta todo el detalle de pedido de una orden de pedido en la base de datos
    // Devuelve array de objeto "Detalle_Pedido/marca/categoria"
    // o falso si no existen resultados
    public function getDetalle_pedido($postData) {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT dp.iDetalle_pedido_id,dp.iDetalle_pedido_cantidad,p.sProducto_nombre,p.fProducto_precio,m.sMarca_nombre,c.sCategoria_nombre from detalle_pedido as dp LEFT JOIN producto as p on dp.iProducto_id = p.iProducto_id LEFT JOIN marca as m on p.iMarca_id = m.iMarca_id LEFT JOIN categoria as c on p.iCategoria_id = c.iCategoria_id WHERE dp.iOrden_pedido_id = :iOrden_pedido_id');
        $query->bindParam(':iOrden_pedido_id', $postData['iOrden_pedido_id'], PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }
    // Dar de baja a la orden de pedido en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iOrden_pedido_id = ID de la orden de pedido en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarOrden_pedido($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE orden_pedido SET iStatus_fl = :iStatus_fl WHERE iOrden_pedido_id = :iOrden_pedido_id');
        $query->bindParam(':iOrden_pedido_id', $postData['iOrden_pedido_id'], PDO::PARAM_INT);
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
    // Insertar nueva orden de pedido
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iOrden_pedido_id => Si es 0, agrega, caso contrario, modifica marca en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevaOrden_pedido($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iOrden_pedido_id'] != 0) {
          $query = $db->prepare('UPDATE orden_pedido SET dtOrden_pedido_fecha = :dOrden_pedido_fecha,bOrden_pedido_estado = :bOrden_pedido_estado ,iCliente_id = :iCliente_id, iSucursal_id = :iSucursal_id WHERE iOrden_pedido_id = :iOrden_pedido_id');
          $query->bindParam(':iOrden_pedido_id', $postData['iOrden_pedido_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO orden_pedido (dtOrden_pedido_fecha,bOrden_pedido,iCliente_id,iSucursal_id, iStatus_fl) VALUES (:dtOrden_pedido_fecha,:bOrden_pedido_estado,:iCliente_id,:iSucursal_id, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':dtOrden_pedido_fecha', $postData['dOrden_pedido_fecha'], PDO::PARAM_STR);
        $query->bindParam(':bOrden_pedido_estado', $postData['bOrden_pedido_estado'], PDO::PARAM_STR);
        $query->bindParam(':iCliente_id', $postData['iCliente_id'], PDO::PARAM_INT);
        $query->bindParam(':iSucursal_id', $postData['iSucursal_id'], PDO::PARAM_INT);
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
