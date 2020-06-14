<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma petite boutique</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Ma petite boutique</a></li>
                <li><a href="admin.php">Connexion</a></li>
            </ul>
        </div>
    </nav>
<?php
    try {
        $pdo = new PDO(
          'mysql:host=localhost;dbname=miniboutique;port=3308',
          'root',
          '',
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*Sélectionne toutes les valeurs dans la table users*/
        $sth = $pdo->prepare("SELECT * FROM products");
        $sth->execute();


        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

     
        //Affichage du tableau des valeurs
        


          foreach ($resultat as $key => $value) { ?>

            <div class="row">
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo $value['image']?>">
          <span class="card-title">Card Title</span>
        </div>
        <div class="card-content">
          <p><?php echo $value['description'] ?></p>
        </div>
        <div class="card-action">
        <span><?php echo $value['price']."€" ?></span>
        </div>
      </div>
    </div>
  
            
          
        
        
        <?php } ?>

</div>
          

        

<?php
      } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
      ?>

    

    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                © 2020 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">Créé par Nicolas Gicquel - Arinfo Saint Nazaire</a>
            </div>
        </div>
    </footer>

</body>

</html>