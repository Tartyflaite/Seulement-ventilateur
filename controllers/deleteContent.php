<?php

if(!isset($_POST['submit']))
    leaveScript('appuyez sur la poubelle pour supprimer du contenu');


$contentId = $_POST['submit'];

$imageNameQuery = DB()->prepare("select imageName from content where contentId = ?");
$imageResult = $imageNameQuery->execute([$contentId]);
if(!$imageResult)
    leaveScript('impossible de recuperer le contenu (sql error)');

$imageName = $imageNameQuery->fetch();


$deleteQuery = DB()->prepare("delete from content where contentId = ?");
$result = $deleteQuery->execute([$contentId]);
if(!$result)
    leaveScript('impossible de supprimer le contenu');


unlink('ImageVentilo/'.$imageName['imageName']);

leaveScript(null);
