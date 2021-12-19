<?php

    if(isset($_POST['submit'])){
        $query_user = DB()->prepare("SELECT userId FROM fans WHERE username = ?");
        $query_user->execute([$_SESSION['username']]);
        $user_id = $query_user->fetch()['userId'];

        $description = $_POST['description'] ?? '';

        if(isset($_FILES['postImage'])){
            $filepath = $_FILES['postImage']['tmp_name'];
            $fileSize = filesize($filepath);
            $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
            $filetype = finfo_file($fileinfo, $filepath);

            if (!($fileSize === 0)) {
                $allowedTypes = [
                    'image/png' => 'png',
                    'image/jpeg' => 'jpg'
                ];

                if (in_array($filetype, array_keys($allowedTypes))) {

                    $filename = uniqid('ventil_');
                    $extension = $allowedTypes[$filetype];
                    $targetDirectory = ".\ImageVentilo";
                    $newFilepath = $targetDirectory . "/" . $filename . "." . $extension;

                    $query = DB()->prepare("INSERT INTO content (imageName, description, userId) VALUES(?,?,?)");

                    $res = $query->execute([$filename.'.'.$extension, $description, $user_id]);


                    if($res){
                        if (!copy($filepath, $newFilepath)) { // Copy the file, returns false if failed
                            $_SESSION['flash']['error'] = "L'image n'a pas pu être upload.";
                            header( 'Location: /public/index.php?controller=home' );
                            exit;
                        }
                        unlink($filepath); // Delete the temp file
                    }
                }
            }
        }

        else{
            $query = DB()->prepare("INSERT INTO content (imageName, description, userId) VALUES(?,?,?)");
            $res = $query->execute(['', $description, $user_id]);
        }
    }

$_FILES = array();
header( 'Location: /public/index.php?controller=home' );
exit;
