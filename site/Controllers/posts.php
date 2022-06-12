<?php
    require_once '../Database/Database.php';
    
    class posts
    {
        public function show()
        {
            $database = new Database;
            return $database->select('posts, users', 'posts.*, users.username, users.id','posts.user = users.id','posts.id');
        }
    }
