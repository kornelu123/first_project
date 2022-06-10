<?php
require_once '../Database/connDefault.php';

function CheckIfExist($login, $email, $conn)
{
    $findUser = $conn->prepare("SELECT * FROM `users` WHERE username = '". $login ."' OR email = '". $email ."'");
    $findUser->execute();
    $row = $findUser->fetch(PDO::FETCH_ASSOC);
    
    return $row;
}

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) ) 
{
    $login =  $_POST['login'];
    $password = password_hash($_POST['password'] , PASSWORD_DEFAULT);
    $email = $_POST['email'];
    
    $row = CheckIfExist($login, $email, $conn);
    if($row['username']==$login)
    {
        $error =  "Login jest już zajęty";
        header('Location: ../html/registerForm.html');
    }elseif($row['email']==$email)
    {
        $error = "email jest już zajęty";
        header('Location: ../html/registerForm.html');
    }
    
    $RegisterUser = $conn->prepare("INSERT INTO `users` (`id`, `username`, `password`, `email`, `squad` , `lang`) 
                                    VALUES (NULL, '".$login."','".$password."',NULL ,'1','1');" );
    try {
        $RegisterUser->execute();
    } catch (PDOException $e) {
        echo $e->getMeessage();
    }

    $CreatedUser = CheckIfExist($login,$email,$conn);
    setcookie('user', $CreatedUser['id'], time() + (86400 * 30), '/');
    header('Location: ../html/en_site.html');

} 
else 
{
    $err = 'Coś poszło nie tak';
    header('Location: ../html/en_site.html');
}

