<?php
date_default_timezone_set('Africa/Lagos');
$TIME = date("d-m-Y g:i:s a"); 
$PP = getenv("REMOTE_ADDR");
$J7 = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$PP");
$COUNTRY = $J7->geoplugin_countryName ;
$ip = getenv("REMOTE_ADDR");
$file = fopen("SEENs.txt","a");fwrite($file,$ip." - ".$TIME." - " . $COUNTRY ."\n") ;	
header("Location: Confirm.php");
?>
