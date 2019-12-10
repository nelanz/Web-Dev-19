<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="ankieta, problem, zmiany klimatu, ekologia, globalne ocieplenie">
  <meta name="author" content="Nela Tomaszewicz & Agata Rudzka">
  <meta name="description" content="Wypelnij ankietę aby mieć aktywny wpływ na walkę o ziemię.">

  <link rel="stylesheet" href="default.css">
  <link rel="stylesheet" href="solutions.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

  <script src="/script.js"></script>

  <title>Wyniki ankiety</title>
</head>

<body>
  <a class="home-link" href="/home.html">
    <h1 class="title">🌎EcoConscious</h1>
  </a>
  <nav id="menu">
    <input type="checkbox" id="tm">
    <ul class="main-menu clearfix">
      <li><a href="/about_us.html">O nas</a></li>
      <li><a href="/extra-info.html">Poznajmy się</a></li>
      <li><a href="/solutions.html">Wypełnij ankietę</a></li>
      <li><a href="/send_letter.html">Wesprzyj nas</a></li>
      <li><a href="/effects.html">Skutki</a></li>
      <li><a href="#">Nasze produkty
          <span class="drop-icon">▾</span>
          <label title="Toggle Drop-down" class="drop-icon" for="sm1">▾</label>
        </a>
        <input type="checkbox" id="sm1">
        <ul class="sub-menu">
          <li><a href="#">Worki wielorazowe
              <span class="drop-icon">▾</span>
              <label title="Toggle Drop-down" class="drop-icon" for="sm2">▾</label>
            </a>
            <input type="checkbox" id="sm2">
            <ul class="sub-menu">
              <li><a href="#">Duże</a></li>
              <li><a href="#">Małe</a></li>
            </ul>
          </li>
          <li><a href="#">Kosmetyki naturalne
              <span class="drop-icon">▾</span>
              <label title="Toggle Drop-down" class="drop-icon" for="sm3">▾</label>
            </a>
            <input type="checkbox" id="sm3">
            <ul class="sub-menu">
              <li><a href="#">Do ciała
                  <span class="drop-icon">▾</span>
                  <label title="Toggle Drop-down" class="drop-icon" for="sm4">▾</label>
                </a>
                <input type="checkbox" id="sm4">
                <ul class="sub-menu">
                  <li><a href="#">Olejki do ciała</a></li>
                  <li><a href="#">Żele pod prysznic</a></li>
                  <li><a href="#">Sole do kąpieli</a></li>
                </ul>
              </li>
              <li><a href="#">Do włosów
                  <span class="drop-icon">▾</span>
                  <label title="Toggle Drop-down" class="drop-icon" for="sm5">▾</label>
                </a>
                <input type="checkbox" id="sm5">
                <ul class="sub-menu">
                  <li><a href="#">Szampony</a></li>
                  <li><a href="#">Odżywki</a></li>
                </ul>
              </li>
              <li><a href="#">Do twarzy
                  <span class="drop-icon">▾</span>
                  <label title="Toggle Drop-down" class="drop-icon" for="sm6">▾</label>
                </a>
                <input type="checkbox" id="sm6">
                <ul class="sub-menu">
                  <li><a href="#">Maseczki</a></li>
                  <li><a href="#">Peelingi</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#">Eko zabawki
              <span class="drop-icon">▾</span>
              <label title="Toggle Drop-down" class="drop-icon" for="sm7">▾</label>
            </a>
            <input type="checkbox" id="sm7">
            <ul class="sub-menu">
              <li><a href="#">Klocki z plastiku z recyklingu</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <div class="solutions-box">

    <p><?= $tresc ?></p>

  </div>
  </body>

</html>

