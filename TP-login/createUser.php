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
                    <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter le produit
                        <i class="material-icons right ">add</i>
                    </button>
                </form>
        </div>
        <div class="col s2"></div>
    </div>

</body>

</html>