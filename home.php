<?php
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
                if(isset($_SESSION['loggedin'])) {
                    echo '<li><a href="login/logout.php" style="color: yellow">Wyloguj</a></li>';
                    echo '<li><a href="login/my_account.php">Moje konto</a></li>';
                    echo '<li><a href="#">Koszyk</a></li>';
                } else {
                    echo '<li><a href="login/login.php" style="color: yellow">Logowanie</a></li>';
                }
            ?>
                <li><a href="register/register.php">Rejestracja</a></li>
                <li><a href="about_us/about_us.php">O nas</a></li>
                <li><a href="solutions/solutions.php">Wypełnij ankietę</a></li>
                <li><a href="#">Nasze produkty</a></li>
            </ul>
        </nav>
        <div class="box">
            <?php
                if(!isset($_SESSION['loggedin'])) {
                    echo '<h1 id="shop-title">Kupuj świadomie. Ziemia jest tylko jedna.</h1>';
                } else {
                    echo '<h1 id="shop-title">'.'Witaj '.$_SESSION['username']. '! Zapraszamy na zakupy!'."</h1>";
                }
            ?>
        </div>
    </div>

</body>

</html>