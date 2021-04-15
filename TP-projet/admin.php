<?php session_start();

if (isset($_SESSION['pseudo'])) {
} else {
    header('location:login.php');
}
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

    $sth3 = $pdo->prepare("SELECT * FROM users");
    $sth3->execute();


    $resultat3 = $sth3->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

include 'header.php';

?>

    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s4"><a href="#tab1">Ajouter des catégories</a></li>
                <li class="tab col s4"><a class="active" href="#tab2">Ajouter des produits</a></li>
                <li class="tab col s4"><a href="#tab3">Ajouter des utilisateurs</a></li>
            </ul>
        </div>
        <div id="tab1">
            <h2 class="center-align">Ajouter une nouvelle catégorie</h2>
            <div class="row center-align">
                <div class="col s2"></div>
                <div class="col s8">
                    <form action="formCreate/form-categories.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="name">Nom de la catégorie de produit</label>
                                <input type="text" name="nameCategory" class="validate" />
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter une catégorie
                                <i class="material-icons right ">add</i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col s2"></div>
            </div>

            <table>
                <tr>
                    <th>Nom de la catégorie</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($resultat2 as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['nameCategory'] ?></td>
                        <td><a href="updateCategory.php?id=<?php echo $value['idCategory'] ?>">Modifier</a></td>
                        <td><a href="formDelete/deleteCategory.php?id=<?php echo $value['idCategory'] ?>">Supprimer</a></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div id="tab2">
            <h2 class="center-align">Ajouter un nouveau produit</h2>
            <div class="row center-align">
                <div class="col s2"></div>
                <div class="col s8">
                    <form action="formCreate/form-products.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s8">
                                <label for="name">Nom du produit</label>
                                <input type="text" name="name" class="validate" />
                            </div>
                            <div class="input-field col s2">
                                <label for="name">Quantité en stock</label>
                                <input type="number" name="stock" class="validate" />
                            </div>
                            <div class="input-field col s2">
                                <label for="name">Prix du produit en €</label>
                                <input type="number" name="price" class="validate" />
                            </div>
                        </div>
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s8">
                                    <textarea id="textarea1" class="materialize-textarea" name="description"></textarea>
                                    <label for="description">Description du produit</label>
                                </div>
                                <div class="input-field col s4">
                                    <select name="idCategory">
                                        <option value="" disabled selected>Choisissez la catégorie</option>
                                        <?php foreach ($resultat2 as $key => $value) { ?>
                                            <option value="<?php echo $value['idCategory'] ?>"><?php echo $value['nameCategory'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>


                            </div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Photo</span>
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter le produit
                                <i class="material-icons right ">add</i>
                            </button>
                        </form>
                </div>
                <div class="col s2"></div>
            </div>

            <table>
                <tr>
                    <th>Nom du produit</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Prix</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($resultat as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['description'] ?></td>
                        <td><?php echo $value['stock'] ?></td>
                        <td><?php echo $value['price'] ?>€</td>
                        <td><img src="public/<?php echo $value['image'] ?>" width=50 height=50></td>
                        <td><a href="updateProd.php?id=<?php echo $value['idProduct'] ?>">Modifier</a></td>
                        <td><a href="formDelete/deleteProduct.php?id=<?php echo $value['idProduct'] ?>">Supprimer</a></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

        <div id="tab3">
            <h2 class="center-align">Ajouter un nouvel utilisateur</h2>
            <div class="row center-align">
                <div class="col s2"></div>
                <div class="col s8">
                    <form action="form-users.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="name">Pseudo</label>
                                <input type="text" name="pseudo" class="validate" />
                            </div>

                        </div>
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="name">Mot de passe</label>
                                    <input type="password" name="mdp" class="validate" />
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter un utilisateur
                                <i class="material-icons right ">add</i>
                            </button>
                        </form>
                </div>
                <div class="col s2"></div>
            </div>
            <table>
                <tr>
                    <th>Nom de l'utilisateur</th>
                    <th>Date d'inscriptions</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($resultat3 as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['pseudo'] ?></td>
                        <td><?php echo $value['dateCreation'] ?></td>
                        <td><a href="updateUser.php?id=<?php echo $value['idUser'] ?>">Modifier</a></td>
                        <td><a href="deleteUser.php?id=<?php echo $value['idUser'] ?>">Supprimer</a></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            © 2020 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">Créé par Nicolas Gicquel - Arinfo Saint Nazaire</a>
        </div>
    </div>
</footer>
<script src="public/js/app.js"></script>
<script>
    //Système d'onglets de Materialize
    $(document).ready(function() {
        $('.tabs').tabs();
    });
</script>
</body>

</html>