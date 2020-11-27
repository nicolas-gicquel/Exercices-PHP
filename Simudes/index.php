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

if (!empty($_POST)) { ?>
        <div class='total'>
            <span><?php echo $result ?></span>
        </div>
<?php
    };
?>
</div>

</div>
<form action="index.php?faces=<?php echo $faces ?>" method="post">
<!-- <label class="txt-center" for="select">choisissez le nombre de dés</label>
    <select class="form-control rounded-1" id="select">
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </select> -->
    <input type="hidden" name="result" value="<?php echo rand(1,$faces)?>">
    <input class="submit btn shadow-1 rounded-1 large primary uppercase" type="submit" value="Lancer le dé">
</form>

</main>

<?php
    require 'footer.php';
?>

