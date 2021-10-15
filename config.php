<?php
$USER  = 'localhost';
$USER = 'root';
$PASSWORD  = '';

$link = mysql_connect($USER , $USER , $PASSWORD)
    or die("Impossible de se connecter : " . mysql_error());

?>