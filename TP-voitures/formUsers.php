<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=voitures;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    //2- On récupère les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $voiture = $_POST['voiture'];
    


   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO users(nom, prenom, voiture)
        VALUES (:nom, :prenom, :voiture)
    ");
    
    $sth->execute(array(
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':voiture' => $voiture));
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:admin.php');
