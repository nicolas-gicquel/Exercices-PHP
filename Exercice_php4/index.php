<?php
    require "fonctions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP 4</title>
</head>
<body>
<h1>Exercice 1</h1>

<?php
    increment(15);
?>

<h1>Exercice 2</h1>

<?php
    multiple(82);
?>

<h1>Exercice 3</h1>

<?php
    aireRectangle(82,25);
?>

<h1>Exercice 4</h1>

<?php
do {
    $i = rand(1,9);
    $j = rand(1,9);
    $k = rand(1,9);
    $somme = $i+$j+$k;
    echo "$i, $j, $k<br>";
} while ($somme != 10);
echo "La somme de $i+$j+$k=10";
?>

<h1>Exercice 5</h1>
<?php
racine();
?>

<h1>Exercice 6</h1>

<?php
    fibonacci();
?>

<h1>Exercice 7</h1>

<?php
    whatstime();
?>


<h1>Exercice 8</h1>

<?php
atomes();
?>

<h1>Exercice 9</h1>

<?php
identite();
?>
</body>
</html>