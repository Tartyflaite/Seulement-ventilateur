<?php
if(!isset($_POST['submit'])){
    exit();
}

if($_FILES['uploaded_file']['error'] > 0){
    // code erreur
    exit();
}

