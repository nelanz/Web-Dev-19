<?php
require_once('../login/config.php');
require_once('../login/functions.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="ekologia, zmiana klimatu, o nas">
    <meta name="author" content="Nela Tomaszewicz & Agata Rudzka">
    <meta name="description" content="Dowiedz się o nas i naszej misji.">

    <link rel="stylesheet" href="../default.css">
    <link rel="stylesheet" href="./about_us.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
    <title>O nas</title>    
    <script src="/script.js"></script>
    <script src="/start.js"></script>

</head>

<body >
    <div class="content-wrap">
        <a class="home-link" href="../home.php">
            <h1 class="title">🌎EcoConscious</h1>
        </a>
        <nav id="menu">
            <input type="checkbox" id="tm">
            <ul class="main-menu clearfix">
            <?php
                if(isset($_SESSION['user_id'])) {
                    echo '<li><a href="../login/logout.php" style="color: yellow">Wyloguj</a></li>';
                    echo '<li><a href="../login/my_account.php">Moje konto</a></li>';
                    echo '<li><a href="#">Koszyk</a></li>';
                } else {
                    echo '<li><a href="../login/login.php" style="color: yellow">Logowanie</a></li>';
                }
            ?>
                <li><a href="about_us.php">O nas</a></li>
                <li><a href="../solutions/solutions.php">Wypełnij ankietę</a></li>
                <li><a href="#">Nasze produkty</a></li>
            </ul>
        </nav>

        <div class="about-us-box" style="height: 55%">
            <h1 class="question">Kim jesteśmy?</h1>
            <div class="some-columns">
                <p style="font-size: 15px">
                    Jesteśmy dwoma studentkami zaniepokojonymi wpływem ludzi na zmianę klimatu. Budując naszą aplikację
                    chcemy:
                </p>

                <p>
                    <ul class="default-list">
                        <li>Uświadomić więcej osób o zagrożeniach dla środowiska naturalnego jakie niosą ze sobą
                            destrukcyjne działania człowieka.</li>
                        <li style="font-size: 1.2em">Przypomnieć, że <mark>Ziemia jest tylko jedna!</mark></li>
                        </ol>
                </p>
                <div class="shadow-element">
                    <p style="font-size: 20px; padding-top: 20px">
                        <a id = "join-us" href="/join_us.html">
                            Dołącz do nas 
                        </a>
                        i zmieniaj świat na lepsze!</p>
                </div>

            </div>
        
           <div id="first_step">
             <label>Pierwszy krok do zmiany nawyków ->
                <button id="clicker" >🐾</button></label>
             <p id="suggestion" style="font-size: 1em;"></p>
             <p id="sug2" style="font-size: 1em;"></p>
            </div>

        </div>
    </div>

    <footer>
        <a href="https://www.facebook.com/" target="_blank"><img src="../images/facebook.png" alt="Facebook"
                id="facebook-pic"></a>
        <a href="https://github.com/nelanz/Web-Dev-19" target="_blank"><img src="../images/github.svg" alt="Github"
                id="github-pic"></a>
        <a href="mailto:n.tomaszewicz@gmail.com"><img src="../images/mail.png" alt="Mail" id="mail-pic"></a>

    </footer>

    
      
</body>

</html>