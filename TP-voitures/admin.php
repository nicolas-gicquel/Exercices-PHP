<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nico Rent</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    </link>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="app.js"></script>
</head>

<body>
    <?php
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=voitures;port=3308',
            'root',
            '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*Sélectionne toutes les valeurs dans la table voitures*/
        $sth = $pdo->prepare("SELECT * FROM voitures");
        $sth->execute();

        $sth2 = $pdo->prepare("SELECT * FROM users");
        $sth2->execute();

        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        $resultat2 = $sth2->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    ?>
    <h2 class="center-align">Ajouter une nouvelle voiture</h2>
    <div class="row center-align">
        <div class="col s2"></div>
        <div class="col s8">
            <form action="formVoitures.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s4">
                        <label for="marque">marque</label>
                        <input type="text" name="marque" class="validate" />
                    </div>
                    <div class="input-field col s4">
                        <label for="modele">modèle</label>
                        <input type="text" name="modele" class="validate" />
                    </div>
                    <div class="input-field col s2">
                        <label for="annee">année</label>
                        <input type="text" name="annee" class="validate" />
                    </div>
                    <div class="input-field col s2">
                        <label for="immatriculation">immatriculation</label>
                        <input type="text" name="immatriculation" class="validate" />
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
                <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter une voiture
                    <i class="material-icons right ">add</i>
                </button>
            </form>
        </div>
        <div class="col s2"></div>
    </div>

    <h3>Liste des voitures</h3>

    <!-- Affichage du tableau des voitures -->
    <div class="tableContainer">
        <table id="tableUsers" class="highlight centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Marque</th>
                    <th>Modele</th>
                    <th>Année</th>
                    <th>Immatriculation</th>
                </tr>
            </thead>
            <?php
            foreach ($resultat as $key => $value) { ?>
                <tr>
                    <td><img src="<?php echo $value['image'] ?>" width=150 height=100></td>
                    <td><?php echo $value['marque'] ?></td>
                    <td><?php echo $value['modele'] ?></td>
                    <td><?php echo $value['annee'] ?></td>
                    <td><?php echo $value['immatriculation'] ?></td>


                </tr>

            <?php
            }
            ?>

        </table>
    </div>


    <h2 class="center-align">Ajouter un nouveau client</h2>

    <div class="row center-align">
        <div class="col s2"></div>
        <div class="col s8">
            <form action="formUsers.php" method="post">
                <div class="row">
                    <div class="input-field col s3">
                        <label for="nom">nom</label>
                        <input type="text" name="nom" class="validate" />
                    </div>
                    <div class="input-field col s3">
                        <label for="prenom">prénom</label>
                        <input type="text" name="prenom" class="validate" />
                    </div>
                    <div class="input-field col s6">

                        <select name="voiture">
                            <option value="" disabled selected>Choisissez votre voiture</option>
                            <?php

                            foreach ($resultat as $key => $value) { ?>
                                <option value="<?php echo $value['id_voiture'] ?>"><?php echo $value['marque'] . " " . $value['modele'] ?></option>

                            <?php
                            }
                            ?>

                        </select>

                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter une voiture
                    <i class="material-icons right ">add</i>
                </button>
            </form>
        </div>
        <div class="col s2"></div>
    </div>

    <!-- Affichage du tableau des utilisateurs -->
    <div class="tableContainer">
        <table id="tableVoitures" class="highlight centered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de location</th>
                    <th>Voiture</th>
                    <th></th>
                </tr>
            </thead>
            <?php
            foreach ($resultat2 as $key2 => $value2) {
                $date = strftime('%d/%m/%Y à %Hh%M', strtotime($value2['dateLocation']));
            ?>
                <tr>

                    <td><?php echo $value2['nom'] ?></td>
                    <td><?php echo $value2['prenom'] ?></td>
                    <td><?php echo  $date ?></td>
                    <?php
                    foreach ($resultat as $key => $value) {
                        if ($value2['voiture'] == $value['id_voiture']) { ?>
                            <td><?php echo $value['marque'] . " " . $value['modele'] ?></td>
                            <td><img src="<?php echo $value['image'] ?>" width=150 height=100></td>
                    <?php
                        }
                    }
                    ?>



                </tr>

            <?php
            }
            ?>

        </table>
    </div>



</body>

</html>