<?php

use PDO;
use PDOException;
use RuntimeException;
use TypeError;

$bd = 'electricidadfcv';

function conectar_db($bd) {
    try {
        
        $username = 'fundeanu'; // Reemplaza 'root' con tu usuario de la base de datos
        $password = 'password123456'; // Reemplaza '' con tu contraseña de la base de datos
        $dbName = $bd; // Nombre de la base de datos
        $instanceUnixSocket = '/cloudsql/balmy-doodad-386421:europe-west1:bd-electricidadfcv'; // Ruta del socket UNIX de Cloud SQL
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");  
        // Conectarse usando sockets UNIX
        $dsn = sprintf(
            'mysql:dbname=%s;unix_socket=%s',
            $dbName,
            $instanceUnixSocket
        );

        // Conectarse a la base de datos.
        $conn = new PDO(
            $dsn,
            $username,
            $password,
            $opciones,
            [
                PDO::ATTR_TIMEOUT => 5,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]
        );
        
        
        return $conn;

    } catch (TypeError $e) {
        throw new RuntimeException(
            sprintf(
                'Configuración inválida o faltante. Asegúrate de haber establecido ' .
                '$username, $password, $dbName y $instanceUnixSocket. ' .
                'El error en PHP fue: %s',
                $e->getMessage()
            ),
            (int) $e->getCode(),
            $e
        );
    } catch (PDOException $e) {
        throw new RuntimeException(
            sprintf(
                'No se pudo conectar a la base de datos de Cloud SQL. Verifica que ' .
                'tu nombre de usuario y contraseña sean correctos, que el proxy de ' .
                'Cloud SQL esté en ejecución y que la base de datos exista y esté ' .
                'lista para usarse. Para obtener más ayuda, consulta %s. El error PDO fue: %s',
                'https://cloud.google.com/sql/docs/mysql/connect-external-app',
                $e->getMessage()
            ),
            (int) $e->getCode(),
            $e
        );
    }
}



/*
$bd = 'electricidadfcv';
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
*/
?>