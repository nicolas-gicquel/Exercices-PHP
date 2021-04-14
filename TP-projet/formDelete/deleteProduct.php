<?php
/////////////////////////////Système de suppression d'un produit/////////////////////////////////////


$product = $_GET['id'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM products WHERE idProduct=$product";
    $sth = $pdo->prepare($sql);
    $sth->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

header("location:../admin.php");
?>