function alertFunction() {
    alert('Uwaga formularz zostanie wyczyszczony!')
}

function promptFunction() {
    var person = prompt("Podaj swoje imie", "anonimowy ekologu");
    if(person != null) {
        document.getElementById("name").innerHTML = "Witaj na drodze do ekologii, " + person + "!";
    }
}

// function getRandomNumberOfPeople(min, max) {
//     return Math.floor(Math.random * (max - min)) + min
// }