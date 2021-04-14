<?php
session_start();
if (isset($_SESSION['pseudo'])) {
    header('location:admin.php');
}
include 'header.php';
?>

    <h2 class="center-align">Connexion</h2>
    <div class="row center-align">
        <div class="col s2"></div>
        <div class="col s8">
            <form action="formCreate/form-login.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12">
                        <label for="name">Pseudo</label>
                        <input type="text" name="pseudo" class="validate" />
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <label for="name">Mot de passe</label>
                        <input type="password" name="mdp" class="validate" />
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Connexion
                    <i class="material-icons right ">add</i>
                </button>
            </form>
        </div>
        <div class="col s2"></div>
    </div>

</body>

</html>