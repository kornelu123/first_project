<?php

    require_once '../Database/Database.php';
    session_start();
    session_destroy();
    unset($_COOKIE['user']);
    setcookie('user', null, -1, '/'); 
    $database = new Database;
    $database->disconnect();
    header('Location: ../html/en_site.php');

?>
