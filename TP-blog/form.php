<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=tpblog;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    //2- On récupère les données du formulaire
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];


 
   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO posts(titre,contenu)
        VALUES (:titre, :contenu)
    ");
    
    $sth->execute(array(
                        ':titre' => $titre,
                        ':contenu' => $contenu));
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}


header('location:index.php');