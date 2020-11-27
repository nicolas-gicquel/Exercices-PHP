<?php


//----------------SYSTEME D'UPLOAD D'IMAGES----------------------/
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// On vérifie si le fichier image est une image réelle ou une fausse image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// On vérifie si le fichier existe déjà
if (file_exists($target_file)) {
    echo "Désolé, ce fichier existe déjà.";
    $uploadOk = 0;
  }

// On vérifie la taille de l'image
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Désolé, ce fichier dépasse la limite de taille autorisée.";
    $uploadOk = 0;
  }

// On vérifie le type de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
  $uploadOk = 0;
}

// On vérifie si $uploadOk est à 0 à cause d'une erreur
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // Si tout est ok on essaye d'uploader le fichier
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
//---------------------FIN SYSTEME D'UPLOAD D'IMAGES------------------------------/

//3-On crée la base de données//
$pdo = new PDO('mysql:host=localhost;port=3308','root',''); 
$sql = "CREATE DATABASE IF NOT EXISTS `miniboutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

//4-Creation de la table users//
try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3308','root','',
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

 //5- On remplit la base de données grâce au formulaire
 try{
    $pdo = new PDO('mysql:host=localhost;dbname=miniboutique;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    //2- On récupère les données du formulaire
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $image = "uploads/".$_FILES["fileToUpload"]["name"];


   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO products(name,price,description,category,image)
        VALUES (:name, :price, :description, :category, :image)
    ");
    
    $sth->execute(array(
                        ':name' => $name,
                        ':price' => $price,
                        ':description' => $description,
                        ':category' => $category,
                        ':image' => $image));
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:admin.php');
?>