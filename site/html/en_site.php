<!DOCTYPE html>
<?php
    require '../Controllers/Global/Auth.php';
    require '../Controllers/posts.php';
    require '../Controllers/groups.php';
    $latest = new Posts;
    $posts = new Posts;
    $group = new Groups;
    if(isset($_POST['sort']))
        { $posts = $posts->show($_POST['order']); }
    else
        { $posts = $posts->show('DESC'); }

    if(isset($_POST['delete']))
        { Posts::delete($_POST['id']); }

    if(isset($_POST['edit']))
        { Posts::edit($_POST['id'],$_POST['title'],$_POST['content'],$_POST['lang']); }
    
    if(isset($_POST['joinGroup']))
        { $group->joinGroup(Auth::id(), $_POST['groupID']);}
    $latest = Posts::latest();

?>
<html lang="pl">
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
        <div class="absolute top-4 right-4 text-xl flex h-13 items-center">
            <div class=" bg-lighterWhite mr-4 border-2 rounded-b-md ">
                <form class="relative"> 
                    <textarea type="text" class="overflow-none resize-none py-2 text-black pl-7 w-20 h-10 my-auto transition-all ease-in-out transform-[width]" onclick="classToggling([[`search`,`remove`,`w-20`],[`search`,`add`,`w-60`],[`search_close`,`remove`,`invisible`]],true)" id="search"></textarea>
                    <button type="submit"><img src="../img/search.svg" class="w-8 h-8 mr-2"></button>
                    <button type="button" id="search_close" class="absolute invisible h-4 w-4 left-2 top-3"  onclick="classToggling([[`search`,`add`,`w-20`],[`search`,`remove`,`w-60`],[`search_close`,`add`,`invisible`]],true)" ><img src="../img/cross.svg"></button>
                </form>
            </div>
            <a href="../Controllers/logout.php" class="transition-colors ease-in-out bg-darkViolet hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-b-lg">Log-out</a>
            <a href="loginForm.php" class="transition-colors ease-in-out bg-darkViolet hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-b-lg mx-4">Log-in</a>
            <a href="registerForm.php" class="transition-colors ease-in-out bg-darkViolet hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-bl-lg">Sign-in</a>
        </div>
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
        <aside class="col-span-2 bg-basicViolet h-screen border-t-4 border-basicWhite text-basicWhite pl-5 pt-7">

            <div id="latest">
                <div class=" text-2xl">
                    Latest posts :
                </div> 
                <ul class="pl-4 pt-3">                    
                    <?php
                        foreach($latest as $post){
                            echo '<li class="my-2 pl-2 pr-4 border-l-2 rounded-md"><a href="#post_'.$post['id'].'">Post named : <b>'.$post['title'].'</b> by : <b>'.$post['username'].'</b></a></li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="pt-2 border-t-4">
                <div class=" text-2xl">
                    Dołącz do Frakcji/Grupy :
                </div> 
                <?php
                    foreach($group->randomGroups(5) as $randomGroup)
                    {
                        echo '<form method="POST" action="'.$_SERVER['PHP_SELF'].'" class="pl-4 ">';
                            echo $randomGroup['name'];
                            if(Auth::authorised())
                            {
                                echo '<input type="text" name="groupID" id="groupID" value="'.$randomGroup['id'].'" hidden="hidden">';
                                echo '<input type="submit" name="joinGroup" id="joinGroup" class="border-2 p-2" value="+">';
                            }else{ echo " X";}
                        echo '</form>';
                    }
                ?>
            </div>
        </aside>
        <section class="col-span-7 bg-basicDark h-screen text-basicWhite">
            <div id="main" class="ml-12 bg-basicViolet h-full border-t-4 opacity-70 border-basicWhite overflow-scroll">
                <div id="warning" class="text-center pt-10">
                    
                </div>
                <div class="w-auto max-h-fit h-24 mx-12 my-6 bg-darkerViolet rounded-lg transform-[height] transition-all" id="post_write">

                    <form class="h-full  overflow-hidden rounded-lg relative" method="POST" action="">
                        <button type="button" id="close_icon" class="absolute top-2 left-2 hidden h-4 w-4" onclick="classToggling([['post_write','add','h-24'],['post_write','remove','h-60'],['input_post','remove','h-32'],['input_post','add','h-5/6'],['send_post','remove','h-12'],['send_post','add','h-0'],['close_icon','add','hidden']],true)"><img src="../img/cross.svg" alt="close tab"></button>
                        <input type="text" name="title" class="w-full h-12 placeholder:text-center pb-1 pt-1 placeholder:font-extrabold text-black px-2" placeholder="Add title">
                        <textarea type="text" id="input_post" onclick="classToggling([['post_write','remove','h-24'],['post_write','add','h-60'],['input_post','add','h-32'],['input_post','remove','h-5/6'],['send_post','add','h-12'],['send_post','remove','h-0'],['close_icon','remove','hidden']],isLogged)" name="post" class="placeholder:font-extrabold placeholder:text-center transform-[height] pt-2 px-2 text-black w-full h-5/6 " placeholder="Write your post..."></textarea>
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
                        <button type="submit" name="sort" class="border-2 px-4 py-1 border-y-0 hover:bg-lightViolet bg-gradient-to-b from-basicViolet via-lightViolet to-basicViolet rounded-md">OK</button>
                    </form>
                </div>
                <?php 
                foreach ($posts as $post ) { ?>
                    <div id="post_<?php echo $post['id'] ;?>" class="ease-in-out h-72 w-auto m-12 bg-darkerViolet border-t-2 border-basicWhite text-basicWhite">
                        <div class="h-5/6 overflow-hidden" id="content_<?php echo $post['id']; ?>">
                            <?php    
                                if(Auth::authorised() && Auth::id() == $post['user'])
                                {
                                    echo '<form action=' .$_SERVER['PHP_SELF']. ' method="POST" type="hidden" >';
                                        echo '<input type="hidden" name="id" id="id" value="'. $post['id']. '">';
                                        echo '<input type="hidden" name="lang" id="id" value="'. $post['lang']. '">';
                                }
                                    echo '<div id="title'.$post["id"].'" class="pl-4 pt-3 pb-2 text-xl text-lighterWhite bg-gradient-to-r from-basicViolet to-darkerViolet font-extrabold border-b-2 w-1/3 float-left">'.$post['title'].'</div>';
                                    echo '<div class="float-right text-xl font-extrabold pr-4 pt-3 pb-2 border-b-2 bg-gradient-to-l from-basicViolet to-darkerViolet">By : '.$post['username'].'</div><br/>';
                                    echo '<div id="content'.$post["id"].'" class="clear-both text-lg px-6 py-4 max-h-42">'.$post['content'].'</div>';
                                    
                                if(Auth::authorised() && Auth::id() == $post['user'])
                                {
                                        echo '<button id="button'.$post["id"].'" type="submit" name="edit" class="hidden mx-auto border-2 font-extrabold px-10 py-1 border-y-0 rounded-md bg-gradient-to-b from-darkerViolet via-basicViolet to-darkerViolet" >OK</button>';
                                    echo '</form>'; 
                                }
                            ?>
                        </div>
                        <div id="tool_<?php echo $post['id']; ?>" class="h-14 border-t-2 bg-basicDark flex items-center gap-4 justify-end px-8 py-3 text-lg">
                            <?php
                                if(Auth::authorised() && Auth::id() == $post['user'])
                                {
                                    echo '<form action=' .$_SERVER['PHP_SELF']. ' method="POST" class="my-auto mt-1">';  
                                        echo '<input type="hidden" name="id" id="id" value="'. $post['id']. '">';
                                        echo '<button type="submit" name="delete" onclick="return confirm(`Are you sure you want to delete?`)" value="" class="font-extrabold cursor-pointer my-auto"><img class="h-auto w-auto" src="../img/delete.svg"></button>';
                                    echo '</form>';
                                    echo '<div id= "edit" class="px-6 font-extrabold cursor-pointer" onclick="editChange(`'.$post["id"].'`, `'.$post["content"].'`, `'.$post["title"].'` )"><img src="../img/edit.svg"  class="h-auto w-auto"></div>';
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
        function editChange(id, content, title )
        {
            button = document.getElementById("button"+id);

            if(window.getComputedStyle(button).display == "none"){
                document.getElementById("title"+id).innerHTML = '<input value ="'+title+'" class="text-black p-1" name="title">';
                document.getElementById("content"+id).innerHTML = '<input value ="'+content+'" class="text-black h-24 w-full mt-2" name="content">';
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