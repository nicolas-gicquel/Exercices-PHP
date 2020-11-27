<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP 1</title>
</head>
<body>
<h2>Exercice 1</h2>
    <?php
    $nom = "Martin";
    $anneeNaissance = 2000;
    $anneeActuelle = 2020;
    $age = $anneeActuelle - $anneeNaissance;

    echo 'Bonjour Mr ' . $nom . ' vous avez ' . $age . ' ans ';
    ?>

<h2>Exercice 2</h2>
<?php
$note_maths = 15;
$note_français = 12;
$note_HG = 9;

$moyenne = ($note_maths + $note_français + $note_HG)/3;

echo "La moyenne est de $moyenne/20";
 ?>   

<h2>Exercice 3</h2>

<?php
$sexe = 'homme';
if ($sexe = 'homme') {
    echo 'Vous êtes un homme';
} else {
    echo 'Vous êtes une femme';
}
?>

<h2>Exercice 4</h2>

    <?php
    $heure = 15;
    if ($heure > 12 && $heure < 22) {
        echo 'C\'est l\'après midi!';
    } elseif ($heure >= 22 || $heure <= 6) {
        echo 'C\'est la nuit!';
    } else {
        echo 'C\'est le matin!';
    }

    ?>

<h2>Exercice 5</h2>

    <?php
    $age = 22;
    if ($age > 18) {
        echo 'Vous êtes majeur ';
    } else {
        echo 'Vous êtes mineur ';
    }
    ?>

<h2>Exercice 6</h2>

    <?php
    $choice = 2;
    switch ($choice) {
        case 1:
            echo 'Insérer';
            break;
        case 2:
            echo 'Supprimer';
            break;
        case 3:
            echo 'Afficher';
            break;

        default:
            echo 'Ce choix n\'existe pas';
            break;
    }

    ?><h2>Exercice 7</h2>

    <?php
    $nb = 154;
    if ($nb % 3 == 0 && $nb % 5 == 0) {
        echo $nb . " est un multiple de 3 et 5";
    } else {
        echo $nb . " n'est pas un multiple de 3 et 5";
    }
    ?>

<h2>Exercice 8</h2>
<?php
    $HT = 400;
    $TTC = $HT + $HT * 0.2;

    echo "Le prix hors taxe est $TTC";
?>
<h2>Exercice 9</h2>
<?php
        $montant = 99;
        $devise = '£';

        switch ($devise) {
            case '£':
                $taux = 0.90;
                break;

            case '$':
                $taux = 1.09;
                break;

            case 'F':
                $taux = 6.56;
                break;


            }
        $convert = $montant * $taux;
       
        $message2 = '<p>' . $montant . '€ vaux ' . $convert . ' ' . $devise . '</p>';
        echo $message2;
     
    


    ?>

<h2>Exercice 10</h2>

<?php
$age = 32;
$sexe = "femme";

if ($age >= 18 && $age <= 25 && $sexe == "femme") {
    echo "C'est bon!";
} else {
    echo "C'est pas bon!";
}

/*ou*/

if ($age >= 18 && $age <= 25 ) {
    if ($sexe == "femme") {
        echo "C'est bon!";
    }else {
        echo "C'est pas bon!";
    }
    
} else {
    echo "C'est pas bon!";
}
?>

<h2>Exercice 11</h2>
<?php
$i = 44000;
while ($i < 45000) {
    echo $i . ' ';
    $i += 10;
}
?>

<h2>Exercice 12</h2>

    <?php
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $i;
        }
        echo '<br>';
    }
    ?>

<h2>Exercice 13</h2>

    <?php
    $truc = 0;
    while ($truc <= 20) {
        if ($truc == 10) {
            echo "<strong style='color:red'>" . $truc . "</strong> ";
        } else {
            echo $truc . ' ';
        }
        $truc += 2;
    }
    ?>

<h2>Exercice 14</h2>
    <?php
    $chiffre = 4;
    if ($chiffre % 2 == 0) {
        echo "C'est un chiffre pair!";
    } else {
        echo "C'est un chiffre impair!";
    }
    echo '<br><br>';
    do {
        $nb1 = rand(0, 9);
        $nb2 = rand(0, 9);
        $nb3 = rand(0, 9);
        echo $nb1 . ',' . $nb2 . ',' . $nb3 . '<br>';
    } while ($nb1 % 2 == 1 || $nb2 % 2 == 0 || $nb3 % 2 == 0);

    ?>

<h2>Exercice 15</h2>

<h3>Avec while</h3>
<?php
// $nb = 9;
// $essais = 0;
// while ($i != $nb) {
//     $i = rand(0, 10);
//     echo $i . '<br>';
//     $essais++;
// }
// echo $essais . ' essais pour trouver ' . $nb;
?> 

<h3>Avec for</h3>

<?php
$nb2 = 152;
for ($essais = 0; $j != $nb2; $essais++) {
    $j = rand(100, 999);
    echo $j . '<br>';
}
echo $essais . ' essais pour trouver ' . $nb;
    
?>
</body>
</html>