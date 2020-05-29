<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices PHP niveau 2</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<h1>Exercices PHP niveau 2 </h1>

<h2>Exercice 1</h2>

<h3>Entrez votre prénom:</h3>
<form method='POST'>
 <input type="text" name="name">
 <input type="submit" value="Envoyer">
 </form>
<?php
$name = "";
if (!empty($_POST)) {
    $name = $_POST['name'];
    echo '<h3> Hello'.$name.'</h3>';
}


?>

<h2>Exercice 2</h2>

<?php
echo __FILE__;
?>

<h2>Exercice 3</h2>

<?php
    echo "<table border=1>";
    echo "<tr><td>Salaire de Mr B</td><td>1520€</td></tr>";
    echo "<tr><td>Salaire de Mr T</td><td>1680€</td></tr>";
    echo "<tr><td>Salaire de Mr X</td><td>2150€</td></tr>";
    echo "</table>";
?>

<h2>Exercice 4</h2>

<?php
echo date('d/m/Y').'<br>';
echo date('d-m-Y').'<br>';
echo date('d.m.y').'<br>';

$date = date("Y-m-d");
$birthday = "2021-01-18";
$nbj = (strtotime($birthday)-strtotime($date))/86400;
echo "Mon anniversaire est le 18 janvier il me reste donc ".$nbj." jours avant mon anniversaire";
?>

<h2>Exercice 5</h2>

<?php
$tableau = array(rand(0,1000),rand(0,1000),rand(0,1000),rand(0,1000),rand(0,1000),rand(0,1000),rand(0,1000),rand(0,1000),rand(0,1000),rand(0,1000));
asort($tableau);
foreach ($tableau as $nb) {
    echo $nb.', ';
}
$max = max($tableau);
$min = min($tableau); 
echo '<br>';
echo 'Le chiffre le plus élevé de de cette série de nombres est '.$max.'<br>';
echo 'Le chiffre le moins élevé de de cette série de nombres est '.$min.'<br>';
?>

<h2>Exercice 6</h2>

<?php
$racine = round(sqrt(77),2);
echo "La racine de 77 est ".$racine;

?>

<h2>Exercice 7</h2>

<?php
    $chaine = "le PHP c'est trop cool!";
    echo "Chaine de base: ".$chaine."<br>";
    echo "Chaine qu'avec des majuscules: ".strtoupper($chaine)."<br>";
    echo "Chaine qu'avec des minuscules: ".strtolower($chaine)."<br>";
    echo "Chaine avec le premier caractère en majuscule: ".ucfirst($chaine)."<br>";
    echo "Chaine avec une majuscule à tous les mots: ".ucwords($chaine)."<br>";
?>

<h2>Exercice 8</h2>

<?php
    $nb = [];
    for ($i=0; $i <31 ; $i++) { 
        $nb[] = $i;
    }
    $sum = array_sum($nb);
    echo "La somme des chiffres de 0 à 30 est ".$sum;
?>

<h2>Exercice 9</h2>

<?php
    $nb = [];
    for ($i=0; $i < 100 ; $i++) { 
        $nb[] = $i;
    }

    foreach ($nb as $element) {
        if ($element < 10) {
            echo "0".$element.",";
        }elseif($element == 99){
            echo $element;
        }else{
            echo $element.",";
        }
    }
?>

<h2>Exercice 10</h2>

<?php
$ceu = array( "Italie"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgique"=> "Bruxelles", "Danemark"=>"Copenhague", "Finlande"=>"Helsinki", "France" => "Paris", "Slovaquie"=>"Bratislava", "Slovénie"=>"Ljubljana", "Allemagne" => "Berlin", "Grèce" => "Athène", "Irlande"=>"Dublin", "Pays Bas"=>"Amsterdam", "Portugal"=>"Lisbonne", "Espagne"=>"Madrid", "Suède"=>"Stockholm", "Royaume Unis"=>"Londre", "Chypre"=>"Nicosie", "Lituanie"=>"Vilnius", "République Tchèque"=>"Prague", "Estonie"=>"Tallinn", "Hongrie"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valletta", "Autriche" => "Vienne", "Pologne"=>"Varsovie") ;

foreach ($ceu as $pays => $capital) {
    echo "La capitale de ".$pays." est ".$capital."</br>";
}
?>
<body>
    
</body>
</html>