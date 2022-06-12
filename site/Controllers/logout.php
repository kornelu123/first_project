<?php

    require_once '../Database/Database.php';
    session_start();
    session_destroy();
    unset($_COOKIE['user']);
    $database = new Database;
    $database->disconect();
    header('../html/en_site.php');

?>
