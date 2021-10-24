<?php
    if(!isset($_SESSION['connected'])){
        require_once(ROOT.'/views/notconnected.html');
        exit;
    }
    require_once(ROOT.'/views/profil.html');