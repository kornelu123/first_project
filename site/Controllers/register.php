<?php
require_once '../Database/connDefault.php';
require_once '../Database/Database.php';
session_start();

    function CheckIfExist($login, $email)
    {
        $database = new Database;
        $row = $database->select('users', '*', "username= '$login' OR email = '$email' ");

        if($row[0]['username']==$login || $row[0]['email']==$email)
            {   return true;    }
        else
            {   return false;   }
    }

    if( isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) ) 
    {
        $login =  $_POST['login'];
        $password = password_hash($_POST['password'] , PASSWORD_DEFAULT);
        $email = $_POST['email'];

        if( CheckIfExist($login, $email) )
        {
            $_SESSION['err'] = "Bad data";
            header('Location: ../html/registerForm.php');
        }else{
            $database = new Database;
            $database->insert('users', '`id`, `username`, `password`, `email`, `squad` , `lang`', "NULL, '$login' , '$password' ,'$email' , '1', '1' ");
            $id = $database->select('users', "id','username ='$login'");
            
            setcookie('user',$id , time() + (86400 * 30), '/');
            header('Location: ../html/en_site.php');
        }
    } 
    else 
    {
        $_SESSION['err'] = 'somthing went wrong';
        header('Location: ../html/en_site.html');
    }

