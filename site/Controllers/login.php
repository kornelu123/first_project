<?php
require_once '../Database/Database.php';
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login =  $_POST['login'];
    $password = $_POST['password'];
    $Database = new Database;
    
    if( $user = $Database->select('users', '*', "username= '$login'") )
    {
        $user = $user[0];
        
        if(password_verify($password,$user['password']))
        {
            setcookie('user', $user['id'], time() + (86400 * 30), '/');
            header('Location: ../html/en_site.php');
        }else
        {
            $_SESSION['err'] = "Bad data";
            header('Location: ../html/loginForm.php');
        }
    }else{
        $_SESSION['err'] = "Bad data";
        header('Location: ../html/loginForm.php');
    }
} else {
    echo 'nie działa';
}
