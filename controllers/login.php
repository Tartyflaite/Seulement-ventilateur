<?php
if(isset($_SESSION['flash']['error'])){
    echo $_SESSION['flash']['error'];
}
if(isset($_SESSION['flash']['username'])){
    $previousUsername = $_SESSION['flash']['username'];
}
unset($_SESSION['flash']);


    require_once(ROOT.'\views\login.html');
