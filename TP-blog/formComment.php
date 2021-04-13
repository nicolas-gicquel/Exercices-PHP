<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=tpblog;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
 
    $auteur = $_POST['auteur'];
    $commentaire = $_POST['commentaire'];
    $id_post = $_POST['id_post'];


 
   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO commentaires(auteur,commentaire,id_post)
        VALUES (:auteur,:commentaire, :id_post)
    ");
    
    $sth->execute(array(
                        ':auteur' => $auteur,
                        ':commentaire' => $commentaire,
                        ':id_post' => $id_post));
 
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}


 header('location:index.php');
?>