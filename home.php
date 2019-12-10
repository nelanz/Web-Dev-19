<?php
require_once('./login/config.php');
require_once('./login/functions.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="application-name" content="EcoConscious">
    <meta name="description"
        content="Edukacyjna strona internetowa informująca o zmianach klimatu, ich przyczynach i skutkach">
    <meta name="keywords" content="ekologia, zmiana klimatu">
    <meta name="author" content="Nela Tomaszewicz & Agata Rudzka">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="default.css">

    <title>Home</title>
</head>

<body>
    <div class="content-wrap">
        <a class="home-link" href="home.php">
            <h1 class="title">🌎EcoConscious</h1>
        </a>
        <nav id="menu">
            <input type="checkbox" id="tm">
            <ul class="main-menu clearfix">
            <?php
                if(isset($_SESSION['user_id'])) {
                    echo '<li><a href="login/logout.php" style="color: yellow">Wyloguj</a></li>';
                } else {
                    echo '<li><a href="login/login.php" style="color: yellow">Logowanie</a></li>';
                }
            ?>
                <li><a href="about_us.html">O nas</a></li>
                <li><a href="solutions/solutions.php">Wypełnij ankietę</a></li>
                <li><a href="#">Nasze produkty</a></li>
            </ul>
        </nav>
        <div class="box">
            <?php
                if(!isset($_SESSION['user_id'])) {
                    echo '<h1 id="shop-title">Kupuj świadomie. Ziemia jest tylko jedna.</h1>';
                } else {
                    $user_id = $_SESSION['user_id'];
                    $user = in_array_r($user_id, $users);
                    echo '<h1 id="shop-title">'.'Witaj '.$user['username']. '! Zapraszamy na zakupy!'."</h1>";
                }
            ?>
        </div>
    </div>

</body>

</html>