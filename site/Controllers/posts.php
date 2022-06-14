<?php
    require_once '../Database/Database.php';
    require_once 'Global/Auth.php';
    
    class posts
    {
        public function show()
        {
            $database = new Database;
            return $database->select('posts, users', 'posts.*, users.username','posts.user = users.id','posts.id');
        }

        
        public function create($title, $content)
        {
            $database = new Database;
            $database->insert('posts','title, content, user, lang', "'$title', '$content', '".Auth::id()."' ,'".Auth::user('lang')."'");
        }

    }
