window.addEventListener( "load", start, false );

// to sypie błędem - patrz konsole na stronie
function start() {
    var event = document.getElementById("clicker").addEventListener("mousedown", listen, false);
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