<?php
    $_SESSION = array();
    $_SESSION['flash'] = array();
    header( 'Location: /public/index.php?controller=index' );
    exit;
