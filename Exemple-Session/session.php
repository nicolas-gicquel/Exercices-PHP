<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cours PHP & MySQL</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cours.css">
</head>

<body>
    <?php
    echo 'Bonjour ' . $_SESSION['prenom'] . ',
           tu as ' . $_SESSION['age'] . ' ans';
    echo $_COOKIE['pseudo'];
    echo $_COOKIE['pays'];
    ?>
</body>

</html>