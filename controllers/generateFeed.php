<?php
require_once('db_conn.php');

//POUR LE FAIRE EN AVEC UNE REQUETE SLQ (POUR PLUS TARD)
//$stmt = DB()->query("SELECT * FROM users");
//
//$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//foreach ($users as $user){
//
//}

$mydir = 'public\ImageVentilo';

$files = array_diff(scandir($mydir), array('.', '..'));

foreach($files as $file) {
?>
    <img src="public/ImageVentilo/<?php echo $file; ?>">
<?php
}