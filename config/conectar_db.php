<?php



$bd = 'bd_electricidadfcv';
function conectar_db($bd){ 
  $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");     
  define ("USER_DB","noelia"); 
  define ("PASSWORD","password1234"); 
  try {
      $dsn = "mysql:host=localhost:3306;dbname=".$bd;
      $conn = new PDO($dsn, USER_DB, PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $opciones;

      } catch (PDOException $e){

      echo 'Error: '.$e->getMessage()."<br/>";
      
      }   
  
  
  return $conn;

}

/*

$bd = 'bd_electricidadfcv';
function conectar_db($bd){ 
  $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");     
  define ("USER_DB","noelia"); 
  define ("PASSWORD","1#el020mB"); 
  try {
      $dsn = "mysql:host=localhost:3306;dbname=".$bd;
      $conn = new PDO($dsn, USER_DB, PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $opciones;

      } catch (PDOException $e){

      echo 'Error: '.$e->getMessage()."<br/>";
      
      }   
  
  
  return $conn;
}
*/
?>