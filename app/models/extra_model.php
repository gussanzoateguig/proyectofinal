<?php
/**
 * @access public
 * @author lebunio
 */
 require_once 'system/classes/PDO.php';
class Extra_model {
	private $_iExtra_id;
	private $_sExtra_nombre;

	/**
	 * @access public
	 */
	public function getExtras() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT * FROM extra');
      $query->execute();
      if ($query->rowCount() > 0) {
        $query->setFetchMode(PDO::FETCH_OBJ);
        return $query->fetchAll();
      } else {
        return false;
      }
		// Not yet implemented
	}
}
?>
