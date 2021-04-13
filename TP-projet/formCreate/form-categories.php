<?php

 try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $nameCategory = $_POST['nameCategory'];

    $sth = $pdo->prepare("
        INSERT INTO categories(nameCategory)
        VALUES (:nameCategory)
    ");
    
    $sth->execute(array(
                        ':nameCategory' => $nameCategory));
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:../admin.php');
?>