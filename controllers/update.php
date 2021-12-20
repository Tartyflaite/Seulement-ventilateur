<?php

if (!isset($_POST['submit'])){
    exit;
}

if (isset($_POST['username']) && $_POST['username'] != ''){
    $query = DB()->prepare("update fans set username = ?
                                    where username = ?");
    $res = $query->execute([$_POST['username'], $_SESSION['username']]);

    if($res) $_SESSION['username'] = $_POST['username'];
    else leaveUpdate('impossible de changer le pseudo');

}

if(isset($_POST['password']) && $_POST['password'] != ''){
    $query = DB()->prepare("update fans set password = ?
                                    where username = ?");
    $res = $query->execute([password_hash($_POST['password'], PASSWORD_BCRYPT), $_SESSION['username']]);

    if(!$res) leaveUpdate('impossible de changer le pseudo');

}

if(isset($_FILES['profile_picture'])){

    $filepath = $_FILES['profile_picture']['tmp_name'];
    $fileSize = filesize($filepath);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);

    if (!($fileSize === 0)) {
        $allowedTypes = [
            'image/png' => 'png',
            'image/jpeg' => 'jpg'
        ];

        if (in_array($filetype, array_keys($allowedTypes))) {

            $filename = uniqid('pp_');
            $extension = $allowedTypes[$filetype];
            $targetDirectory = "..\public\ProfilePicture";
            $newFilepath = $targetDirectory . "/" . $filename . "." . $extension;

            $query = DB()->prepare("update fans set profilPictureName = ? where username = ?");

            $res = $query->execute([$filename.'.'.$extension, $_SESSION['username']]);

            if(!$res) leaveUpdate('impossible de changer d\'avater');

            if (!copy($filepath, $newFilepath)) leaveUpdate('impossible de copier le fichier');

            unlink($filepath); // Delete the temp file

        }
    }
}

leaveUpdate(null);

function leaveUpdate($error){
    $_SESSION['flash']['error'] = $error;

    $_POST = array();
    $_FILES = array();
    header('Location: /public/index.php?controller=home');
    exit;
}
