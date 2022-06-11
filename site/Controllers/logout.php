<?php

    require_once '../Database/connDefault.php';
    session_start();
    unset($_COOKIE['user']);
    session_destroy();
    $conn-> close();

?>
