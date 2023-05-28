<?php
function conectar_db($bd){ 
  $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");     
  define ("USER_DB","noelia"); 
  define ("PASSWORD","password1234"); 
  try {
      $dsn = "mysql:host=localhost;dbname=".$bd;
      $con = new PDO($dsn, USER_DB, PASSWORD);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $opciones;

      } catch (PDOException $e){

      echo 'Error: '.$e->getMessage()."<br/>";
      
      }   
  
  
  return $con;
}

?>