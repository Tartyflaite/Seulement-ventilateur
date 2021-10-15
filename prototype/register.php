<?php
    session_start();
    include'config.php';

    if(isset($_POST['username'], $_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];


        try{
            $query = $connection->prepare("INSERT INTO users VALUES(?,?)");
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
?>

<!DOCTYPE html>
<html>
    <body>
        <form method="post" action="" name="register-form">
        <div class="form-element">
            <label>Username</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="register" value="register">Register</button>
        </form>
    </body>
</html>