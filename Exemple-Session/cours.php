<?php
//On démarre une nouvelle session
session_start();
setcookie('pseudo', 'Taliesen', time() + 3600, null, null, false, true); // Le cookie sera valable une heure

//On définit des variables de session
$_SESSION['prenom'] = 'Pierre';
$_SESSION['age'] = 29;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cours PHP & MySQL</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cours.css">
</head>

<body>
    <h1>Titre principal</h1>
    <a href="session.php">Lien vers une autre page</a>
    <p>Un paragraphe</p>
</body>

</html>
