<?php
function esl_shortcode( $atts ) {
$esl_embedcode=get_option('esl_embedcode');
   if(isset($esl_embedcode)) { return get_option('esl_embedcode'); } else return "Kindly embed the code in the easy store locator settings."; 
}
add_shortcode( 'easystorelocator', 'esl_shortcode' );

?>