<?php

function feed(): void
{
    $query = DB()->prepare("SELECT * FROM content ORDER BY contentId DESC");
    $result = $query->execute();

    while ($row = $query->fetch($result)) {
        $user_id = $row['userId'];

        $query_username = DB()->prepare("SELECT username, profilPictureName FROM fans WHERE userId = ?");
        $result_user = $query_username->execute([$user_id]);
        $user_info = $query_username->fetch($result_user);

        $file = get_ventil($row['imageName']);
        $description = $row['description'];

        include("views/feed.html");
    }
}