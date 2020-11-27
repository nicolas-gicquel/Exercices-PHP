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

try{
    $pdo = new PDO('mysql:host=localhost;dbname=voitures;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    //2- On récupère les données du formulaire
    $modele = $_POST['modele'];
    $marque = $_POST['marque'];
    $annee = $_POST['annee'];
    $immatriculation = $_POST['immatriculation'];
    $image = "uploads/".$_FILES["fileToUpload"]["name"];


   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO voitures(modele,marque,annee,immatriculation,image)
        VALUES (:modele, :marque, :annee, :immatriculation, :image)
    ");
    
    $sth->execute(array(
                        ':modele' => $modele,
                        ':marque' => $marque,
                        ':annee' => $annee,
                        ':immatriculation' => $immatriculation,
                        ':image' => $image));
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:admin.php');
