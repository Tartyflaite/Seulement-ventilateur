<?php

if(!isset($_POST['submit'])) leaveScript("Accedez au menu d'upload svp");


$description = $_POST['description'];

$filename = null;
$extension = null;
$newFilepath = null;

if(isset($_FILES['postImage'])){
    $filepath = $_FILES['postImage']['tmp_name'];
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
            $filename = uniqid('ventil_').'.'.$extension;
            $targetDirectory = ".\ImageVentilo";
            $newFilepath = $targetDirectory . "/" . $filename;
        }
        else leaveScript("Mauvais format de fichier");
    }
}

$query_user = DB()->prepare("SELECT userId FROM fans WHERE username = ?");
$query_user->execute([$_SESSION['username']]);
$user_id = $query_user->fetch()['userId'];


if($filename == null && $description == '') leaveScript("Veuillez publiez du contenu");


$query = DB()->prepare("INSERT INTO content (imageName, description, userId) VALUES(?,?,?)");

if($filename != null){

    $res = $query->execute([$filename, $description, $user_id]);

    if(!$res) leaveScript("Requête SQL impossible.");


    if (!copy($filepath, $newFilepath)) leaveScript("L'image n'a pas pu être upload.");

    unlink($filepath); // Delete the temp file
}else{
    $res = $query->execute(['', $description, $user_id]);

    if(!$res) leaveScript("L'image n'a pas pu être upload.");
}


leaveScript(null);
