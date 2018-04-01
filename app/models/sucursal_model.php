<?php

  require_once 'system/classes/PDO.php';

  class sucursal_model {

    // Consulta datos de una sucursal por su ID
    // Devuelve objeto "sucursal"
    // o falso si no existen resultados
    public function getSucursalDataById($iSucursal_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT s.*,c.sCiudad_nombre FROM sucursal as s LEFT JOIN ciudad as c on c.iCiudad_id = s.iCiudad_id WHERE iSucursal_id = :iSucursal_id');
      $query->bindParam(':iSucursal_id', $iSucursal_id, PDO::PARAM_INT);
      $query->execute();

      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas las sucursales en la base de datos
    // Devuelve array de objeto "sucursal / ciudad"
    // USA LEFT JOIN de "ciudad"
    // o falso si no existen resultados
    public function getSucursales() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT s.*,c.sCiudad_nombre FROM sucursal as s LEFT JOIN ciudad as c on c.iCiudad_id = s.iCiudad_id');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Dar de baja a la sucursal en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iSucursal_id = ID de la sucursal en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarSucursal($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE sucursal SET iStatus_fl = :iStatus_fl WHERE iSucursal_id = :iSucursal_id');
        $query->bindParam(':iSucursal_id', $postData['iSucursal_id'], PDO::PARAM_INT);
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

    // Insertar nueva sucursal
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iSucursal_id => Si es 0, agrega, caso contrario, modifica sucursal en cuestión
    //              - sCiudad_nombre => Nombre de la ciudad a agregar o nuevo nombre de la ciudad a modificar
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevaSucursal($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iSucursal_id'] != 0) {
          $query = $db->prepare('UPDATE sucursal SET sSucursal_nombre = :sSucursal_nombre, sSucursal_direccion = :sSucursal_direccion, sSucursal_telefono = :sSucursal_telefono, iCiudad_id = :iCiudad_id WHERE iSucursal_id = :iSucursal_id');
          $query->bindParam(':iSucursal_id', $postData['iSucursal_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO sucursal (sSucursal_nombre,sSucursal_direccion,sSucursal_telefono,iCiudad_id, iStatus_fl) VALUES (:sSucursal_nombre,:sSucursal_direccion,:sSucursal_telefono,:iCiudad_id, :iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }
        $query->bindParam(':sSucursal_nombre', $postData['sSucursal_nombre'], PDO::PARAM_STR);
        $query->bindParam(':sSucursal_direccion', $postData['sSucursal_direccion'], PDO::PARAM_STR);
        $query->bindParam(':sSucursal_telefono', $postData['sSucursal_telefono'], PDO::PARAM_STR);
        $query->bindParam(':iCiudad_id', $postData['iCiudad_id'], PDO::PARAM_INT);

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
