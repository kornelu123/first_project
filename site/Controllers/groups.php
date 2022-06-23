<?php
    require_once '../Database/Database.php';

    class groups
    {

        public function show()
        {
            $database = new Database;
            return $database->select('`groups`', '*');
        }

        public function showOne($group)
        {
            $database = new Database;
            return $database->select('`groups`', '*', 'groups.id = "'.$group.'"');
        }

        public function create($name, $shortcut, $lang, $logo="NULL", $color="none")
        {
            $database = new Database;
            return $database->insert('groups', '`id`, `name`, `shortcut`, `logo`, `color`, `lang`', "NULL, '".$name."', '".$shortcut."', '".$logo."', '".$color."', '".$lang."'");
        }

        public function members($group)
        {
            $database = new Database;
            return $database->select('`users`' , '*', 'users.group = "'.$group.'"');
        }
        public function randomGroups($count)
        {
            $database = new Database;
            return $database->select('`groups`', '*','1=1','RAND()','LIMIT '.$count);
        }

    }