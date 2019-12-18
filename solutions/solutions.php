<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="ankieta, problem, zmiany klimatu, ekologia, globalne ocieplenie">
  <meta name="author" content="Nela Tomaszewicz & Agata Rudzka">
  <meta name="description" content="Wypelnij ankietę aby mieć aktywny wpływ na walkę o ziemię.">

  <link rel="stylesheet" href="../default.css">
  <link rel="stylesheet" href="solutions_results.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

  <script src="../script.js"></script>

  <title>Rozwiązanie problemu- Ankieta</title>
</head>

<body>
  <?php
  $yearErr = "";

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>
  <a class="home-link" href="../home.php">
    <h1 class="title">🌎EcoConscious</h1>
  </a>
  <nav id="menu">
    <input type="checkbox" id="tm">
    <ul class="main-menu clearfix">
      <?php
      if (isset($_SESSION['loggedin']) || $_SESSION["loggedin"] == true) {
        echo '<li><a href="../login/logout.php" style="color: yellow">Wyloguj</a></li>';
        echo '<li><a href="../login/my_account.php">Moje konto</a></li>';
        echo '<li><a href="#">Koszyk</a></li>';
      } else {
        echo '<li><a href="../login/login.php" style="color: yellow">Logowanie</a></li>';
      }
      ?>
      <li><a href="../about_us/about_us.php">O nas</a></li>
      <li><a href="solutions.php">Wypełnij ankietę</a></li>
      <li><a href="#">Nasze produkty</a></li>
    </ul>
  </nav>
  <div class="solutions-box">
    <?php
    if (!isset($_SESSION['loggedin'])) {
      echo '<h1 class="question">Wypełnij ankietę i miej swój wkład w ratowanie planety!</h1>';
    } else {
      echo '<h1 class="question">' . $_SESSION['username'] . '! Wypełnij ankietę i miej swój wkład w ratowanie planety!' . "</h1>";
    }
    ?>


    <!-- <style>
      td,
      th {
        border: 1px solid whitesmoke;
      }
    </style>-->

    <form method="POST" action="./solutions_data.php">
      <!-- <input type="hidden" name="recipient" value="n.tomaszewicz@gmail.com">
      <input type="hidden" name="subject" value="Questionaire">-->

      <p>
        <strong style="color: darkorange">Płeć &nbsp;&nbsp;</strong><br>
        <label>Kobieta
          <input name="sex" type="radio" value="K">
        </label>
        <label>Mężczyzna
          <input name="sex" type="radio" value="M" checked>
        </label>
      </p>

      <p>
        <strong style="color: darkorange">Czy wierzysz w globalne ocieplenie? &nbsp;&nbsp;</strong><br>
        <label>Tak
          <input name="belief" type="radio" value="tak">
        </label>
        <label>Nie
          <input name="belief" type="radio" value="nie">
        </label>
        <label>Nie wiem
          <input name="belief" type="radio" value="Nie wiem" checked>
        </label>
      </p>

      <p>
        <strong style="color: darkorange">Jak uważasz - kto jest najbardziej odpowiedzialny za zmiany klimatu?</strong><br>
        <label>Rządzący
          <input name="guilt" type="checkbox" value="rzadzacy">
        </label>
        <label>Przedsiębiorstwa
          <input name="guilt" type="checkbox" value="przedsiebiorcy">
        </label>
        <label>Obywatele
          <input name="guilt" type="checkbox" value="obywatele">
        </label>
        <label>Nikt - to zjawisko naturalne
          <input name="guilt" type="checkbox" value="nikt">
        </label>
      </p>

      <p>
        <label><strong style="color: darkorange">Który kontynent emituje twoim zdaniem najwięcej CO<sub>2</sub>?</strong><br>
          <select class="question-continent" name="territories">
            <option value="Nie wiem" selected>Nie wiem</option>
            <option value="Afryka">Afryka</option>
            <option value="Ameryka Południowa">Ameryka Południowa</option>
            <option value="Ameryka Północna">Ameryka Północna</option>
            <option value="Australia">Australia</option>
            <option value="Azja">Azja</option>
            <option value="Europa">Europa</option>
            <option value="Wszyscy tyle samo">Wszyscy tyle samo</option>
          </select>
        </label>
      </p>

      <p>
        <strong style="color: darkorange">Jakie są według ciebie najlepsze sposoby na walkę z zanieczyszczeniem powietrza? Które osobiście
          popierasz?</strong><br>
        <label>Całkowity zakaz używania silników spalinowych
          <input name="solution[]" type="checkbox" value="Całkowity zakaz używania silników spalinowych">
        </label>
        <label>Przejście na ogrzewanie gazowe/elektryczne
          <input name="solution[]" type="checkbox" value="Przejście na ogrzewanie gazowe/elektryczne">
        </label><br>
        <label>Ograniczenie lotów
          <input name="solution[]" type="checkbox" value="Ograniczenie lotów">
        </label>
        <label>Powrót do kupna tylko lokalnych produktów
          <input name="solution[]" type="checkbox" value="Powrót do kupna tylko lokalnych produktów">
        </label><br>
        <label>Bezwzględne przejście na energię ze źródeł odnawialnych
          <input name="solution[]" type="checkbox" value="Bezwzględne przejście na energię ze źródeł odnawialnych">
        </label>
        <label>Pomoc humanitarna w krajach biedniejszych
          <input name="solution[]" type="checkbox" value="Pomoc humanitarna w krajach biedniejszych">
        </label><br>
        <label>Zwiększenie funduszy na pomoc najbiedniejszym
          <input name="solution[]" type="checkbox" value="Zwiększenie funduszy na pomoc najbiedniejszym">
        </label>
        <label>Zwiększenie dofinansowań na inicjatywy ekologiczne
          <input name="solution[]" type="checkbox" value="Zwiększenie dofinansowań na inicjatywy ekologiczne">
        </label><br>
        <label>Inne (max 300 znaków)
          <textarea type="text" name="solution[]" rows="3" cols="100"></textarea>
        </label>
      </p>

      <p>
        <label><strong style="color: darkorange"> Podaj nazwę kraju, który według Ciebie najlepiej walczy z zanieczyszczeniem
            powietrza:&nbsp;&nbsp;</strong>
          <input name="country" type="text" maxlength="50">
        </label>
      </p>

      <p>
        <label><strong style="color: darkorange"> Dodatkowe przemyślenia? Podziel się nimi z nami:)</strong><br>
          <textarea name="thoughts" rows="4" cols="50"></textarea>
        </label>
      </p>

      <p>
        <label style="color: darkorange">Podaj swój rok urodzenia - pomoże nam to przy analizowaniu wyników:&nbsp;&nbsp;
          <input name="year" type="year" maxlength="4">
        </label>
        <?php //echo $year
        ?>
        <?php
        if (isset($_POST['year'])) {
          $year = $_POST['year'];
          if (!preg_match('#[^0-9]#', $year)) {
            echo "Value is numeric";
          } else {
            echo "Value not numeric";
          }
        }
        ?>

      </p>



      <p>
        <label style="color: darkorange">Jeżeli chcesz otrzymywać od nas statystyki ankiety podaj swój adres e-mail:&nbsp;&nbsp;
          <input name="mail" type="text" maxlength="30" disabled>
        </label>
      </p>

      <p>
        <input onclick="alertFunction()" type="reset" value="Wyczyść">
        <input type="submit" value="Prześlij">
      </p>

    </form>

  </div>
</body>

</html>