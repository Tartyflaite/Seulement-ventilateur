<?php

session_start();
// $controller = $_GET['controller'];
// require('controllers/'.$controller.'.php');

include('../index.html');

if(isset($_SESSION['connected']) && $_SESSION['connected'] == true){
    include('../navbar.html');
}
else{
    include('../navbar_notconnected.html');
}

include('../endofpage.html');