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

  <title>Rozwiązanie problemu- Ankieta</title>
</head>

<body>
<div class="solutions-box">
<h1>Wyniki twojej ankiety:<br/><br/></h1>

<?php
//class Solution_Result_Model extends CI_Model{

if(isset($sex))$sex = $_POST['sex'];
if(isset($belief))$belief = $_POST['belief'];
if(isset($guilt)) $guilt = $_POST['guilt'];
if(isset($territories))$territories = $_POST['territories'];
//$solution = $_POST['solution'];
if(isset($country)) $country = $_POST['country'];
if(isset($thoughts)) $thoughts = $_POST['thoughts'];
if(isset($year)) $year = $_POST['year'];

function displayData(){
foreach ($_POST as $key => $value) {
  if($key=="solution"){
    echo "Jakie są według ciebie najlepsze sposoby na walkę z zanieczyszczeniem powietrza? Które osobiście
    popierasz?"."(".(count($_POST['solution'])-1)."): <br/>";
    foreach($_POST['solution'] as $key => $value)
    {
      if($value!=null ){ 
        echo  $value; 
        if(next($_POST['solution'])!=null) echo", ";
        else ;
      }
      echo "<br/>";
    }
  }

  else if($key=="belief"){
    echo "Czy wierzysz w globalne ocieplenie?<br/>".$value."<br/><br/>";
  }

  else if($key=="guilt"){
    echo "Jak uważasz - kto jest najbardziej odpowiedzialny za zmiany klimatu?<br/>".$value."<br/><br/>";
  }

  else if($key=="territories"){
    echo "Który kontynent emituje twoim zdaniem najwięcej CO<sub>2</sub>?<br/>".$value."<br/><br/>";
  }

  else if($key=="country"){
    echo "Nazwa kraju, który według Ciebie najlepiej walczy z zanieczyszczeniem
    powietrza:<br/>".$value."<br/><br/>";
  }  

  else if($key=="year"){ //niezbyt dziala
    if(strlen($value)==4) {
      $error=false;
    }
    else $error=true; 
  } 

  //else  echo( $key.": ".$value."<br/>");
}
}

function FunFact(){
  $wiara="";
  $kontynent="";
  $lack_of_knowledge="";
  $knowledge="";
foreach ($_POST as $key => $value) {
if($key=="sex"){
  if($value=="K") {
    $plec="Panią"; 
    $plec2="a Pani";
    $plec3="Pani";}
  else {
    $plec="Pana";
    $plec2="Pan";
    $plec3="Pan";
  }}
else if($key=="belief" ) {
  if($value=="Nie wiem"){
  $lack_of_knowledge="Ponieważ w niektórych pytaniach zaznaczył".$plec2." \"Nie wiem\" postanowiłyśmy poszerzyć posiadaną przez $plec wiedzę😊<br/>";
  $wiara="-Temperatura w 2016 r. pobiła dziejowy rekord ustalony w 2015 r. po pobiciu rekordu z roku 2014. 
  Ubiegłoroczna średnia temperatura powierzchni Ziemi, wyliczona na podstawie pomiarów z tysięcy stacji meteorologicznych i pław, 
  była wyższa o 0,94°C od średniej temperatury rocznej w XX w.<br/>";}}
else if($key=="territories" && $value=="Nie wiem"){
  $lack_of_knowledge="Ponieważ w niektórych pytaniach zaznaczył".$plec2." \"Nie wiem\" postanowiłyśmy poszerzyć $plec wiedzę😊<br/><br/>";
  $kontynent="-Od ponad dziesięciu lat niechlubnym numerem 1 w kategorii emisji dwutlenku węgla do atmosfery są Chiny, zaraz za nimi 
  są Indie, Rosja oraz Japonia.<br/>";}
else if($lack_of_knowledge=="") $knowledge="Gratulujemy - wygląda na to, że znałeś odpowiedź na każde pytanie. Nie należy jednak zapominać,
 że zmiana klimatu postępuje więc musimy rozwijać swoją wiedzę na ten temat.<br/>";
}
echo "</br><br/>Dziękujemy $plec3 za wypełnienie naszej ankiety,<br/>";
echo $knowledge.$lack_of_knowledge;
echo $wiara."</br>";
echo $kontynent;
}

displayData();
FunFact();

?>

</div>
</body>
</html>
