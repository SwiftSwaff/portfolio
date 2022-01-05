<?php
if (!defined('IndexAccessed')) {
    die('Direct access not permitted');
}

$fontURL = "https://fonts.googleapis.com/css2?"
         . "family=Lato:ital,wght@0,400;0,700;1,400;1,700&"
         . "family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&"
         . "family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&"
         . "display=swap";
?>

<script defer src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script defer type='text/javascript' src='/js/app.js'></script>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin/>
<link rel='stylesheet' rel='preload' as='style' href='<?php echo $fontURL ?>'/>
<link rel='stylesheet' rel='stylesheet' href='<?php echo $fontURL ?>' media='print' onload="this.media='all'"/>
<link rel='stylesheet' href='/css/app.min.css?v=1.0.0'>
<link rel="icon" href="/favicon.ico" type="image/x-icon"/>