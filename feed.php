<?php

//  this function will load the content availabe in the database
//  starting from the newest on the top to the oldest content

function feed(): void
{
    // model : get all the available content
    $query = DB()->prepare("SELECT * FROM content ORDER BY contentId DESC");
    $result = $query->execute();

    while ($row = $query->fetch($result)) {
        $user_id = $row['userId'];

        // model : get the user info related to the content (foreign key)
        $query_username = DB()->prepare("SELECT username, profilPictureName FROM fans WHERE userId = ?");
        $result_user = $query_username->execute([$user_id]);
        $user_info = $query_username->fetch($result_user);

        //  those variable are retrieved in feed.html to load the proper information.
        $file = get_ventil($row['imageName']);
        $description = $row['description'];

        include("views/feed.html");
    }
}