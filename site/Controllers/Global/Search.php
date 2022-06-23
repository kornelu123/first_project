<?php
require_once '../Database/Database.php';

class Search
{
    public function users($input)
    {
        $database = new Database;
        return $database->select('users', '`username`, `group`, `lang`', '(`username` LIKE "%'.$input.'%" )');
    }

    public function groups($input)
    {
        $database = new Database;
        return $database->select('`groups`', '*', '(`name`LIKE "%'.$input.'%" ) OR (`shortcut` LIKE "%'.$input.'%" )');
    }
}