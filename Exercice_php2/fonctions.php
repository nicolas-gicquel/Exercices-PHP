<?php
function whatstime($heure)
{
    if ($heure > 12 && $heure < 22) {
        echo 'C\'est l\'après midi!';
    } elseif ($heure >= 22 || $heure <= 6) {
        echo 'C\'est la nuit!';
    } else {
        echo 'C\'est le matin!';
    }
}
function questionage($age)
{
    if ($age > 18) {
        echo 'Vous êtes majeur ';
    } else {
        echo 'Vous êtes mineur ';
    }
}
function choice($choice)
{
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
}

function multiple($nb)
{
    if ($nb % 3 == 0 && $nb % 5 == 0) {
        echo $nb . " est un multiple de 3 et 5";
    } else {
        echo $nb . " n'est pas un multiple de 3 et 5";
    }
}
function HT($HT)
{
    $TTC = $HT + $HT * 0.2;
    echo "Le prix hors taxe de $HT euros est $TTC euros";
}

function convert($montant, $devise)
{


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
}
