<?php
session_start();
include(config.php);

if(isset($_POST('username')) & isset($_POST('password'))){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM users WHERE username=? AND password=?")

    $query->bind_param("s", $username, $password);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        echo "<p class='error'>Mauvais nom d'utilisateur ou mot de passe !</p>";
    }
    else{
        echo "<p class='success'>Connexion réussie !</p>";
    }
}
?>