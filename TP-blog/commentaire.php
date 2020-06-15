<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP - Blog</title>
</head>
<body>
    <form action="formComment.php" method="post">
        <input type="text" name="auteur" >
        <textarea name="commentaire"  cols="30" rows="10"></textarea>
        <input type="hidden" name="id_post" value="<?php echo $_GET['id'] ?>">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>



