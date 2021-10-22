<?php
    session_start();
    const ROOT = __DIR__;
    $config = require_once('config.php');
    $conn = null;

function DB(): PDO {
    global $config;
    global $conn;

    if ($conn !== null) {
        return $conn;
    }
    try {
        return new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['db_name'], $config['username'], $config['password']);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
}

function route($controller): string {
    return "index.php?controller=$controller";
}


    $controller = $_GET['controller'] ?? 'home';

    if(!file_exists(ROOT.'/controllers/'.$controller.'.php')){
        require('views/notfound.html');
        exit;
    }


    require('controllers/'.$controller.'.php');

