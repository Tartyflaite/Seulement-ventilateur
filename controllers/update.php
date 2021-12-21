<?php

//  This script will update the user credentials with new value passed in
//  the profil editor section.

if (!isset($_POST['submit'])){
    leaveScript("Passez par l'editeur de profil");
}

//  See addContent.php for file verification explanation
if(isset($_FILES['profile_picture'])){
    $filepath = $_FILES['profile_picture']['tmp_name'];
    $fileSize = filesize($filepath);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);


    if (!($fileSize == 0)) {
        $allowedTypes = [
            'image/png' => 'png',
            'image/jpeg' => 'jpg'
        ];

        if (in_array($filetype, array_keys($allowedTypes))) {
            $extension = $allowedTypes[$filetype];
            $filename = uniqid('pp_').'.'.$extension;
            $targetDirectory = "..\public\ProfilePicture";
            $newFilepath = $targetDirectory . "/" . $filename;

            //  model: get the current profilePictureName for it to be deleted when changed.
            $imageNameQuery = DB()->prepare("select profilPictureName from fans where username = ?");
            $imageResult = $imageNameQuery->execute([$_SESSION['username']]);
            if(!$imageResult)
                leaveScript('impossible de recuperer le contenu (sql error)');

            $imageName = $imageNameQuery->fetch();

            // model : upate the user profile picture
            $query = DB()->prepare("update fans set profilPictureName = ? where username = ?");

            $res = $query->execute([$filename, $_SESSION['username']]);

            if(!$res) leaveScript('impossible de changer d\'avater');

            // file copy to the ProfilePicture directory
            if (!copy($filepath, $newFilepath)) leaveScript('impossible de copier le fichier');

            // delete the past profile picture unless its the default one
            if($imageName['imageName'] != 'defaultPP.png')
                unlink('ProfilePicture/'.$imageName['imageName']);

            unlink($filepath); // Delete the temp file

        }else leaveScript('Mauvais format de fichier');
    }
}

if (isset($_POST['username']) && $_POST['username'] != ''){
    // model : update the username
    $query = DB()->prepare("update fans set username = ?
                                    where username = ?");
    $res = $query->execute([$_POST['username'], $_SESSION['username']]);

    if($res) $_SESSION['username'] = $_POST['username'];
    else leaveScript('impossible de changer le pseudo');

}

if(isset($_POST['password']) && $_POST['password'] != ''){
    // model : update the password
    $query = DB()->prepare("update fans set password = ?
                                    where username = ?");
    $res = $query->execute([password_hash($_POST['password'], PASSWORD_BCRYPT), $_SESSION['username']]);

    if(!$res) leaveScript('impossible de changer le pseudo');

}

leaveScript(null);
