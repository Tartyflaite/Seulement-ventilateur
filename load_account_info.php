<?php
//this function will load the small preview in home.htlm
//it will show the username and the profile picture
function load_account_info(){
    $username = $_SESSION['username'];

    // model : get the user's username and profil picture
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
    // the html is echoed directly in home.html
    echo '<div class="account_preview">
            <img class="preview_pp_user" src="ProfilePicture/'.$result['profilPictureName'].'">
            <span class="account_username">'.$result['username'].'</span>
           </div>';
}
