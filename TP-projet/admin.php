<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma petite boutique</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    

</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Ma petite boutique</a></li>
                <li><a href="badges.html">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <h2 class="center-align">Ajouter un nouveau produit</h2>
    <div class="row center-align">
        <div class="col s2"></div>
        <div class="col s8">
            <form action="form-products.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s10">
                        <label for="name">Nom du produit</label>
                        <input type="text" name="name" class="validate" />
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
                            <label for="name">Catégorie du produit</label>
                            <input type="text" name="category" class="validate" />
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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