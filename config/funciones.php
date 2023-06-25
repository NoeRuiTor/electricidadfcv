<?php
//VARIABLES
  
  $email = 'info@electricidadfcv.com';
  $movil = '666194313';
  $direccion = "Electricidad FCV, Carrer Senieta de l'Auelet, 53, 03420 Castalla, Alicante";
  

//FUNCION PARA CREAR VARIABLES QUE MODIFIQUEN EL CONTENIDO DE LA WEB
function parametro_plantilla($variable){
    
   if(isset($GLOBALS[$variable])){
       echo $GLOBALS[$variable];
   }else{
       echo "Sin datos";
   }
    
}
//FUNCION PARA QUE ASIGNE LA CLASE ACTIVE AL ENLACE A DE LA PÁGINA EN LA QUE NOS ENCONTRAMOS Y EN CSS ACTIVE CAMBIA DE COLOR
function active($current_page){
   $url_array = explode('/',$_SERVER['REQUEST_URI']);
   $url = end($url_array);
   if($current_page == $url){
       echo 'active';
   }

}





//Hacer una solicitud a la API de reseñas de Google
function getGoogleReviews($placeId, $apiKey) {
    $apiUrl = 'https://maps.googleapis.com/maps/api/place/details/json?place_id=' . $placeId . '&fields=reviews&key=' . $apiKey.'&language=es';
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);
    return $data;
  }

  // Función para encriptar la clave de la API
  
  $key = 'AIzaSyBl1SZodGjiwv-vOCIw16sYC67Aqo7CYSY';
  $encryptionKey = 'FCV840729';

function encryptAPIKey($key, $encryptionKey) {
  $cipher = "AES-256-CBC";
  $ivLength = openssl_cipher_iv_length($cipher);
  $iv = openssl_random_pseudo_bytes($ivLength);
  $encrypted = openssl_encrypt($key, $cipher, $encryptionKey, OPENSSL_RAW_DATA, $iv);
  $hmac = hash_hmac('sha256', $encrypted, $encryptionKey, true);
  return base64_encode($iv . $hmac . $encrypted);
}
$encryptedKey = encryptAPIKey($key,$encryptionKey);

// Función para desencriptar la clave de la API
function decryptAPIKey($encryptedKey, $encryptionKey) {
  $cipher = "AES-256-CBC";
  $data = base64_decode($encryptedKey);
  $ivLength = openssl_cipher_iv_length($cipher);
  $iv = substr($data, 0, $ivLength);
  $hmac = substr($data, $ivLength, 32);
  $encrypted = substr($data, $ivLength + 32);
  $decrypted = openssl_decrypt($encrypted, $cipher, $encryptionKey, OPENSSL_RAW_DATA, $iv);
  $calculatedHmac = hash_hmac('sha256', $encrypted, $encryptionKey, true);
  if (hash_equals($hmac, $calculatedHmac)) {
      return $decrypted;
  } else {
      // La integridad del dato ha sido comprometida
      return null;
  }
}

//Función para que en las reseñas aparezcan estrellas en vez de un número

  function getStars($rating) {
    $stars = '';
    $fullStars = floor($rating);
    $halfStar = $rating - $fullStars;
  
    // Añadir estrellas llenas
    for ($i = 0; $i < $fullStars; $i++) {
      $stars .= '<span class="star">&#9733;</span>';
    }
  
    // Añadir media estrella, si corresponde
    if ($halfStar >= 0.5) {
      $stars .= '<span class="star">&#9733;</span>';
    }
  
    // Añadir estrellas vacías para completar el total de 5 estrellas
    $emptyStars = 5 - $fullStars - ($halfStar >= 0.5 ? 1 : 0);
    for ($i = 0; $i < $emptyStars; $i++) {
      $stars .= '<span class="star">&#9734;</span>';
    }
  
    return $stars;
  }
  
  
