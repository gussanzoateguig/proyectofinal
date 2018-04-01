<?php

  require_once 'system/classes/PDO.php';

  class noticia_model {

    // Consulta de todas las noticias existentes
    // Devuelve array de objetos 'fw_noticias'
    // Con sUsuario_nombre de 'fw_usuarios'
    // o false
    public function getNoticias() {
      $database = new database();
      $db = $database->getConnection();

      $query = $db->prepare('SELECT noticias.*, usuarios.sUsuario_nombre FROM fw_noticias AS noticias LEFT JOIN fw_usuarios AS usuarios ON usuarios.iUsuario_id = noticias.iUsuario_id ORDER BY iNoticia_id DESC');
      $query->execute();

      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
    }

    // Redactar nueva noticia
    // Devuelve true si se agrega noticia
    // o false si no se agrega
    public function nuevaNoticia($postData) {
      if (is_null($postData)) {
        return false;
      } else {
        $database = new database();
        $db = $database->getConnection();

        $query = $db->prepare('INSERT INTO fw_noticias(iUsuario_id, sNoticia_titulo, sNoticia_contenido, dtNoticia_fecha, iStatus_fl) VALUES (:iUsuario_id, :sNoticia_titulo, :sNoticia_contenido, :dtNoticia_fecha, :iStatus_fl)');
        $query->bindParam(':iUsuario_id', $postData['iUsuario_id'], PDO::PARAM_INT);
        $query->bindParam(':sNoticia_titulo', $postData['sNoticia_titulo'], PDO::PARAM_STR);
        $query->bindParam(':sNoticia_contenido', $postData['sNoticia_contenido'], PDO::PARAM_STR);
        $query->bindParam(':dtNoticia_fecha', $postData['dtNoticia_fecha'], PDO::PARAM_STR);
        $query->bindParam(':iStatus_fl', $postData['iStatus_fl'], PDO::PARAM_INT);
        $query->execute();

        if ($query->rowCount() > 0) {
          return true;
        } else {
          return false;
        }
      }
    }

  }

?>
