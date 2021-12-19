<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = DB()->prepare("INSERT INTO fans(userId, username, password, profilPictureName) VALUES(NULL,?,?, 'defaultPP.jpeg')");
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $result = $query->execute([$username, $hashed_password]);

if($result === false){
    $_SESSION['flash']['error'] = "L'utilisateur ".$username." existe déjà.";
    $redirect = 'index';
} else{
    $_SESSION['flash'] = array();
    $_SESSION['flash']['success'] = "Inscription réussie.";

    $_SESSION['connected'] = true;

    $_SESSION['username'] = $username;
    $redirect = 'home';
}

$_POST = array();
header('Location: /public/index.php?controller='.$redirect);
exit;



