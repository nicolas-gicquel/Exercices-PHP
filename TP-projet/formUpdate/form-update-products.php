<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    //2- On récupère les données du formulaire
    $id = $_GET['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['idCategory'];


    if ($_FILES["fileToUpload"]['name'] != '') {
        $image = "uploads/".$_FILES["fileToUpload"]["name"];
    }else {
        $image = $_POST['urlImage'];
    }
    


   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare(
    "UPDATE `products` SET `name` = '$name', `price` = '$price', `description` = '$description', `idCategory` = '$category', `image` = '$image' WHERE idProduct = $id");
    
    $sth->execute();
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:../admin.php');
