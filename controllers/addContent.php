<?php

//  this script will add content to the database et directory (if file uploaded)
//  the precontion is to have at least a text or a file of the accepted extension

if(!isset($_POST['submit'])) leaveScript("Accedez au menu d'upload svp");


$description = $_POST['description'];

$filename = null;
$extension = null;
$newFilepath = null;

if(isset($_FILES['postImage'])){
//  retrieve file info for procedure
    $filepath = $_FILES['postImage']['tmp_name'];
    $fileSize = filesize($filepath);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);

    if (!($fileSize == 0)) {    //Empty file verification
        $allowedTypes = [
            'image/png' => 'png',
            'image/jpeg' => 'jpg'
        ];
        //  file extension verification
        if (in_array($filetype, array_keys($allowedTypes))) {

            $extension = $allowedTypes[$filetype];
            $filename = uniqid('ventil_').'.'.$extension;
            $targetDirectory = ".\ImageVentilo";
            $newFilepath = $targetDirectory . "/" . $filename;
        }
        else leaveScript("Mauvais format de fichier");
    }
}

//  model part : get the user id

$query_user = DB()->prepare("SELECT userId FROM fans WHERE username = ?");
$query_user->execute([$_SESSION['username']]);
$user_id = $query_user->fetch()['userId'];


//  no content verification
if($filename == null && $description == '') leaveScript("Veuillez publiez du contenu");

//  model : insert the retrieved value in the data base
$query = DB()->prepare("INSERT INTO content (imageName, description, userId) VALUES(?,?,?)");


//  2 possibilites : a file is uploaded or not
if($filename != null){

    $res = $query->execute([$filename, $description, $user_id]);

    if(!$res) leaveScript("Requête SQL impossible.");

    // File copy in the directory ImageVentilo
    if (!copy($filepath, $newFilepath)) leaveScript("L'image n'a pas pu être upload.");

    unlink($filepath); // Delete the temp file
}else{
    $res = $query->execute(['', $description, $user_id]);

    if(!$res) leaveScript("L'image n'a pas pu être upload.");
}


leaveScript(null);
