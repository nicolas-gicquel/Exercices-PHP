<?php

//Exercice 1
function increment($nb){
        for ($i=0; $i <= 100; $i+=$nb) { 
            if ($i+$nb >=100) {
                echo $i;
            }else{
                echo $i.',';
            }
        }
    }

//Exercice 2
function multiple($nb){
    if ($nb%2 == 0) {
        echo "$nb est pair<br>";
    }else {
        echo "$nb est impair<br>";
    };

    if ($nb%3 == 0) {
        echo "$nb est multiple de 3<br>";
    }else {
        echo "$nb n'est pas multiple de 3<br>";
    };

    if ($nb%4 == 0){
        echo "$nb est multiple de 4<br>";
    }else{
        echo "$nb n'est pas multiple de 4<br>";
    };
}

//Exercice 3
function aireRectangle($hauteur,$largeur){
    $aire = $hauteur*$largeur;
    echo "L'aire d'un rectangle ayant une hauteur de ".$hauteur."cm et une largeur de ".$largeur."cm est de ".$aire."cm²";
}

//Exercice 5

function racine(){
    for ($i=1; $i < 100 ; $i++) { 
        $nb = $i*$i;
        if ($nb <= 100) {
            if ($nb == 100) {
                echo $nb;
            }else{
                echo $nb.",";
            }
        }
    }
}

//Exercice 6

function fibonacci(){
    $nb1 = 0; 
    $nb2 = 1; 
      
    $count = 0;
    echo "<table><tr>"; 
    while ($count < 20){ 
        echo "<td>$nb1</td>";
        $nb3 = $nb2 + $nb1; 
        $nb1 = $nb2; 
        $nb2 = $nb3; 
        $count = $count+1; 
        }
        echo "</tr></table>";  
}

//Exercice 7

function whatstime() {
    date_default_timezone_set('Europe/Paris');
    setlocale(LC_TIME, 'fr_Fr');
    // $date = date("d/m/Y");
    $date = strftime('%A %d %B %Y');
    $heure = date("H:i");
    echo "Nous sommes le $date et il est $heure";
}

//Exercice 8

function atomes() {
$elements = array(  "H"=>"Hydrogène", 
                    "He"=>"Helium", "Li"=>"Lythium", 
                    "Be"=>"Beryllium", 
                    "B"=>"Bore", 
                    "C"=>"Carbonne", 
                    "N"=>"Azote", 
                    "O"=>"Oxygène", 
                    "F"=>"Fluor", 
                    "Ne"=>"Néon");

echo "<table border=1>";
foreach ($elements as $key => $atomes) {
    echo "<tr><td>$key</td><td>$atomes</td></tr>";
}
echo "</table>";
}

//Exercice 9

function identite(){
    $tab=array(
        "Dupont"=>array("prenom"=>"Paul","ville"=>"Paris","age"=>27),
        "Schmoll"=>array("prenom"=>"Kirk","ville"=>"Berlin","age"=>35),
        "Smith"=>array("prenom"=>"Stan","ville"=>"Londres","age"=>45));

        
    foreach ($tab as $nom => $value) {
        echo "Bonjour, je m'appelle ".$value['prenom']." ".$nom.", j'ai ".$value['age']." ans et j'habite à ".$value['ville'].".<br>";
    }


}