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
    public function id()
    {
        return $_COOKIE['user'];
    }
    
    public function user($column)
    {
        if($_COOKIE['user'] != null)
        {
        $id =$_COOKIE['user'];
        $db = new Database;
        $user = $db->select('users', '*', "id ='$id' ");
        
        return $user[0][$column];
        }else
        {
            return "un authorised";
        }
    }
}