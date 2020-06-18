<?php





try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3308','root','',
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
