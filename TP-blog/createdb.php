<?php


$pdo = new PDO('mysql:host=localhost;port=3306','root',''); 
$sql = "CREATE DATABASE IF NOT EXISTS `tpblog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);


try{
    $pdo = new PDO('mysql:host=localhost;dbname=tpblog;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
 
    $sql = "CREATE TABLE IF NOT EXISTS `tpblog`.`posts` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `titre` VARCHAR(50) NOT NULL , 
        `contenu` VARCHAR(255) NOT NULL ,  
        `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql);
 
    echo 'Félicitations, la table a bien été créée !<br>';

    $sql2 = "CREATE TABLE IF NOT EXISTS `tpblog`.`commentaires` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `id_post` INT(5) NOT NULL , 
        `auteur` VARCHAR(255) NOT NULL , 
        `commentaire` VARCHAR(255) NOT NULL ,  
        `dateMessage` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql2);
 
    echo 'Félicitations, la table a bien été créée !';
    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }
