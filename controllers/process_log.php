<?php

if(! isset($_POST['username'], $_POST['password'])) {
    $_SESSION['flash']['error'] = 'mising_field';
    header('Location : index.php?controller=login');
    exit;
}

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = DB()->prepare("SELECT * FROM users WHERE username=?");


    $query->execute([$username]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(!$result){
        $_SESSION['flash']['error'] = 'bad_user';
        header( 'Location: /public/index.php?controller=login' );
        exit;
    }

    if(password_verify($_POST['password'], $result['password'])){
        $_SESSION['connected'] = true;
        $_SESSION['username'] = $username;
        header( 'Location: /public/index.php?controller=home' );
        exit;
    }


$_SESSION['flash']['error'] = 'bad_password';
$_SESSION['flash']['username'] = $username;
header( 'Location: /public/index.php?controller=login' );
exit;