<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class="font-classicFont bg-basicDark">
<nav id="cwel" class="w-full h-fit bg-basicDark text-basicWhite grid items-center mb-4">
        <h2 class="absolute top-4 right-4 text-xl">
            <a href="../Controllers/logout.php" class="bg-darkViolet hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-b-lg">Log-out</a>
            <a href="loginForm.php" class="bg-darkViolet transition-colors hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-b-lg m-4">Log-in</a><a href="registerForm.php" class="bg-darkViolet transition-colors hover:text-lighterWhite hover:bg-basicViolet px-4 py-2 border-2 border-basicWhite rounded-bl-lg">Sign-in</a>
        </h2>
    <div class=" flex justify-center items-center m-12 mt-20">
        <h1 class="text-6xl after:clear-both hover:text-lighterWhite">
            Forum for cwel's
        </h1>
    </div>
        <button id="toggle" class="m-4 flex justify-center"><img src="../img/menu.svg" id="button" class="transition-all ease-[cubic-bezier(.32,.82,.89,.39)] w-10 h-10" alt="toggle_menu"></button>
        <menu>
            <ul class="grid h-0 items-center hover:text-darkerWhite grid-cols-4 transition-all text-slate-200 bg-basicDark absolute w-full overflow-hidden" id="menu">
                <a href="./en_site.php"><li class="w-full text-center h-fit cursor-pointer hover:scale-125 duration-150 delay-75 hover:z-20 hover:rounded-xl hover:text-lighterWhite overflow-visible py-6 border-r-slate-200 border-r-2 hover:bg-basicViolet hover:border-0 transition-colors ease-in-out block">Home</li></a>
                <li class="w-full text-center h-fit cursor-pointer hover:scale-125 duration-150 delay-75 hover:z-20 hover:rounded-xl hover:text-lighterWhite overflow-visible py-6 border-r-slate-200 border-r-2 hover:bg-basicViolet hover:border-0 transition-colors ease-in-out block">Cipa</li>
                <li class="w-full text-center h-fit cursor-pointer hover:scale-125 duration-150 delay-75 hover:z-20 hover:rounded-xl hover:text-lighterWhite overflow-visible py-6 border-r-slate-200 border-r-2 hover:bg-basicViolet hover:border-0 transition-colors ease-in-out block">Pizda</li>
                <li class="w-full text-center h-fit cursor-pointer hover:scale-125 duration-150 delay-75 hover:z-20 hover:rounded-xl hover:text-lighterWhite overflow-visible py-6 hover:bg-basicViolet hover:border-0 transition-colors ease-in-out block">Chuj</li>
            </ul>
        </menu>
        <script src="../scripts/menu_script.js"></script>
    </nav>
    <main class="h-screen  text-basicWhite grid grid-cols-9 justify-center bg-darkerViolet">
        <aside class=" col-span-2 border-t-4 border-basicWhite bg-basicViolet">
            <div id="latest">
                
            </div>
        </aside>
        <section class="col-span-7 bg-basicDark">
            <div class="ml-12 w-full h-full bg-basicViolet border-t-4 border-basicWhite">
                <div class="w-1/4 h-full m-auto bg-gradient-to-l from-basicViolet via-lightViolet to-basicViolet pt-12">
                    <h1 class="text-center pt-20 text-4xl p-10">
                        Sign into nazwa forum
                    </h1>
                    <div class="flex items-center justify-center text-center text-xl">
                        <form action="../Controllers/register.php" method="POST">
                            E-mail:  <br>
                            <input type="email" name="email" required class="m-6 mb-12 text-black text-center"> <br>
                            Login :  <br>
                            <input type="text" name="login" required class="m-6 mb-12 text-black text-center"> <br>
                            Password :  <br>
                            <input type="password" name="password" required class="m-6 mb-12 text-black text-center"> <br>
                            <button type="submit" class="text-2xl border-2 py-2 px-8 m-10 rounded-b-lg bg-basicViolet hover:bg-lightViolet hover:text-lighterWhite border-basicWhite">Sign-in</button> <br>
                        </form> <br>
                        <?php
                            if(isset($_SESSION['err'])){
                                echo $_SESSION['err'];
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<script src="../scripts/info.js"></script>
</body>
</html>