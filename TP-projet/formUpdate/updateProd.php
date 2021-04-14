<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=miniboutique;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location:admin.php');
}


/*Sélectionne toutes les valeurs dans la table users*/
$sql1 = $pdo->prepare("SELECT * FROM products where idProduct =" . $id);
$sql1->execute();


$resultat1 = $sql1->fetchAll(PDO::FETCH_ASSOC);

/*Sélectionne toutes les valeurs dans la table catégories*/
$sql2 = $pdo->prepare("SELECT * FROM categories");
$sql2->execute();


$resultat2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma mini boutique</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo"><img class="logo" src='uploads/logo.png' /></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <?php if (isset($_SESSION['pseudo'])) {
                    echo "<li class='hello'>Bonjour " . $_SESSION['pseudo'] . "</h4></li>";
                } ?>
                <li><a href="index.php">Ma petite boutique</a></li>
                <li><a href="admin.php">Tableau de bord</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="index.php">Ma petite boutique</a></li>
        <li><a href="logout.php">Déconnexion</a></li>
    </ul>

    <?php foreach ($resultat1 as $key => $value) { ?>
        <h2 class="center-align">Modifier un produit</h2>
        <div class="row center-align">
            <div class="col s2"></div>
            <div class="col s8">
                <form action="../formUpdate/form-update-products.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s10">
                            <label for="name">Nom du produit</label>
                            <input type="text" name="name" class="validate" value="<?php echo $value['name'] ?>" />
                        </div>
                        <div class="input-field col s2">
                            <label for="name">Prix en €</label>
                            <input type="number" name="price" class="validate" value="<?php echo $value['price'] ?>" />
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="input-field col s8">
                                <textarea id="textarea1" class="materialize-textarea" name="description" value="<?php echo $value['description'] ?>"><?php echo $value['description'] ?></textarea>
                                <label for="description">Description du produit</label>
                            </div>
                            <div class="input-field col s4">
                                    <select name="idCategory">
                                        <!-- <option value="" disabled selected>Choisissez la catégorie</option> -->
                                        <?php foreach ($resultat2 as $key => $value2) { 
                                            if ($value['idCategory'] = $value2['idCategory']) { ?>
                                                <option value="<?php echo $value2['idCategory'] ?>"  selected><?php echo $value2['nameCategory'] ?></option>
                                            <?php }else { ?>
                                                <option value="<?php echo $value2['idCategory'] ?>"><?php echo $value2['nameCategory'] ?></option>
                                            <?php } ?>
                                            
                                            
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col s4 imageUpdate">
                            <img src="../public/<?php echo $value['image'] ?>">
                            </div>
                            <div class="file-field input-field col s8">
                                <div class="btn">
                                    <span>Photo</span>
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="urlImage" value="<?php echo $value['image'] ?>"></input>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter le produit
                            <i class="material-icons right ">add</i>
                        </button>
                    </form>
            </div>
            <div class="col s2"></div>
        </div>
    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../public/js/app.js"></script>
</body>

</html>