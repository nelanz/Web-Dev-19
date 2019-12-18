<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ./login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="application-name" content="EcoConscious">
    <meta name="description" content="Edukacyjna strona internetowa informująca o zmianach klimatu, ich przyczynach i skutkach">
    <meta name="keywords" content="ekologia, zmiana klimatu">
    <meta name="author" content="Nela Tomaszewicz & Agata Rudzka">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./login.css">

    <title>Home</title>
</head>

<body>
    <div class="content-wrap">
        <a class="home-link" href="../home.php">
            <h1 class="title">🌎EcoConscious</h1>
        </a>
        <nav id="menu">
            <input type="checkbox" id="tm">
            <ul class="main-menu clearfix">
                <li><a href="./logout.php" style="color: yellow">Wyloguj się</a></li>
                <li><a href="my_account.php">Moje konto</a></li>
                <li><a href="#">Koszyk</a></li>
                <li><a href="../about_us/about_us.php">O nas</a></li>
                <li><a href="../solutions/solutions.php">Wypełnij ankietę</a></li>
                <li><a href="#">Nasze produkty</a></li>
            </ul>
        </nav>
        <div class="box" style="background-color: <?php print isset($_COOKIE["colorcloud"]) ? $_COOKIE["colorcloud"] : "white" ?>; color: <?php print isset($_COOKIE["color"]) ? $_COOKIE["color"] : "black" ?>; overflow:auto">
            <div style="margin-top:0%">
                <h1 class="welcome-text2" >Twoje konto</h1>
                <?php
                echo '<h1 class="login-text" > Login: '.$_SESSION['username'].'</h1>';
                ?>

            </div>
        </div>
    </div>

</body>

</html>