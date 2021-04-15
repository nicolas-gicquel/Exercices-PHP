<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    //2- On récupère les données du formulaire
    $id = $_GET['id'];
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $idCategory = $_POST['idCategory'];


    if ($_FILES["fileToUpload"]['name'] != '') {
        $image = "uploads/".$_FILES["fileToUpload"]["name"];
    }else {
        $image = $_POST['urlImage'];
    }
    


   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("UPDATE products SET name = :name, stock = :stock, price = :price, description = :description, idCategory = :idCategory, image = :image WHERE idProduct = $id");
    var_dump($sth);
    $sth->execute(array(
        ':name' => $name,
        ':stock' => $stock,
        ':price' => $price,
        ':description' => $description,
        ':idCategory' => $idCategory,
        ':image' => $image));
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:../admin.php');
