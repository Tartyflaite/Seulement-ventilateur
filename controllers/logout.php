<?php
// this script will log out the user

//  global variable session being flushed to be ready to start new
$_SESSION = array();
$_SESSION['flash'] = array();
header( 'Location: /public/index.php?controller=index' );
exit;
