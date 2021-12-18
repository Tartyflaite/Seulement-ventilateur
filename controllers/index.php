<?php
if(isset($_SESSION['connected']) and $_SESSION['connected'] == true){
    include(ROOT . '/views/home.html');
}
else{
    include(ROOT . '/views/index.html');
}