<?php
include_once("../config/funciones.php");

$placeId = 'ChIJHboAG0rcc60RSLukREubePw';
$apiKey = decryptAPIKey($encryptedKey, $encryptionKey);

$reviewsData = getGoogleReviews($placeId, $apiKey);

// Generar código HTML para mostrar las reseñas
$html = '<div id="reseñas" class="info__reseñas contenedor__row">';
$html .= '<div class="reseñas__text col-12-12 col-12-12-sm">';
$html .= ' <h2 class="heading heading-secondary">';
$html .= '<p>Que opinan nuestros clientes</p>';
$html .= '<span></span>';
$html .= '</h2>';
$html .= '</div>';
$html .= '<div class="reseñas__slider slider col-12-12 col-12-12-sm">';
$html .= '<ul>';
foreach ($reviewsData['result']['reviews'] as $review) {
  $html .= '<li>';
  $html .= '<div class="reseña">';
  $html .= '<div class="reseña__bocadillo ">';  
  $html .= '<p class="content">' . getStars($review['rating']) . '</p>';
  $html .= '<p class="content">' . $review['text'] . '</p>';
  $html .= '</div>';
  $html .= '<div class="reseña__autor">' . $review['author_name'] . '</div>';
  $html .= '</div>';
  $html .= '</li>';
}
$html .= '</ul>';
$html .= '</div>';
$html .= '</div>';

// Imprimir el código HTML en tu página web
echo $html;

?>



