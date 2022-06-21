<!DOCTYPE html>
<?php
    require '../Controllers/Global/Auth.php';
    require '../Controllers/posts.php';
    $posts = new Posts;
    $posts = $posts->show();
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
            About You
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
                <div id="info">

                </div>
                    <?php
                    //Jeżeli nie ma frakcji i opisu
                    $true = false;
                    if($true){
                    ?>
                    <div class="text-center p-4 w-1/2 m-auto" id="form_desc">
                        <form action="">
                            <p class="p-2 text-5xl box-border mt-8">Join fraction , or <a href="./create_fraction.php" class="text-lighterWhite">create one yourself</a></p></br>
                            <p class="p-2 text-3xl box-border mt-4">What fraction you want to join</p></br>
                            <select class="w-96 text-black box-border h-10 text-center my-2">
                            <?php
                            $option = ["communits","capitalist","fascist","nazi"];
                            for($i=0; $i<4; $i++){
                                echo "<option>";
                                echo $option[$i];
                                echo "</option>";
                            }
                            ?>
                            </select></br>    
                            <p for="desc" class="p-2 text-3xl box-border mt-4">Your description</p></br>
                            <button type="button" id="desc_close" class="relative top-7 left-2 hidden h-4 w-4" onclick="descr_close()"><img src="../img/cross.svg" alt="close tab"></button>
                            <textarea type="text" id="add_desc" name="desc" class="pt-6 px-2 transform-[height] transition-all ease-in-out w-full m-auto text-black box-border h-10 mt-4 mb-8" onclick="desc_open()"></textarea></br> 
                            <button type="submit" id="send_desc" placeholder="Add your description" class="text-lg border-0 rounded-b-xl w-1/3 transition-all font-extrabold hover:bg-lightViolet h-0 overflow-hidden transform-[height] text-center">Send description</button>
                        </form>
                    </div>
                </div>
                <?php
                //do tąd
                }else{
                //jezeli jest opis i frakcja
                ?>
                <div class="w-5/6 mx-12 my-6 pt-8 h-full text-center">
                    <div class="p-4 border-b-2 w-fit m-auto rounded-md text-4xl pt-8">
                        Your profile <b class="text-lighterWhite"><?php echo Auth::user('username'); ?></b>
                    </div>
                    <div id="fraction" class="mt-4 text-3xl pt-6">
                        <div class="w-fit m-auto border-b-2 rounded-md pb-1 px-4">
                            Fraction 
                        </div>
                        <div class="text-2xl my-6">
                            Frakcja komunistow kurwa
                        </div>
                    </div>
                    <div id="desc" class="mt-4 text-3xl pt-6">
                        <div class="w-fit m-auto border-b-2 rounded-md pb-1 px-4">
                            Description
                    </div>
                        <div class="text-2xl my-6 h-72 w-2/3 m-auto mt-8 p-4">
                            Jestem kurwa gejem i cwleem pierdolonym zarzyganum i jestem dumny kurwa ze rzygam sobie do odbytu to ci przeszkadza ?? kurwa cwelu zasrtany zarzygany spierrdaaalaja  
                            <img src="../img/edit.svg" alt="" class="h-10 w-10 m-auto mt-4">
                        </div>
                    </div>
                </div>
                <?php
                // do tąd
                }   
                ?>
                <script>
                    if(!isLogged){
                       document.getElementById("info").innerHTML = "<h1 class='text-errorRed text-5xl text-center py-8'>Log in to give info about yourself</h1>"
                       document.getElementById("form_desc").classList.add("blur-sm")
                    }
                </script>
        </section>
    </main>
</body>
</html>