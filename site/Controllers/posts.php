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

        public function edit($id, $title, $content ,$lang)
        {
            $database = new Database;
            $database->update('posts',$id ,'title = "' .$title. '", content= "' .$content. ' ", lang="' .$lang. '"' );
        }

        public function delete($id)
        {
            $database = new Database;
            $database->delete($id);
        }

        public function sort($column ,$order='ASC')
        {
            $database = new Database;
            $database->sort('posts', $column, $order);
        }
    }
