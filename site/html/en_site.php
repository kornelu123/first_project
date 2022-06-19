<!DOCTYPE html>
<?php
    require '../Controllers/Global/Auth.php';
    require '../Controllers/posts.php';
    
    $posts = new Posts;
    if(isset($_POST['sort']))
        { $posts = $posts->show($_POST['order']); }
    else
        { $posts = $posts->show(); }

    if(isset($_POST['delete']))
        { Posts::delete($_POST['id']); }

    if(isset($_POST['edit']))
        { Posts::edit($_POST['id'],$_POST['title'],$_POST['content'],$_POST['lang']); }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Montserrat&display=swap" rel="stylesheet"> 
    <script src="../scripts/readMore.js"></script>
</head>
<body class=" font-classicFont bg-basicDark">
    <nav id="cwel" class="w-full h-fit bg-basicDark text-basicWhite grid items-center mb-4">
        <h2 class="absolute top-4 left-4 p-4 text-lg">
            <?php
                    if(Auth::authorised()){
                        echo 'You are logged in as <span class="text-darkerWhite">'.Auth::user('username').'</span>';
                        echo '<script>isLogged = true ; 
                        isInFraction = true;</script>';
                    }
                ?>
        </h2>
        <h2 class="absolute top-4 right-4 text-xl">
            <a href="../Controllers/logout.php" class="bg-darkViolet hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-b-lg">Log-out</a>
            <a href="loginForm.php" class="bg-darkViolet hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-b-lg m-4">Log-in</a>
            <a href="registerForm.php" class="bg-darkViolet hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-bl-lg">Sign-in</a>
        </h2>
    <div class=" flex justify-center flex-col items-center m-auto mt-20 mb-12">
        <h1 class="text-6xl after:clear-both hover:text-lighterWhite">
            Forum for cwel's
        </h1>
        <h1 class="text-2xl pt-4" id="section_info">
            All posts
        </h1>
    </div>
        <button id="toggle" class="m-4 flex justify-center"><img src="../img/menu.svg" id="button" class="transition-all ease-[cubic-bezier(.32,.82,.89,.39)] w-10 h-10" alt="toggle_menu"></button>
        <menu>
            <ul class="grid h-0 hover:text-darkerWhite grid-cols-4 transition-all text-slate-200 bg-basicDark absolute w-full overflow-hidden" id="menu">
                <li class="w-full text-center bg-basicDark h-full cursor-pointer hover:scale-x-110 duration-150 delay-75 hover:z-20 z-10 hover:rounded-xl hover:text-lighterWhite overflow-visible pt-7 pb-6 border-r-slate-200 border-r-2 hover:bg-basicViolet hover:border-0 transition-colors ease-in-out block"><a href="./en_site.php" class="w-full h-full">All posts</a></li>
                <li class="w-full text-center bg-basicDark h-full cursor-pointer hover:scale-x-110 duration-150 delay-75 hover:z-20 z-10 hover:rounded-xl hover:text-lighterWhite overflow-visible pt-7 pb-6 border-r-slate-200 border-r-2 hover:bg-basicViolet hover:border-0 transition-colors ease-in-out block"><a href="./en_guild_site.php">Fraction posts</a></li>
                <li class="w-full text-center bg-basicDark h-full cursor-pointer hover:scale-x-110 duration-150 delay-75 hover:z-20 z-10 hover:rounded-xl hover:text-lighterWhite overflow-visible pt-7 pb-6 border-r-slate-200 border-r-2 hover:bg-basicViolet hover:border-0 transition-colors ease-in-out block"><a href="./en_about_you.php">About You</a></li>
                <li class="w-full text-center bg-basicDark h-full cursor-pointer hover:scale-x-110 duration-150 delay-75 hover:z-20 z-10 hover:rounded-xl hover:text-lighterWhite overflow-visible pt-7 pb-6 hover:bg-basicViolet hover:border-0 transition-colors ease-in-out block">Chuj</li>
            </ul>
        </menu>
        <script src="../scripts/menu_script.js"></script>
    </nav>
    <main class="grid grid-cols-9">
        <aside class="col-span-2 bg-basicViolet h-screen border-t-4 border-basicWhite">
            <div id="latest">
                
            </div>
        </aside>
        <section class="col-span-7 bg-basicDark h-screen text-basicWhite">
            <div id="main" class="ml-12 bg-basicViolet h-full border-t-4 opacity-70 border-basicWhite overflow-scroll">
                <div id="warning" class="text-center pt-10">
                    
                </div>
                <div class="w-auto max-h-fit h-24 mx-12 my-6 bg-darkerViolet rounded-lg transform-[height] transition-all" id="post_write">

                    <form class="h-full  overflow-hidden rounded-lg relative" method="POST" action="">
                        <button type="button" id="close_icon" class="absolute top-2 left-2 hidden h-4 w-4" onclick="textArea_out('post_write')"><img src="../img/cross.svg" alt="close tab"></button>
                        <input type="text" name="title" class="w-full h-12 placeholder:text-center pb-1 pt-1 placeholder:font-extrabold text-black px-2" placeholder="Add title">
                        <textarea type="text" id="input_post" onclick="textArea_in('post_write')" name="post" class="placeholder:font-extrabold placeholder:text-center transform-[height] pt-2 px-2 text-black w-full h-5/6 " placeholder="Write your post..."></textarea>
                        <button type="send_post" id="send_post" class="h-0 w-full py-5 text-center transform-[height] transition-all font-extrabold text-lighterWhite">Send post</button>
                    </form>
                    <?php
                    if( !empty($_POST['post']) && !empty($_POST['title']) && isset($_POST['post']))
                    {
                        $create = new Posts;
                        $create->create($_POST['title'], $_POST['post'], '1', '1');
                        unset($_POST);
                    }elseif(isset($_POST['post'])){
                        echo "<div>";
                        echo "complete all fields";
                        echo "</div>";
                    }?>
                </div>
                <div id="sort" class="mx-12 text-center pt-6">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    Sort by : 
                        <select name="order" id="order" class="text-black mx-2 p-1">
                            <option value="ASC">Oldest</option>
                            <option value="DESC">Newest</option>
                        </select>
                        <button type="submit" name="sort" class="border-2 px-4 py-1 border-y-0 hover:bg-lightViolet bg-gradient-to-b from-basicViolet via-lightViolet to-basicViolet rounded-md"> OK </button>
                    </form>
                </div>
                <?php 
                foreach ($posts as $post ) { ?>
                    <div id="post_<?php echo $post['id'] ;?>" class="ease-in-out h-72 w-auto m-12 bg-darkerViolet border-t-2 border-basicWhite text-basicWhite">
                        <div class="h-5/6 overflow-hidden" id="content_<?php echo $post['id']; ?>">
                            <?php    
                                
                                echo '<div id="title'.$post["id"].'" class="pl-4 pt-3 pb-2 text-xl text-lighterWhite bg-gradient-to-r from-basicViolet to-darkerViolet font-extrabold border-b-2 w-1/3 float-left">'.$post['title'].'</div>';
                                echo '<div class="float-right text-xl font-extrabold pr-4 pt-3 pb-2 border-b-2 bg-gradient-to-l from-basicViolet to-darkerViolet">By : '.$post['username'].'</div><br/>';
                                echo '<div id="content'.$post["id"].'" class="clear-both text-lg px-6 py-4 mb-2 max-h-42">'.$post['content'].'</div><br/>';        

                                if(Auth::authorised() && Auth::id() == $post['user'])
                                {
                                    echo '<button id="button'.$post["id"].'" type="submit" name="edit" class="hidden" > OK</button>';
                                    echo '</form>'; 
                                }
                            ?>
                        </div>
                        <div id="tool_<?php echo $post['id']; ?>" class="h-14 border-t-2 bg-basicDark flex items-center justify-end px-8 py-2 text-lg">
                            <?php
                                if(Auth::authorised() && Auth::id() == $post['user'])
                                {
                                    echo '<form action=' .$_SERVER['PHP_SELF']. ' method="POST">';  
                                        echo '<input type="hidden" name="id" id="id" value="'. $post['id']. '">';
                                        echo '<input type="submit" name="delete" value="X" class="font-extrabold cursor-pointer">';
                                    echo '</form>';
                                    echo '<div id= "edit" class="px-6 font-extrabold cursor-pointer" onclick="editChange(`'.$post["id"].'`, `'.$post["content"].'`, `'.$post["title"].'` )"> ... </div>';
                                        echo '<form action=' .$_SERVER['PHP_SELF']. ' method="POST" type="hidden" >';
                                        echo '<input type="hidden" name="id" id="id" value="'. $post['id']. '">';
                                    echo '<input type="hidden" name="lang" id="id" value="'. $post['lang']. '">';
                                }
                            ?>
                            <button type="button" id="read_<?php echo $post['id'] ?>" onclick="read(<?php echo $post['id'];?>)" class="text-lighterWhite font-extrabold"></button>
                        </div>
                    </div>
                    <script>
                        overflow("<?php echo $post['id'] ;?>");
                    </script>
                <?php }?>
            </div>
        </section>
    </main>
    <script>
        if(window.history.replaceState)
            { window.history.replaceState(null, null , window.location.href); }
        function editChange(id, title , content)
        {
            button = document.getElementById("button"+id);

            if(window.getComputedStyle(button).display == "none"){
                document.getElementById("title"+id).innerHTML = '<input value ="'+title+'" name="title">';
                document.getElementById("content"+id).innerHTML = '<input value ="'+content+'" name="content">';
                button.style.display = "block";
            }
            else{
                document.getElementById("title"+id).innerHTML = title;
                document.getElementById("content"+id).innerHTML = content;
                button.style.display = "none";
            }
        }
    </script>
</body>
</html>