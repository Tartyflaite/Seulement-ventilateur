<?php
$query = DB()->prepare("SELECT * FROM content");
$result = $query->execute();

while($row = $query->fetch($result))
    {
    $username = $row['user'];
    $file = $row['image_path'];
    $description = $row['image_path'];
    ?>
        <div class="item">
            <div class="small_logo">
                <img src="../views/img/pp.jpeg" alt="user_logo">
            </div>
            <div class="item_wrapper">
                                <span class="username">
                                    <?php echo $username;?>
                                </span>
                <span class="description">
                                    <?php echo $description;?>
                                </span>
                <img class="content_item" src="<?php echo $file;?>" alt="content_img">
            </div>
        </div>
    <?php
}
