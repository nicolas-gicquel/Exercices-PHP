<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma petite boutique</title>
</head>
<body>
    <form action="form-products.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" />
        <input type="number" name="price" />
        <textarea name="description" cols="30" rows="10"></textarea>
        <input type="text" name="category" />
        <input type="file" name="fileToUpload" id="fileToUpload" />
        <input type="submit" name="submit">
    </form>
</body>
</html>