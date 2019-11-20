
document.addEventListener('DOMContentLoaded', domloaded, false);

function domloaded() {
    // uzywamy tutaj canvas API
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d') // context to wrtość this odnoszacego sie do konkretnego obiektu. Tutaj do obiektu canvas bedacego tablica 2d 

    var score = 0;

    var x = 50; // pozycja na OX
    var y = 100 // pozycja na OY
    var speed = 6 // ile sie poruszyc w kazdej chwili
    var sideLength = 50; // szerokosc kazdego boku kwadratu

    var down = false;
    var up = false;
    var left = false;
    var right = false;

    // target kwadrat
    var targetX = 0;
    var targetY = 0;
    var targetLength = 25;

    function isWithin(a, b, c) {
        return (a > b && a < c);
    }

    var countdown = 15;
    var id = null;

    // poruszanie sie w momencie nacisniecia strzalki
    canvas.addEventListener('keydown', function (event) {
        event.preventDefault();
        console.log(event.key, event.keyCode);
        if (event.keyCode === 40) { // DOWN
            down = true;
        }
        if (event.keyCode === 38) { // UP
            up = true;
        }
        if (event.keyCode === 37) { // LEFT
            left = true;
        }
        if (event.keyCode === 39) { // RIGHT
            right = true;
        }
        if(event.shiftKey) {
            shift = true;
        }
    });

    // zatrzymywanie się w momencie puszczenia strzałki
    canvas.addEventListener('keyup', function (event) {
        event.preventDefault();
        // console.log(event.key, event.keyCode);
        if (event.keyCode === 40) { // DOWN
            down = false;
        }
        if (event.keyCode === 38) { // UP
            up = false;
        }
        if (event.keyCode === 37) { // LEFT
            left = false;
        }
        if (event.keyCode === 39) { // RIGHT
            right = false;
        }
        
    });

    // menu startowe
    function menu() {
        erase();
        context.fillStyle = '#000000';
        context.font = '36px Arial';
        context.textAlign = 'center';
        context.fillText('Zbierz kwadraty i ocal planetę!', canvas.width / 2, canvas.height / 4);
        context.font = '24px Arial';
        context.fillText('1 zielony kwadrat = 1 drzewo 🌳', canvas.width / 2, canvas.height / 3);
        context.fillStyle = '#00FF00'
        context.font = '30px Arial';
        context.fillText('START', canvas.width / 2, canvas.height / 2);
        context.font = '18px Arial'
        context.fillStyle = '#000000';
        context.fillText('Używaj strzałek aby się poruszać', canvas.width / 2, (canvas.height / 4) * 3);
        // Zaczynamy gre klikajac w canvas
        canvas.addEventListener('click', startGame);
    }

    function startGame() {
        id = setInterval(function () {
            countdown--;
        }, 1000)

        canvas.removeEventListener('click', startGame);
        moveTarget();
        draw();
    }

    function endGame() {
        clearInterval(id);
        erase();
        context.fillStyle = '#000000';
        context.font = '24px Arial';
        context.textAlign = 'center';
        context.fillStyle = '#00FF00';
        context.fillText('Zasadziłeś/aś: ' + score + ' 🌳!', canvas.width / 2, canvas.height / 4);
        context.fillStyle = '#000000';
        context.fillText('Aby zagrać jeszcze raz naciśnij klawisz SHIFT!', canvas.width / 2, (canvas.height / 4) * 2)
        canvas.addEventListener('keydown', onShiftKeyPressed);
        context.fillText('Aby wrócić do strony głównej naciśnij CTRL!', canvas.width / 2, (canvas.height / 4) * 3)
        canvas.addEventListener('keydown', onCtrlKeyPressed);
    }

    // poruszanie kwadratem do zebrania w randomowe miejsce
    function moveTarget() {
        targetX = Math.round(Math.random() * canvas.width - targetLength);
        targetY = Math.round(Math.random() * canvas.height - targetLength)
    }

    // wyczyszczenie canvas
    function erase() {
        context.fillStyle = '#FFFFFF';
        context.fillRect(0, 0, 600, 400);
    }

    // glowna funkcja do poruszania sie
    function draw() {
        erase();

        if (down) {
            y += speed;
        }
        if (up) {
            y -= speed;
        }
        if (right) {
            x += speed;
        }
        if (left) {
            x -= speed;
        }
        if (y + sideLength > canvas.height) {
            y = canvas.height - sideLength;
        }
        if (y < 0) {
            y = 0;
        }
        if (x < 0) {
            x = 0;
        }
        if (x + sideLength > canvas.width) {
            x = canvas.width - sideLength;
        }
        // kolizja z celem
        if (isWithin(targetX, x, x + sideLength) || isWithin(targetX + targetLength, x, x + sideLength)) { // X
            if (isWithin(targetY, y, y + sideLength) || isWithin(targetY + targetLength, y, y + sideLength)) { // Y
                // przenoszenie targetu
                moveTarget();
                score++;
            }
        }

        // czerwony kwadrat
        context.fillStyle = '#FF0000';
        context.fillRect(x, y, sideLength, sideLength);
        // Target - zielone kwadraty 
        context.fillStyle = '#00FF00';
        context.fillRect(targetX, targetY, targetLength, targetLength);
        // Wyswietlanie wyniku podczas gry
        context.fillStyle = '#000000';
        context.font = '24px Arial';
        context.textAlign = 'left';
        context.fillText('Wynik: ' + score, 10, 24);
        context.fillText('Pozostały czas: ' + countdown, 10, 50);

        if (countdown <= 0) {
            endGame();
        } else {
            window.requestAnimationFrame(draw); // funkcja, ktora mowi przegladarce, ze chce wykonac animacje i wywolac do tego okreslona funkcje. Sprawia, ze robi sie update animacji na ekranie.
        }
    }

    function onShiftKeyPressed(event) {
        if(event.shiftKey) {
            location.reload(); // odswiezenie strony
        }
    }

    function onCtrlKeyPressed(event) {
        if(event.ctrlKey) {
            window.location.href = "home.html" // powrot do głownej
        }
    }

    menu();
    canvas.focus();
}