<?php
//7- On récupère les informations dans la base de données
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=tpblog;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*Sélectionne toutes les valeurs dans la table users*/
    $sth1 = $pdo->prepare("SELECT * FROM posts");
    $sth1->execute();

    $sth2 = $pdo->prepare("SELECT * FROM commentaires");
    $sth2->execute();


    $resultat1 = $sth1->fetchAll(PDO::FETCH_ASSOC);
    $resultat2 = $sth2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LE BLOG!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="app.js"></script>
</head>

<body>
    <h1>LE BLOG!</h1>

    <a class="btn btn-new" href="admin.php">Créer un post</a>
    <!-- Affichage du tableau des valeurs -->


    <?php
    foreach ($resultat1 as $key1 => $value1) {
        $date = strftime('%d/%m/%Y à %Hh%M', strtotime($value1['dateCreation']));

    ?>
        <div class="containerPost">
            <div class="accordion">
                <div class="titrePost">
                    <span><?php echo $value1['titre'] ?></span><span class='datePost'><?php echo " Posté le " . $date ?></span>
                </div>
            </div>
            <div class="panel">
                <div class="contenuPost">
                    <p><?php echo $value1['contenu'] ?></p>

                </div>
                <div id="commentContainer" class="commentContainer">
                    <?php
                    foreach ($resultat2 as $key2 => $value2) {
                        $date = strftime('%d/%m/%Y à %Hh%M', strtotime($value2['dateMessage']));
                        if ($value1['id'] == $value2['id_post']) {


                    ?>

                            <div class='commentHeader'>
                                <span class="auteurComment"><?php echo $value2['auteur'] ?></span>
                                <span class="dateComment">le <?php echo $date ?></span>
                            </div>
                            <div class='commentContent'>
                                <p><?php echo $value2['commentaire'] ?></p>
                            </div>

                    <?php
                        }
                    }
                    ?>
                    <span id="linkComment" class="linkComment"><a href="commentaire.php?id=<?php echo $value1['id'] ?>">Un commentaire?</a></span>
                </div>
            </div>
        </div>
    <?php
    }
    ?>



<script src="js/app.js"></script>
</body>

</html>