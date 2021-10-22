<?php
    require_once('db_conn.php');

    if(isset($_POST['username'], $_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        try{
            $query = DB()->prepare("INSERT INTO users VALUES(?,?)");

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $result = $query->execute([$username, $hashed_password]);

            if($result === false){
                echo "<p class='success'>Cet utilisateur existe déjà !</p>";
            }
            else{
                echo "<p class='success'>Utilisateur enregistré !</p>";
            }
            $query->fetch();
        } 
        catch (PDOException $e) {
            throw $e;
        }
    }

require_once('register.html');