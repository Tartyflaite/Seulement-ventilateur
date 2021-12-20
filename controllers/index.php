<?php
if(isset($_SESSION['connected']) and $_SESSION['connected'] == true){
    include(ROOT . '/views/home.html');
    $_SESSION['flash']['error'] = null;
}
else{
    include(ROOT . '/views/index.html');
    $_SESSION['flash']['error'] = null;
}