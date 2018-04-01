<?php

  require_once 'system/classes/PDO.php';
  class producto_model {
    // Consulta datos de un producto por su ID
    // Devuelve objeto "producto"
    // o falso si no existen resultados
    public function getProductoDataById($iProducto_id) {
      $database = new database();
      $db       = $database->getConnection();
      $query    = $db->prepare('SELECT p.*,ca.sCategoria_nombre,ma.sMarca_nombre FROM producto as p LEFT JOIN categoria as ca on p.iCategoria_id = ca.iCategoria_id LEFT JOIN marca as ma on ma.iMarca_id = p.iMarca_id  WHERE iProducto_id = :iProducto_id');
      $query->bindParam(':iProducto_id', $iProducto_id, PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetch();
      } else {
        return false;
      }
    }

    // Consulta todas los productos en la base de datos
    // Devuelve array de objeto "producto"
    // o falso si no existen resultados
    public function getProductos() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT p.*,m.sMarca_nombre, c.sCategoria_nombre FROM producto as p LEFT JOIN marca as m on p.iMarca_id = m.iMarca_id LEFT JOIN categoria as c on p.iCategoria_id = c.iCategoria_id');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }
    public function getProductoMarcaCategoria($postData = null)
    {
      $database = new database();
      $db = $database->getConnection();
      if($postData !=null){
      $query = $db->prepare('SELECT p.iProducto_id,p.sProducto_nombre,p.fProducto_precio,c.sCategoria_nombre,m.sMarca_nombre FROM producto as p LEFT JOIN categoria as c on p.iCategoria_id = c.iCategoria_id LEFT JOIN marca as m on m.iMarca_id = p.iMarca_id WHERE p.iCategoria_id = :iCategoria_id and p.iMarca_id = :iMarca_id');
      $query->bindParam(':iMarca_id', $postData['iMarca_id'], PDO::PARAM_INT);
      $query->bindParam(':iCategoria_id', $postData['iCategoria_id'], PDO::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }else{
      return false;
    }
    }


    // Dar de baja al producto en cuestión
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iProducto_id = ID del producto en cuestión
    // Devuelve booleano (true/false) de acuerdo a la consulta
    public function eliminarProducto($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        $iStatus_fl = ESTADO_ELIMINADO;
        $query = $db->prepare('UPDATE producto SET iStatus_fl = :iStatus_fl WHERE iProducto_id = :iProducto_id');
        $query->bindParam(':iProducto_id', $postData['iProducto_id'], PDO::PARAM_INT);
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

    // Insertar nuevo producto
    // PARÁMETROS:
    // $postData => CONTIENE:
    //              - iProducto_id => Si es 0, agrega, caso contrario, modifica el proveedor en cuestión
    // Devuelve booleano (true/false) de acuerdo a consulta
    public function nuevoProducto($postData = null) {
      $database = new database();
      $db = $database->getConnection();
      if ($postData != null) {
        if ($postData['iProducto_id'] != 0) {
          $query = $db->prepare('UPDATE producto SET sProducto_nombre = :sProducto_nombre, fProducto_precio = :fProducto_precio, iProducto_contenido = :iProducto_contenido, iProducto_nicotina = :iProducto_nicotina, iMarca_id = :iMarca_id , iCategoria_id = :iCategoria_id WHERE iProducto_id = :iProducto_id');
          $query->bindParam(':iProducto_id', $postData['iProducto_id'], PDO::PARAM_INT);
        } else {
          $iStatus_fl = ESTADO_HABILITADO;
          $query = $db->prepare('INSERT INTO producto (sProducto_nombre,fProducto_precio,iProducto_contenido,iProducto_nicotina,iMarca_id,iCategoria_id, iStatus_fl) VALUES (:sProducto_nombre,:fProducto_precio,:iProducto_contenido,:iProducto_nicotina,:iMarca_id, :iCategoria_id ,:iStatus_fl)');
          $query->bindParam(':iStatus_fl', $iStatus_fl, PDO::PARAM_INT);
        }

        if (empty($postData['iProducto_contenido'])) {
          $postData['iProducto_contenido'] = NULL;
        }

        if (empty($postData['iProducto_nicotina'])) {
          $postData['iProducto_nicotina'] = NULL;
        }

        $query->bindParam(':sProducto_nombre', $postData['sProducto_nombre'], PDO::PARAM_STR);
        $query->bindParam(':fProducto_precio', $postData['fProducto_precio'], PDO::PARAM_STR);
        $query->bindParam(':iProducto_contenido', $postData['iProducto_contenido'], PDO::PARAM_INT);
        $query->bindParam(':iProducto_nicotina', $postData['iProducto_nicotina'], PDO::PARAM_INT);
        $query->bindParam(':iMarca_id', $postData['iMarca_id'], PDO::PARAM_INT);
        $query->bindParam(':iCategoria_id', $postData['iCategoria_id'], PDO::PARAM_INT);
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
