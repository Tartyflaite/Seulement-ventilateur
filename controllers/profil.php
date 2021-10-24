<?php
    if(!isset($_SESSION['connected'])){
        header('Location : /public/index.php?controller=login');
        exit;
    }
    require_once(ROOT.'/views/profil.html');