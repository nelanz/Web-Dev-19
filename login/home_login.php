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
        <div class="box" style="background-color: <?php print isset($_COOKIE["colorcloud"]) ? $_COOKIE["colorcloud"]:"white"?>; color: <?php print isset($_COOKIE["color"]) ? $_COOKIE["color"]:"black"?>; overflow:auto">
            <div style="margin-top:10%">
                <h1 class="welcome-text">Witaj <?php echo $user['username']; ?>!</h1>
                <p style="font-size: <?php print isset($_COOKIE["size"]) ? $_COOKIE["size"]:"1" ?>em; text-align:center">Zrób zakupy w naszym sklepie i pokaż światu jak o dbasz o środowisko 💚</p>
            </div>


        </div>
    </div>

</body>

<footer >
<form method = "post" action = "./cookies.php">
<div style="font-size:1em; line-height:30px;">Ustaw swoje ciasteczka🍪:</div>

<div>Rozmiar czcionki: <input type="range" name="size" min="0.1" max="5" step="0.1" value="1" class="slider" id="myRange"> 
<span id="demo"></span>em

<label >&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Kolor tekstu(eng.):
<input type = "text" name = "color"></label>

<label>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Kolor tła chmury(eng.):
<input type = "text" name = "colorcloud">&nbsp;&nbsp;&nbsp;&nbsp;</label>

<input style="background-color:#4CAF50; border: 1px solid; border-radius:12px; line-color: green; color:white" type="submit" value="Zapisz ciasteczko"></div>

</form>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

</footer>

</html>