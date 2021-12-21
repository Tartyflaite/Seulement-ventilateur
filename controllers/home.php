<?php
// this script is a path between the index and the home wether
// the user is connected

// verification set to avoid user sneaking in the home page without being connected
if(isset($_SESSION['connected']) and $_SESSION['connected'] == true){
    include(ROOT . '/views/home.html');
    //  errors can be set else where so it set to null after being showed
    $_SESSION['flash']['error'] = null;
}
else{
    $_SESSION['flash']['error'] = 'Identifiez vous pour accéder au contenu';
    include(ROOT . '/views/index.html');
    //  errors set to null once showed to the user
    $_SESSION['flash']['error'] = null;
}