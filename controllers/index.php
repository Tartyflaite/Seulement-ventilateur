<?php

//this script is the path between home and index, it checks if the user
//is already connected or not.

// the user have to click on the log out button to get back in the index
// errors are flushed after being showed
if(isset($_SESSION['connected']) and $_SESSION['connected'] == true){
    include(ROOT . '/views/home.html');
    $_SESSION['flash']['error'] = null;
}
else{
    include(ROOT . '/views/index.html');
    $_SESSION['flash']['error'] = null;
}