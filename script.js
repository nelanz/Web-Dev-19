var donationList = [5, 10, 25, 16, 40];

function alertFunction() {
    alert('Uwaga formularz zostanie wyczyszczony!')
}

function promptFunction() {
    var person = prompt("Podaj swoje imie", "anonimowy ekologu");
    if (person != null) {
        document.getElementById("name").innerHTML = "Witaj na drodze do ekologii, " + person + "!";
    }
}

window.addEventListener( "load", start, false );


var rand=((Math.random()* (100 - 40)) + 40);
        
function start(){
    var event=document.getElementById("clicker").addEventListener("mousedown",listen,false);
}


function listen(){
    document.getElementById("suggestion").innerHTML = "Pomożemy Ci wyznaczyć cel - spróbuj w tym roku przeznaczyć "
    +parseInt(rand)+ "zł na rekompensatę Twojego śladu węglowego."; 

    var newDiv=document.createElement("P");
    var textnode = document.createTextNode("✨ Cieszymy się, że są tacy ludzie jak ty ✨ ");  
    newDiv.appendChild(textnode); // musi być żeby pojawiał się w nowej linijce(text jest bez przeniesienia do nowej linii)

    var point = document.getElementById("first_step");    //znajdujemy element którego dziecko ma być dodane
    point.insertBefore(newDiv, point.childNodes[0]);    //tamGdzieWstawiamy.insertBefore(coWstawiamy,przedCoWstawiamy)

    var newDiv2=document.createElement("P");
    newDiv2.innerHTML="Aktywni mogą więcej <button id=\"optional\">🎁</button>";
    point.appendChild(newDiv2);
    var event2=document.getElementById("optional").addEventListener("mouseover",changeColor,false);
}

function changeColor(){
    var inputColor=prompt("Wprowadź nowy kolor tła","nazwa koloru w języku angielskim");
    document.body.style.background = "none";
    document.body.style.backgroundColor = inputColor;

    var inputColor1=prompt("Wprowadź nowy kolor textu","nazwa koloru w języku angielskim");
    var lista=document.links;
    for(var i=0;i<lista.length;i++){
    (lista.item(i)).style.color = inputColor1;
    }
}

function question() {
    var checkBoxy = document.getElementById("knowY");
    var checkBoxn = document.getElementById("knowN");
    var texty = document.getElementById("texty");
    var textn = document.getElementById("textn");
    if (checkBoxy.checked == true) {
        texty.style.display = "block";
        textn.style.display = "none";
    } else if (checkBoxn.checked == true) {
        textn.style.display = "block";
        texty.style.display = "none";
    } else {
        textn.style.display = "none";
        texty.style.display = "none";
    }
}

function printDonation() {
    document.getElementById('donation').innerHTML = donation;
}

function isEmpty() {
    if(document.forms["form"].donation.value === "") {
        return false;
    }
    return true;
}

function addDonation() {
    var donationVal = parseInt(document.getElementById("donation").value);
    if (isEmpty() == false) {
        alert("Niedźwiedzie polarne nie przezyją za 0 zł 😞")
    } else {
        donationList.push(donationVal);
        document.getElementById("display-donation").innerHTML = "Dziękujemy za donację " + donationVal + " zł!";
    }
}

function getDonators() {
    var text = "";
    var i;
    for (i = 0; i < donationList.length; i++) {
        text += "💚" + donationList[i];
    }
    document.getElementById("donations-list").innerHTML = text;
}

// function beAnonymous() {
//     var checkAnonymous = document.getElementById("anonymous")
//     if (checkAnonymous.checked == true) {
//         document.getElementById("name").disabled = true;
//     } else {
//         document.getElementById("name").disabled = false;
//     }
// }

