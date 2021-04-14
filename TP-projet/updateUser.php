<?php
session_start();
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


/*Sélectionne toutes les valeurs dans la table categories*/
$sql1 = $pdo->prepare("SELECT * FROM users where idUser =" . $id);
$sql1->execute();


$resultat1 = $sql1->fetchAll(PDO::FETCH_ASSOC);


include 'header.php';

?>




    <?php foreach ($resultat1 as $key => $value) { ?>
        <h2 class="center-align">Modifier un utilisateur</h2>
        <div class="row center-align">
            <div class="col s2"></div>
            <div class="col s8">
                <form action="formUpdate/form-update-user.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <div class="row">
                        <div class="input-field col s10">
                            <label for="name">Nom de la categorie</label>
                            <input type="text" name="pseudo" class="validate" value="<?php echo $value['pseudo'] ?>" />
                        </div>
                    </div>
                    
                        
                        <button class="btn waves-effect waves-light" type="submit" name="action">Modifier l'utilisateur
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