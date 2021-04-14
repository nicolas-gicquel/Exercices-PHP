<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma petite boutique</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
  <nav>
    <div class="nav-wrapper">
    <a href="index.php" class="brand-logo"><img class="logo" src='public/uploads/logo.png' /></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php if (isset($_SESSION['pseudo'])) {?>
        <li class='hello'>Bonjour <?php echo $_SESSION['pseudo']?></h4></li>
        <li><a href="index.php">Ma petite boutique</a></li>
        <li><a href="admin.php">Administration</a></li>
        <li><a href="logout.php">Déconnexion</a></li>
        <?php }else { ?>
            <li><a href="index.php">Ma petite boutique</a></li>
        <li><a href="login.php">Connexion</a></li>
        <?php } ?>
        
      </ul>
    </div>
  </nav>