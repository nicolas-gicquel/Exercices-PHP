<?php 
    require 'fonctions.php';
?>

<h1>Exercice 1 (1ère version)</h1>


<?php
$tableau = array('Nantes', 'Saint Nazaire', 'Chateaubriant', 'Ancenis', 'Guérande');
?>
<table border=4 cellspacing=4 cellpadding=4 width=80% >
<tr>
    <td>Clé</td>
    <td>Valeurs</td>
<tr>
 <?php
for ($i=0; $i < 5; $i++) {
    $cle = $i+1;
    echo "<tr>
            <td>$cle</td>
            <td>$tableau[$i]</td>
          </tr>";
}
    ?>

</table>

<h1>Exercice 1 (2ème version)</h1>

<?php
$tableau = array('Nantes', 'Saint Nazaire', 'Chateaubriant', 'Ancenis', 'Guérande');
?>
<table border=4 cellspacing=4 cellpadding=4 width=80% >
<tr>
    <td>Clé</td>
    <td>Valeurs</td>
<tr>
 <?php
for ($i=0; $i < 5; $i++) {
    $cle = $i+1;

    echo "<tr>";
    echo "<td>$cle</td>";
    echo "<td>$tableau[$i]</td>";
    echo "</tr>";
}
?>


</table>

<h1>Exercice 1 (3ème version)</h1>

<?php
$tableau = array('Nantes', 'Saint Nazaire', 'Chateaubriant', 'Ancenis', 'Guérande');
?>
<table border=4 cellspacing=4 cellpadding=4 width=80% >
<tr>
    <td>Clé</td>
    <td>Valeurs</td>
<tr>
 <?php
for ($i=0; $i < 5; $i++) {
    $cle = $i+1;
?>
<tr>
    <td><?php echo $cle ?></td>
    <td><?php echo $tableau[$i] ?></td>
</tr>

<?php
};
?>
</table>

<h1>Exercice 2</h1>

<?php
$pays = array('nom' => 'France', 'langue' => 'Français', 'devise' => 'Euros', 'Population' => 67000000, 'capitale' => 'Paris');
?>

<table border=4 cellspacing=4 cellpadding=4 width=80%>
<?php

foreach ($pays as $element=>$element2) {
    echo "<tr>
            <td>$element</td>
            <td>$element2</td>
          </tr>";

}
?>

</table>

<h1>Exercice 3</h1>

<?php
whatstime(13);
echo '<br>';
whatstime(5);
?>

<h1>Exercice 4</h1>

<?php
questionage(13);
?>

<h1>Exercice 5</h1>

<?php
choice(1);
?>

<h1>Exercice 6</h1>

<?php
multiple(13);
?>

<h1>Exercice 7</h1>

<?php
HT(66);
?>

<h1>Exercice 8</h1>

<?php
convert(77,'F');
?>
