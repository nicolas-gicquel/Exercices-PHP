<?php
    require 'header.php';
?>

<?php
    if (!empty($_POST)) {
        $result = $_POST['result'];
    };

    if (!empty($_GET)){
        $faces = $_GET['faces'];
    }else{
        $faces = 6;
    }
    
?>
<main>
<h1>Tirage de dé à <?php echo $faces ?> faces</h1>
<div class="results">
    
<div class="circleCenter">
<?php

if ($_POST) { ?>
        <div class='total'>
            <span><?=  $result ?></span>
        </div>
<?php
    };
?>
</div>

</div>
<form action="index.php?faces=<?php echo $faces ?>" method="post">
    <input class="submit btn shadow-1 rounded-1 large primary uppercase" type="submit" value="Lancer le dé">
</form>

</main>



