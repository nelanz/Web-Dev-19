<?php
// plik konfigurujacy baze danych 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'accounts');
 
// polaczenie z baza danych 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// sprawdzenie czy polaczenie bledne
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>