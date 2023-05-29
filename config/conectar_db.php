<?php
use PDO;
use PDOException;
use RuntimeException;
use TypeError;

$bd = 'electricidadfcv';
function conectar_db($bd){ 
  try {
    // Note: Saving credentials in environment variables is convenient, but not
    // secure - consider a more secure solution such as
    // Cloud Secret Manager (https://cloud.google.com/secret-manager) to help
    // keep secrets safe.
    $username = getenv('root'); // e.g. 'your_db_user'
    $password = getenv(''); // e.g. 'your_db_password'
    $dbName = getenv($bd); // e.g. 'your_db_name'
    $instanceUnixSocket = getenv('/cloudsql/balmy-doodad-386421:europe-west1:bd-electricidadfcv'); // e.g. '/cloudsql/project:region:instance'

    // Connect using UNIX sockets
    $dsn = sprintf(
        'mysql:dbname=%s;unix_socket=%s',
        $dbName,
        $instanceUnixSocket
    );

    // Connect to the database.
    $conn = new PDO(
        $dsn,
        $username,
        $password,
        # [START_EXCLUDE]
        // Here we set the connection timeout to five seconds and ask PDO to
        // throw an exception if any errors occur.
        [
            PDO::ATTR_TIMEOUT => 5,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
        # [END_EXCLUDE]
    );
} catch (TypeError $e) {
    throw new RuntimeException(
        sprintf(
            'Invalid or missing configuration! Make sure you have set ' .
                '$username, $password, $dbName, ' .
                'and $instanceUnixSocket (for UNIX socket mode). ' .
                'The PHP error was %s',
            $e->getMessage()
        ),
        (int) $e->getCode(),
        $e
    );
} catch (PDOException $e) {
    throw new RuntimeException(
        sprintf(
            'Could not connect to the Cloud SQL Database. Check that ' .
                'your username and password are correct, that the Cloud SQL ' .
                'proxy is running, and that the database exists and is ready ' .
                'for use. For more assistance, refer to %s. The PDO error was %s',
            'https://cloud.google.com/sql/docs/mysql/connect-external-app',
            $e->getMessage()
        ),
        (int) $e->getCode(),
        $e
    );
}

return $conn;
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