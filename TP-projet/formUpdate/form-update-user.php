<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

    $id = $_GET['id'];
    $pseudo = $_POST['pseudo'];

    $sth = $pdo->prepare(
    "UPDATE `users` SET `pseudo` = '$pseudo' WHERE idUser = $id");
    
    $sth->execute();
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:../admin.php');