 function SubmitButton(){
    var email=document.getElementById("email").value;
    var surname=document.getElementById("surname").value;

    if(email=="" || surname=="") alert("Nie wypełniłeś pól wyaganych");
    else  document.getElementById("Forma").submit();
}

function ResetButton(){
    document.getElementById("Forma").reset();
}