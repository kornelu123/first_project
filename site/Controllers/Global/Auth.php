<?php
require_once '../Database/connDefault.php';
class Auth
{

    public function authorised()
    {
        if(isset($_COOKIE['user']))
        {
            return true;
        }else {
            return false;
        }
    }
    function user()
    {
        // $user = $conn->prepare("SELECT * FROM `users` WHERE id = '" . $_COOKIE['user'] . "' ");
        // try {
        //     $user->execute();
        // } catch (PDOException $e) {
        //     echo $e;
        // }
        
        // return $user;
    }
}