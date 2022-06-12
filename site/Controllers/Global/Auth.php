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
}