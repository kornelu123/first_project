<?php
    require_once '../Database/Database.php';
    require_once 'Global/Auth.php';
    
    class posts
    {
        public function show($order = "ASC")
        {
            $database = new Database;
            return $database->select('posts, users', 'posts.*, users.username', 'posts.user = users.id', 'posts.id',$order );
        }

        public function showByGroup($group, $order = "ASC")
        {
            $database = new Database;
            return $database->select('posts, users', 'posts.*, users.username ', ' posts.group = "'.$group.'"', 'posts.id',$order );
        }
        
        public function showByLang($lang, $order = "ASC")
        {
            $database = new Database;
            return $database->select('posts, users', 'posts.*, users.username', ' posts.lang = "'.$lang.'"', 'posts.id',$order );
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
            $database->delete('posts', $id);
            return header("Location: " .$_SERVER[HTTP_REFERER]);
        }

        public function latest()
        {
            $database = new Database;
            return $database->select('posts, users', 'posts.*, users.username', 'posts.user = users.id', 'posts.id','DESC LIMIT 5' );
        }
    }
