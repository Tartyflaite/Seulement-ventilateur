<?php
    if(!isset($_SESSION['started'])){
        session_start();
        $_SESSION['started'] = true;
    }

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

function get_asset($string): void {
    echo "../assets/$string";
}

    $controller = $_GET['controller'] ?? 'index';

    if(!file_exists(ROOT.'\controllers\\'.$controller.'.php')){
        header("HTTP/1.1 404 Not Found");
        exit;
    }


    require_once('controllers\\'.$controller.'.php');

