<?php
session_start();

// odinstaluj zmienne w sesji
$_SESSION = array();
session_destroy();

header('Location: '.'../home.php');
exit;