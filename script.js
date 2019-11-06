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

function actionList() {
    document.writeln("Pomożemy Ci wyznaczyć cel - spróbuj w tym roku przeznaczyć taką kwotę na rekompensatę Twojego śladu węglowego:");
    document.getElementById("clicker").addEventListener(click, listen, false);
}


function listen() {
    document.getElementById("suggestion").innerHTML = "Pomożemy Ci wyznaczyć cel - spróbuj w tym roku przeznaczyć taką kwotę na" +
        " rekompensatę Twojego śladu węglowego: " + (Math.random() * (100 - 40)) + 40 + "!";
    return document.writeln((Math.random() * (100 - 40)) + 40).innerHTML;;
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

