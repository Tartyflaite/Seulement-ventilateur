<?php

//  this script will delete given content in the database
//  the html will provide a trash button under every user's content
//  (not other unless admin)

if(!isset($_POST['submit']))
    leaveScript('appuyez sur la poubelle pour supprimer du contenu');

//  retrieve the post id set as a value in html div (see feed.php and feed.html)
$contentId = $_POST['submit'];


//  model : get the image name from the content
$imageNameQuery = DB()->prepare("select imageName from content where contentId = ?");
$imageResult = $imageNameQuery->execute([$contentId]);
if(!$imageResult)
    leaveScript('impossible de recuperer le contenu (sql error)');

$imageName = $imageNameQuery->fetch();

//  model : delete the content from data base
$deleteQuery = DB()->prepare("delete from content where contentId = ?");
$result = $deleteQuery->execute([$contentId]);
if(!$result)
    leaveScript('impossible de supprimer le contenu');

// delete the image file from the directory ImageVentilo
unlink('ImageVentilo/'.$imageName['imageName']);

leaveScript(null);
