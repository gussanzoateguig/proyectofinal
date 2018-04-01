<?php

  /***************************************/
  /*  CONFIGURACIÓN DE LA BASE DE DATOS  */
  /***************************************/

  // DATOS DE CONEXIÓN

  $config['database'] = array(
    // Servidor de la base de datos
    'server'   => 'localhost',
    // Usuario y contraseña de acceso
    'username' => 'root',
    'password' => 'dcamachoa',
    // Base de Datos a usar
    'db'       => 'fury_vaping'
  );


  /**************************************************/
  /*  DECLARACIÓN DE VARIABLES GLOBALES (NO TOCAR)  */
  /**************************************************/

  DEFINE('MYSQL_DATA', $config['database']);

?>
