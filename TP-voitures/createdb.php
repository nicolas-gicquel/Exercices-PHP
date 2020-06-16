<?php


$pdo = new PDO('mysql:host=localhost;port=3308','root',''); 
$sql = "CREATE DATABASE IF NOT EXISTS `voitures` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);


try{
    $pdo = new PDO('mysql:host=localhost;dbname=voitures;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
 
    $sql = "CREATE TABLE IF NOT EXISTS `voitures`.`voitures` ( 
        `id_voiture` INT NOT NULL AUTO_INCREMENT , 
        `immatriculation` VARCHAR(50) NOT NULL , 
        `marque` VARCHAR(255) NOT NULL ,  
        `modele` VARCHAR(255) NOT NULL ,
        `annee` VARCHAR(255) NOT NULL,
        `image` VARCHAR(255) NOT NULL ,
        PRIMARY KEY (`id_voiture`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql);
 
    echo 'Félicitations, la table a bien été créée !<br>';

    $sql2 = "CREATE TABLE IF NOT EXISTS `voitures`.`users` ( 
        `id_user` INT NOT NULL AUTO_INCREMENT , 
        `voiture` INT(5) NOT NULL , 
        `nom` VARCHAR(255) NOT NULL , 
        `prenom` VARCHAR(255) NOT NULL ,  
        `dateLocation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id_user`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql2);
 
    echo 'Félicitations, la table a bien été créée !';
    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }
