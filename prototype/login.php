<?php
    session_start();
    include'config.php';

    if(isset($_POST['username'], $_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $connection->prepare("SELECT * FROM users WHERE username=?");
        

        $query->execute([$username]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result && password_verify($_POST['password'], $result['password'])){
            echo "<p class='success'>Connexion réussie !</p>";
        }
        else{
            echo "<p class='error'>Mauvais nom d'utilisateur ou mot de passe !</p>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <body>
        <form method="post" action="" name="login-form">
        <div class="form-element">
            <label>Username</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="login" value="login">Log In</button>
        </form>
    </body>
</html>