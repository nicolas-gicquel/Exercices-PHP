<?php
session_start();
include_once("fonctions-panier.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $n = (isset($_POST['n'])? $_POST['n']:  (isset($_GET['n'])? $_GET['n']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $n = preg_replace('#\v#', '',$n);
   //On vérifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($n,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($n);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['name'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

    <form method="post" action="panier.php">
        <table style="width: 400px">
            <tr>
                <td colspan="4">Votre panier</td>
            </tr>
            <tr>
                <td>Libellé</td>
                <td>Quantité</td>
                <td>Prix Unitaire</td>
                <td>Action</td>
            </tr>


            <?php
            if (creationPanier()) {
                $nbArticles = count($_SESSION['panier']['name']);
                if ($nbArticles <= 0)
                    echo "<tr><td>Votre panier est vide </ td></tr>";
                else {
                    for ($i = 0; $i < $nbArticles; $i++) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($_SESSION['panier']['name'][$i]) . "</ td>";
                        echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"" . htmlspecialchars($_SESSION['panier']['quantity'][$i]) . "\"/></td>";
                        echo "<td>" . htmlspecialchars($_SESSION['panier']['price'][$i]) . "</td>";
                        echo "<td><a href=\"" . htmlspecialchars("panier.php?action=suppression&n=" . rawurlencode($_SESSION['panier']['name'][$i])) . "\">Supprimer</td>";
                        echo "</tr>";
                    }

                    echo "<tr><td colspan=\"2\"> </td>";
                    echo "<td colspan=\"2\">";
                    echo "Total : " . MontantGlobal();
                    echo "</td></tr>";

                    echo "<tr><td colspan=\"4\">";
                    echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                    echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

                    echo "</td></tr>";
                }
            }
            ?>
        </table>
    </form>


</body>

</html>

