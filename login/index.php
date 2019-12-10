<?php
require_once('./config.php');
require_once('./functions.php');

session_start();

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user = in_array_r($user_id, $users);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
    <?php
        if(empty($user)) {
            session_destroy();
            include('./login.php');
        } else {
            include('./home_login.php');
        }
    ?>
    </body>
</html>