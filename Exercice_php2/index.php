<?php 
    require 'fonctions.php';
?>

<h2>Exercice 1</h2>
<?php
$ville44 = array('Nantes', 'Saint Nazaire', 'Chateaubriant', 'Ancenis', 'Guérande');
?>
<h3>Avec for</h3>

<?php

for ($i = 0; $i < count($ville44); $i++) {
    echo $ville44[$i]." ";
}
?>

<h3>Avec foreach</h3>

<?php
foreach ($ville44 as $element) {
    echo $element . " ";
}
?>

<h2>Exercice 2</h2>
<?php
$pays = array('nom' => 'France', 'langue' => 'Français', 'devise' => 'Euros', 'Population' => 67000000, 'capitale' => 'Paris');
?>

<h3>Avec foreach</h3>

<?php
foreach ($pays as $element) {
    echo $element . " ";
}
?>
<br>
<br>

<h2>Exercice 3</h2>

<?php
whatstime(13);
echo '<br>';
whatstime(5);
?>

<h2>Exercice 4</h2>

<?php
questionage(13);
?>

<h2>Exercice 5</h2>

<?php
multiple(13);
?>

<h2>Exercice 6</h2>

<?php
formHT();
?>

