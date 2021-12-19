<?php
    if(!isset($_SESSION['started'])){
        session_start();
        $_SESSION['started'] = true;
    }

    const ROOT = __DIR__;
    $config = require_once('config.php');
    $conn = null;

function feed(): void
{
    $query = DB()->prepare("SELECT * FROM content");
    $result = $query->execute();

    while ($row = $query->fetch($result)) {
        $user_id = $row['userId'];

        $query_username = DB()->prepare("SELECT username, profilPictureName FROM fans WHERE userId = ?");
        $result_user = $query_username->execute([$user_id]);
        $user_info = $query_username->fetch($result_user);

        $file = get_ventil($row['imageName']);
        $description = $row['description'];

        echo '<div class="item">
                <div class="small_logo">
                    <img src="ProfilePicture/';echo $user_info['profilPictureName'].'" '; echo 'alt="user_logo">
                </div>
                <div class="item_wrapper">
                                    <span class="username">';
                                        echo $user_info['username'];
                                    echo '</span>
                    <span class="description">';
                                        echo $description;
                                    echo '</span>';
                                    if($file != ''){
                                        echo '<img class="content_item" src=';echo '"'.$file.'" '; echo 'alt="content_img">';
                                    }
                                    else {
                                        echo '<br>';
                                    }
                echo '</div>
            </div>';

    }
}


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

function get_ventil($ventil): string {
    if($ventil == '')
        return '';
    return "./ImageVentilo/$ventil";
}

    $controller = $_GET['controller'] ?? 'index';

    if(!file_exists(ROOT.'\controllers\\'.$controller.'.php')){
        header("HTTP/1.1 404 Not Found");
        exit;
    }


    require_once('controllers\\'.$controller.'.php');

