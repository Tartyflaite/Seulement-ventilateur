<?php
// this script is a starting setup

// session handling
if(!isset($_SESSION['started'])){
    session_start();
    $_SESSION['started'] = true;
}

// Content directory handling
if (!file_exists('ImageVentilo')) {
    mkdir('ImageVentilo', 0777, true);
}

const ROOT = __DIR__;
$config = require_once('config.php');
$conn = null;

require_once("feed.php");
require_once("load_account_info.php");

// create a PDO with database infos
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

//return the path with the image name
function get_ventil($ventil): string {
    if($ventil == '')
        return '';
    return "./ImageVentilo/$ventil";
}

//exit the script and setting possible error
function leaveScript($error){
    $_SESSION['flash']['error'] = $error;

    $_POST = array();
    $_FILES = array();
    header('Location: /public/index.php?controller=home');
    exit;
}

$controller = $_GET['controller'] ?? 'index';
//controllers error handling
if(!file_exists(ROOT.'\controllers\\'.$controller.'.php')){
    header("HTTP/1.1 404 Not Found");
    exit;
}

// set the given controller
require_once('controllers\\'.$controller.'.php');
