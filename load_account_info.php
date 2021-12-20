<?php

function load_account_info(){
    $username = $_SESSION['username'];

    $query = DB()->prepare("SELECT username, profilPictureName FROM fans WHERE username=?");

    $query->execute([$username]);

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(!$result){
        $_SESSION['flash']['error'] = "impossible de generer votre compte";
        $_SESSION['connected'] = false;
        $_POST = array();
        header( 'Location: /public/index.php?controller=index' );
        exit;
    }

    echo '<div class="account_preview">
            <img class="preview_pp_user" src="ProfilePicture/'.$result['profilPictureName'].'">
                <span class="account_username">'.$result['username'].'</span>
           </div>';
}
