<?php

require_once('upload_img.html');

if( isset($_POST['submit'])){


    $validExt = array('.jpg', '.jpeg', '.gif', '.png');
//    print_r($_FILES['upload_file']);
//    exit();
//    if($_FILES['submit']['error'] > 0){
//        echo "une erreur est survenu";
//        die;
//    }



    //$fileSize = $_FILES['upload_file']['size'];

    $fileName = $_FILES['upload_file']['name'];

    //$fileExt = "." . strtolower(substr(strchr($fileName, '.'), 1));

//    if(in_array($_FILES['upload_file']['type'], $validExt)){
//        echo "le fichier n'est pas une image";
//        die;
//    }

    //"tmp_name c'est l'endroit temporaire ou php stock l'image temporairement
    //https://stackoverflow.com/a/46172376
    if($_FILES['upload_file']['type'] == 'image/type'){
        echo "c une image";
    }
    $tmpName = $_FILES['upload_file']['tmp_name'];
    $filePath = "public\ImageVentilo\ ".$fileName;
    $resultat = move_uploaded_file($tmpName, $filePath);
    if($resultat){
        echo "transfert terminé !";
    }
}


