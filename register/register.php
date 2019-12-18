<?php
require_once "./config.php";

if (!isset($_GET['act'])) {
    // definiujemy zmienne i przypisujemy im puste wartosci
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    // wykonuje sie w momencie nacisniecia submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Walidacja podanej nazwy uzytkownika
        // sprawdzenie czy nie podano pustej nazwy
        if (empty(trim($_POST["username"]))) {
            $username_err = "Podaj nazwe uzytkownika.";
        } else {
            // wyrazenie select wyciagajace id z bazy danych. Znak zapytania oznacza podstawienie.
            $sql = "SELECT id FROM users WHERE username = ?";

            // mysqli_prepare - przygotowuje zapytanie do wykonania
            if ($stmt = mysqli_prepare($link, $sql)) {

                // podstawia parametr za znak zapytania. s - typ parametru to string
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // trim usuwa whitespace z poczatku i konca
                $param_username = trim($_POST["username"]);

                // wykonanie przygotowanego zapytania
                if (mysqli_stmt_execute($stmt)) {
                    // zapisujemy wynik
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // walidacja czy taka nazwa uzytkownika istnieje juz w bazie
                        $username_err = "Ta nazwa uzytkownika juz istnieje.";
                    } else {
                        $username = trim($_POST["username"]);
                    }
                } else {
                    echo "Wystapil blad! Sprobuj ponownie pozniej";
                }
            }
            // zamykamy wykonywanie zapytania
            mysqli_stmt_close($stmt);
        }

        // Walidacja hasla
        if (empty(trim($_POST["password"]))) {
            $password_err = "Podaj haslo.";
        } elseif (strlen(trim($_POST["password"])) < 5) {
            $password_err = "Haslo musi miec przynajmniej 5 znakow!";
        } else {
            $password = trim($_POST["password"]);
        }

        // Walidacja powtorzonego hasla
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Powtorz haslo!";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            // sprawdzenie czy haslo i powtorzone haslo sa takie same
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Hasla nie sa takie same.";
            }
        }

        // Sprawdzenie czy wystapily przed wlozeniem do bazy danych
        if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
            $sql = "INSERT INTO users(username, password) VALUES (?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // podlaczamy wartosci do znakow zapytania

                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                // ustwiamy parametry
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // hashowanie hasla defaultowym algorytmem

                if (mysqli_stmt_execute($stmt)) {
                    header("location: ../login/login.php");
                } else {
                    echo "Rejestracja nie powiodla się. Spróbuj ponownie później.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        // zamykamy polaczenie z baza
        mysqli_close($link);
    }
} else {

    session_start(); // inicjalizujemy sesje kiedy uzytkownik klika edytuj dane

    $id = $_SESSION["id"];
    $query = mysqli_query($link, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($link));

    // wyswietlanie danych
    if (mysqli_num_rows($query) >= 1) {
        while ($row = mysqli_fetch_array(($query))) {
            $new_username = $row["username"];
            $password = ""; // przypisanie pustych pol bo nie da sie odhaszowac
            $confirm_password = "";
        }
    }
    $new_password_err = $confirm_password_err = $username_err = $password_err = "";
    $new_password = "";

    require_once("./config.php");

    if($_SERVER["REQUEST_METHOD" == "POST"]) {

        if(empty(trim($_POST["username"]))) {
            $username_err = "Wprowadz nazwe uzytkownika";
        } else {
            $username = trim($_POST[$username]);
        }

        if(empty(trim($_POST["password"]))){
            $password_err = "Wprowadz nowe hasło.";     
        } elseif(strlen(trim($_POST["password"])) < 5){
            $password_err = "Haslo musi miec przynajmniej 5 znakow.";
        } else{
            $password = trim($_POST["password"]);
        }

        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Powtorz haslo";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Hasla nie byly takie same.";
            }
        }

        if (empty($password_err) && empty($confirm_password_err)){
            $sql = "UPDATE users SET username = ?, password = ? WHERE id = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "ssi", $param_username, $param_password, $param_id);

                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                $param_id = $_SESSION["id"];
                
                if(mysqli_stmt_execute($stmt)){
                    session_destroy();
                    header("location: ../login/login.php");
                    exit();
                } else{
                    echo "Zmiany nie powiodly sie.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="./register.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }
    </style>
</head>

<body>
    <div class="content-wrap">
        <a class="home-link" href="../home.php">
            <h1 class="title">🌎EcoConscious</h1>
        </a>
        <nav id="menu">
            <input type="checkbox" id="tm">
            <ul>
                <li><a href="../login/login.php" style="color: yellow">Logowanie</a></li>
                <li><a href="../about_us/about_us.php">O nas</a></li>
                <li><a href="../solutions/solutions.php">Wypełnij ankietę</a></li>
                <li><a href="#">Nasze produkty</a></li>
            </ul>
        </nav>
        <div class="box">
            <?php echo (!isset($_GET['act'])) ? "<h2>Rejestracja</h2>" : "<h2>Zmień dane</h2>" ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group
                 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <?php echo (!isset($_GET['act'])) ? "<label>Login</label>" : "<label>Nowy login</label>" ?>
                    <input type="text" name="username" class="form-control" value="<?php echo (!isset($_GET['act'])) ? $username : $new_username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <?php echo (!isset($_GET['act'])) ? "<label>Hasło</label>" : "<label>Nowe hasło</label>" ?>
                    <input type="password" name="password" class="form-control" value="<?php echo (!isset($_GET['act'])) ? $password : $new_password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Powtórz hasło</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Zatwierdź">
                    <input type="reset" class="btn btn-default" value="Wyczyść">
                </div>
                <?php
                if (!isset($_GET['act'])) {
                    echo "<p style='text-align:center'." . ">" . "</p>Masz już konto? " . "<a href=" . "../login/login.php" . ">" . "Zaloguj się</a>.</p>";
                } else {
                    echo "";
                }
                ?>

            </form>
        </div>

    </div>
</body>

</html>