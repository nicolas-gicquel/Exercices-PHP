<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>TP Mini-chat OpenClassRoom</h1>

    <form class="formArea" action="form.php" method="post">
        <label for="pseudo">Pseudo:</label>
        <input type="text" name="pseudo" width="200"/>
        <textarea  name="message" rows="10" cols="60"/>Ecrivez votre message</textarea>
        <input class="inputSubmit" type="submit" value="Envoyer">
    </form>

    <?php
      try {
        $pdo = new PDO(
          'mysql:host=localhost;dbname=minichat;port=3308',
          'root',
          '',
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*Sélectionne toutes les valeurs dans la table users*/
        $sth = $pdo->prepare("SELECT * FROM users");
        $sth->execute();


        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

      ?>
        <!-- Affichage du tableau des valeurs -->
        

          <?php
          foreach ($resultat as $key => $value) {
            echo "<strong>" . $value['pseudo'] . ":</strong> " . $value['message'] . "<br>" ;
          }
          ?>

        

      <?php
      } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }

      ?>

</body>

</html>