<?php session_start();

try {
    $pdo = new PDO(
      'mysql:host=localhost;dbname=miniboutique;port=3306',
      'root',
      '',
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*Sélectionne toutes les valeurs dans la table users*/
    $sth = $pdo->prepare("SELECT * FROM products");
    $sth->execute();


    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

    $sth2 = $pdo->prepare("SELECT * FROM categories");
    $sth2->execute();


    $resultat2 = $sth2->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
  }
include 'header.php';
  
    //Affichage ess produits

    foreach ($resultat as $key => $value) { ?>

      <a href="singleProduct?id=<?php echo $value['idProduct'] ?>">
      <div class="row">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="public/<?php echo $value['image'] ?>">
            </div>
            <div class="card-content">
            <h5 class="card-title"><?php echo $value['name'] ?></h5>
              <p><?php echo $value['description'] ?></p>
            </div>
            <div class="card-action">
              <span><?php echo $value['price'] . "€" ?></span>
            </div>
          </div>
        </div>
        </a>





      <?php } ?>

      </div>




  
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