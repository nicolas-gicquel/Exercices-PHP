<?php
//Création de la base de données//
$pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `miniboutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

$sql = "CREATE DATABASE IF NOT EXISTS `miniboutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);


//Créations des différentes tables de la base de données
try {
  $pdo = new PDO(
    'mysql:host=localhost;dbname=miniboutique;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
  );

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.

  //Création de la table des utilisateurs

  $sql = "CREATE TABLE IF NOT EXISTS `miniboutique`.`users` ( 
        `idUser` INT NOT NULL AUTO_INCREMENT , 
        `pseudo` VARCHAR(50) NOT NULL , 
        `mdp` VARCHAR(255) NOT NULL ,  
        `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`idUser`)) ENGINE = InnoDB;";

  $pdo->exec($sql);

  echo 'Félicitations la table  "Users" a bien été créée !<br>';

  //Création de la table des catégories de produits

  $sql = "CREATE TABLE IF NOT EXISTS `miniboutique`.`categories` ( 
    `idCategory` INT NOT NULL AUTO_INCREMENT , 
    `nameCategory` VARCHAR(50) NOT NULL , 
    PRIMARY KEY (`idCategory`)) ENGINE = InnoDB;";

  $pdo->exec($sql);

  echo 'Félicitations, la table "Categories" a bien été créée !<br>';

  //Création de la table des produits

  $sql = "CREATE TABLE IF NOT EXISTS `miniboutique`.`products` ( 
  `idProduct` INT NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(50) NOT NULL , 
  `price` INT(6) NOT NULL ,
  `description` VARCHAR(255) NOT NULL ,
  `image` VARCHAR(255) NOT NULL ,  
  `dateMessage` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `idCategory` INT(50) NOT NULL , 
  PRIMARY KEY(idProduct),
  FOREIGN KEY(idCategory) REFERENCES categories(idCategory)) ENGINE = InnoDB;";

  $pdo->exec($sql);

  echo 'Félicitations, la table "Products" a bien été créée !';
} catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}
