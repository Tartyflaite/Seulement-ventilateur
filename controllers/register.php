<?php

// this script will register the user using the given value
// in the inscription info simply by comparing the hashed given password
// with the stored hashed password


    // user info
    $username = $_POST['username'];
    $password = $_POST['password'];

    // model : add the user info in the database
    $query = DB()->prepare("INSERT INTO fans(userId, username, password, profilPictureName) VALUES(NULL,?,?, 'defaultPP.png')");

    //  hashes the user password for extra database security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $result = $query->execute([$username, $hashed_password]);

    //  2 possibilites : the users is succesfully registered or not
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

//  post flush for next post
$_POST = array();
header('Location: /public/index.php?controller='.$redirect);
exit;
