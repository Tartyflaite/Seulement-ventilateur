<?php
// this script will login the user.

//  user posted information
$username = $_POST['username'];
$password = $_POST['password'];

    //  model : select every infos from the user
    $query = DB()->prepare("SELECT * FROM fans WHERE username=?");
    $query->execute([$username]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(!$result){
        $_SESSION['flash']['error'] = "L'utilisateur ".$username." n'existe pas.";
        $_POST = array();
        header( 'Location: /public/index.php?controller=index' );
        exit;
    }

    //  check to see if the given password match our stored password using the same hash.
    if(password_verify($_POST['password'], $result['password'])){
        $_SESSION['connected'] = true;
        $_SESSION['username'] = $username;
        $_POST = array();
        $_SESSION['flash'] = array();
        header( 'Location: /public/index.php?controller=home' );
        exit;
    }

//  error handling
$_SESSION['flash']['error'] = 'Mauvais mot de passe.';
$_SESSION['flash']['username'] = $username;
header( 'Location: /public/index.php?controller=index' );
$_POST = array();
exit;