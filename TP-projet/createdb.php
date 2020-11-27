<?php





try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
 
    $sql = "CREATE TABLE IF NOT EXISTS `miniboutique`.`users` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `pseudo` VARCHAR(50) NOT NULL , 
        `mdp` VARCHAR(255) NOT NULL ,  
        `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql);
 
    echo 'Félicitations la table a bien été créée !<br>';

    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }

 //3-On crée la base de données//
$pdo = new PDO('mysql:host=localhost;port=3306','root',''); 
$sql = "CREATE DATABASE IF NOT EXISTS `miniboutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

//4-Creation de la table users//
try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
 
    $sql = "CREATE TABLE IF NOT EXISTS `miniboutique`.`products` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `name` VARCHAR(50) NOT NULL , 
        `price` INT(6) NOT NULL ,
        `description` VARCHAR(255) NOT NULL ,
        `category` VARCHAR(255) NOT NULL ,
        `image` VARCHAR(255) NOT NULL ,  
        `dateMessage` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql);
 
    echo 'Félicitations, la table a bien été créée !';
    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }
