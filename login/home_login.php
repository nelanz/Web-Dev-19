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
                <li><a href="#">Koszyk</a></li>
                <li><a href="../about_us.html">O nas</a></li>
                <li><a href="../solutions/solutions.php">Wypełnij ankietę</a></li>
                <li><a href="#">Nasze produkty</a></li>      
            </ul>
        </nav>
        <div class="box">
            <div style="margin-top:10%">
                <h1 class="welcome-text">Witaj <?php echo $user['username']; ?>!</h1>
                <p style="text-align:center">Zrób zakupy w naszym sklepie i pokaż światu jak o dbasz o środowisko 💚</p>
            </div>
        </div>
    </div>

</body>

</html>