<?php
session_start();

// sprawdzenie czy uzytkownik jest juz zalogowany
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ./home_login.php");
    exit;
}

require_once("../register/config.php");

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // sprawdzenie czy login jest pusty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Sprawdzenie czy haslo jest puste
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Sprawdzenie calosci- czy bezbledna
    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                // przechowanie wynikow zapytania
                mysqli_stmt_store_result($stmt);

                // Sprawdzenie czy uzytkownik istnieje w bazie, jesli tak - sprawdzenie hasla
                if (mysqli_stmt_num_rows($stmt) == 1) {

                    // podlaczenie zmiennych
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                    //
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // haslo jest poprawne, wiec zaczynamy nowa sesje
                            session_start();

                            // zapisujemy dane w sesji
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Przekierowujemy uzytkownika na strone powitalna
                            header("location: ./home_login.php");
                        } else {
                            // pokaz blad jesli haslo niepoprawne
                            $password_err = "Haslo niepoprawne.";
                        }
                    }
                } else {
                    // pokaz blad jesli uzytkownik nie istnieje
                    $username_err = "Konto nie istnieje";
                }
            } else {
                echo "Wystapil blad!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="./login.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }
    </style>
</head>

<body>
    <a class="home-link" href="../home.php">
        <h1 class="title">🌎EcoConscious</h1>
    </a>
    <nav id="menu">
        <input type="checkbox" id="tm">
        <ul>
            <li><a href="./login.php" style="color: yellow">Logowanie</a></li>
            <li><a href="./about_us/about_us.php">O nas</a></li>
            <li><a href="../solutions/solutions.php">Wypełnij ankietę</a></li>
            <li><a href="#">Nasze produkty</a></li>
        </ul>
    </nav>
    <div class="box">
        <div class="content-wrap">

            <h2>Logowanie</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Login</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Hasło</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Zaloguj">
                </div>
                <?php
                echo "<p style='text-align:center'." . ">" . "</p>Nie masz konta?" . "<a href=" . "../register/register.php" . ">" . "Zarejestruj się</a>.</p>";
                ?>
            </form>
        </div>

    </div>
</body>

</html>