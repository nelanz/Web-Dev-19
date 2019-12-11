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
                <li><a href="./login.php" style="color: yellow">Logowanie</a></li>
                <li><a href="./about_us/about_us.php">O nas</a></li>
                <li><a href="../solutions/solutions.php">Wypełnij ankietę</a></li>
                <li><a href="#">Nasze produkty</a></li>
            </ul>
        </nav>
        <div class="box">
                <h1 class="log-title">Logowanie</h1>
                <form action="./process.php" method="post" class="form-style">
                    <input type="text" name="username" class="field"><br><br>
                    <input type="password" name="password" class="field"> <br><br>
                    <input type="submit" value="Zaloguj się">
                </form>
        </div>
    </div>

</body>

</html>