<?php
require_once '../Database/connDefault.php';
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login =  $_POST['login'];
    $password = $_POST['password'];

    $getUser = $conn->prepare("SELECT * FROM users WHERE username = '" . $login . "' ");
    
    try {
        $getUser->execute();
    } catch (PDOException $e) {
        echo $e;
    }
    $user = $getUser->fetch(PDO::FETCH_ASSOC);
    var_dump($getUser);

    if(password_verify($password,$user['password']))
    {
        setcookie('user', $user['username'], time() + (86400 * 30), '/');
        header('Location: ../html/en_site.php');
    }else
    {
        $_SESSION['err'] = "Bad data";
        header('Location: ../html/loginForm.php');
    }
    
} else {
    echo 'nie działa';
}
