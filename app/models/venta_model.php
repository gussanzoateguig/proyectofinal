<?php

  require_once 'system/classes/PDO.php';

  class venta_model {

    // Consulta datos de una venta por su ID
    // Devuelve objeto "venta"
    // o falso si no existen resultados
    public function getVentaDataById($iVenta_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT * FROM venta WHERE iVenta_id = :iVenta_id');
      $query->bindParam(':iVenta_id', $iVenta_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas las ventas en la base de datos
    // Devuelve array de objeto "venta"
    // o falso si no existen resultados
    public function getVentas() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT v.*,o.iCliente_id FROM venta AS v LEFT JOIN orden_pedido AS o ON v.iOrden_pedido_id = o.iOrden_pedido_id');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja a la venta en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iVenta_id = ID de la marca en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarVenta($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE venta SET iStatus_fl = :iStatus_fl WHERE iVenta_id = :iVenta_id');
        $query->bindParam(':iVenta_id', $postData['iVenta_id'], PDO::PARAM_INT);
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

    // Insertar nueva venta
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iVenta_id => Si es 0, agrega, caso contrario, modifica venta en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevaVenta($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iVenta_id'] != 0) {
          $query = $db->prepare('UPDATE venta SET dtVenta_fecha = :dtVenta_fecha, iPais_id = :iPais_id, sVenta_ciudad = :sVenta_ciudad, sVenta_direccion = :sVenta_direccion, iVenta_codigo_postal = : iVenta_codigo_postal, iOrden_pedido_id = :iOrden_pedido_id WHERE iVenta_id = :iVenta_id');
          $query->bindParam(':iVenta_id', $postData['iVenta_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO venta (dtVenta_fecha,iPais_id,sVenta_ciudad, sVenta_direccion,iVenta_codigo_postal, iOrden_pedido_id,iStatus_fl) VALUES (:dtVenta_fecha,:iPais_id, :sVenta_ciudad, :sVenta_direccion, :iVenta_codigo_postal, :iOrden_pedido_id, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }

        $query->bindParam(':dtVenta_fecha', $postData['dtVenta_fecha'], PDO::PARAM_STR);
        $query->bindParam(':iPais_id', $postData['iPais_id'], PDO::PARAM_INT);
        $query->bindParam(':sVenta_ciudad', $postData['sVenta_ciudad'], PDO::PARAM_STR);
        $query->bindParam(':sVenta_direccion', $postData['sVenta_direccion'], PDO::PARAM_STR);
        $query->bindParam(':iVenta_codigo_postal', $postData['iVenta_codigo_postal'], PDO::PARAM_INT);
        $query->bindParam(':iOrden_pedido_id', $postData['iOrden_pedido_id'], PDO::PARAM_INT);
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
