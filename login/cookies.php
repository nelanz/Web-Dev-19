<?php

define( "FIVE_DAYS", 60 * 60 * 24 * 5 ); 

setcookie( "size", $_POST["size"], time() + FIVE_DAYS, '/');
setcookie( "color", $_POST["color"], time() + FIVE_DAYS, '/');
setcookie( "colorcloud", $_POST["colorcloud"], time() + FIVE_DAYS, '/' );
?>

<!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
    <meta name="application-name" content="EcoConscious">
    <meta name="description" content="Edukacyjna strona internetowa informująca o zmianach klimatu, ich przyczynach i skutkach">
    <meta name="keywords" content="ekologia, zmiana klimatu">
    <meta name="author" content="Nela Tomaszewicz & Agata Rudzka">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./login.css">
<title>Read Cookies</title>
</head>

<body>
    <div class="box" style="overflow:auto">
<h1>Dane zapisane na ciasteczku</h1>
<div>
<p>Kolor czcionki:
<span style = "color: <?php print isset($_COOKIE["color"]) ? $_COOKIE["color"]:"black" ?> ">
Taki został ustawiony kolor czcionki
</span></p>
<p>Kolor chmury:
<span style = "background-color: <?php print isset($_COOKIE["colorcloud"]) ? $_COOKIE["colorcloud"]:"white" ?> ">
Taki został ustawiony kolor chmury w tle
</span></p>
<p>Rozmiar czcionki:
<span style = "font-size: <?php print isset($_COOKIE["size"]) ? $_COOKIE["size"]:"1" ?>em ">
Taki został ustawiony romiar czcionki
</span></p>
<br/><br/>
<button onclick="history.back()" style="background-color:#4CAF50; color:white; border: 1px solid green; border-radius:12px">Powrót</button>
 </div></div> 
</body>
</html>

