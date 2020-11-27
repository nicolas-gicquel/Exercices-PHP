<?php
/////////////////////////////Systèmr de suppression de voiture/////////////////////////////////////


/*Je récupère l'id de la voiture que je veux supprimer*/
$voiture = $_GET['id'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=voitures;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM voitures WHERE id_voiture=$voiture";
    $sth = $pdo->prepare($sql);
    $sth->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

header("location:admin.php");
?>