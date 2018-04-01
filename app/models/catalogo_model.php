<?php

  require_once 'system/classes/PDO.php';

  class catalogo_model {

    // Consulta datos del catalogo por su ID
    // Devuelve objeto "catalogo"
    // o falso si no existen resultados
    public function getCatalogoDataById($iCatalogo_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT * FROM catalogo  WHERE iCatalogo_id = :iCatalogo_id');
      $query->bindParam(':iCatalogo_id', $iCatalogo_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas los catalogo en la base de datos
    // Devuelve array de objeto "catalogo/proveedor/producto"
    // o falso si no existen resultados
    public function getCatalogos() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT c.iCatalogo_id, p.sProveedor_nombre,pro.sProducto_nombre , c.fCatalogo_precio FROM catalogo as c LEFT JOIN proveedor as p on p.iProveedor_id = c.iProveedor_id LEFT JOIN producto as pro on pro.iProducto_id = c.iProducto_id');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja  el catalogo en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iCatalogo_id = ID del stock en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarCatalogo($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE catalogo SET iStatus_fl = :iStatus_fl WHERE iCatalogo_id = :iCatalogo_id');
        $query->bindParam(':iCatalogo_id', $postData['iCatalogo_id'], PDO::PARAM_INT);
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

    // Insertar nuevo catalogo
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iCatalogo_id => Si es 0, agrega, caso contrario, modifica catalogo en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevoCatalogo($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iCatalogo_id'] != 0) {
          $query = $db->prepare('UPDATE catalogo SET iProducto_id,iProveedor_id,fCatalogo_precio WHERE iCatalogo_id = :iCatalogo_id');
          $query->bindParam(':iCatalogo_id', $postData['iCatalogo_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO catalogo (fCatalogo_precio,iProveedor_id,iProducto_id, iStatus_fl) VALUES (:fCatalogo_precio,:iProveedor_id,:iProducto_id, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':fCatalogo_precio', $postData['fCatalogo_precio'], PDO::PARAM_STR);
        $query->bindParam(':iProveedor_id', $postData['iProveedor_id'], PDO::PARAM_INT);
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
