function alertFunction() {
    alert('Uwaga formularz zostanie wyczyszczony!')
}

function promptFunction() {
    var person = prompt("Podaj swoje imie", "anonimowy ekologu");
    if(person != null) {
        document.getElementById("name").innerHTML = "Witaj na drodze do ekologii, " + person + "!";
    }
}
/*
function actionList(){
//document.writeln("Pomożemy Ci wyznaczyć cel - spróbuj w tym roku przeznaczyć taką kwotę na rekompensatę Twojego śladu węglowego:");
document.getElementById("clicker").addEventListener(click,listen,false);
}

function listen(){
    document.getElementById("suggestion").innerHTML = "Pomożemy Ci wyznaczyć cel - spróbuj w tym roku przeznaczyć taką kwotę na"+
    " rekompensatę Twojego śladu węglowego: " + (Math.random()* (100 - 40)) + 40 + "!"; 
//return document.writeln((Math.random()* (100 - 40)) + 40).innerHTML;;
}
*/
// function getRandomNumberOfPeople(min, max) {
//     return Math.floor(Math.random * (max - min)) + min
// }