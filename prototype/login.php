<?php
    session_start();
    $config = require_once('config.php');
    require_once('db_conn.php');

    if(isset($_POST['username'], $_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = DB()->prepare("SELECT * FROM users WHERE username=?");
        

        $query->execute([$username]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result && password_verify($_POST['password'], $result['password'])){
            echo "<p class='success'>Connexion réussie !</p>";
        }
        else{
            echo "<p class='error'>Mauvais nom d'utilisateur ou mot de passe !</p>";
        }
    }

    require_once('login.html');
