<?php

//3-On crée la base de données//
$pdo = new PDO('mysql:host=localhost;port=3308','root',''); 
$sql = "CREATE DATABASE IF NOT EXISTS `Minichat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

//4-Creation de la table users//
try{
    $pdo = new PDO('mysql:host=localhost;dbname=minichat;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
 
    $sql = "CREATE TABLE IF NOT EXISTS `minichat`.`users` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `pseudo` VARCHAR(50) NOT NULL , 
        `message` VARCHAR(255) NOT NULL ,  
        `dateMessage` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql);
 
    echo 'Félicitations, la table a bien été créée !';
    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }
//5- On remplit la base de données grâce au formulaire
 try{
    $pdo = new PDO('mysql:host=localhost;dbname=minichat;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];


 
   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO Users(pseudo,message)
        VALUES (:pseudo, :message)
    ");
    
    $sth->execute(array(
                        ':pseudo' => $pseudo,
                        ':message' => $message));
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

//6- On redirige vers la page index.php après l'exécution du script
header('location:index.php');

?>

