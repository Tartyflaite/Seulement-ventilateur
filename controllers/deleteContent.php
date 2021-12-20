<?php

if(!isset($_POST['submit']))
    leaveScript('appuyez sur la poubelle pour supprimer du contenu');


$contentId = $_POST['submit'];
$query = DB()->prepare("delete from content where contentId = ?");
$res = $query->execute([$contentId]);

if(!$res) leaveScript('impossible de supprimer le contenu');


leaveScript(null);
