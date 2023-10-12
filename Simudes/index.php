<?php
require 'header.php';
?>

<?php
// if (!empty($_POST)) {
//     $result = $_POST['result'];
// };

if ($_POST) {
    $nbdes = $_POST['nbdes'];
} else {
    $nbdes = 0;
}

if ($_GET) {
    $faces = $_GET['faces'];
    for ($i = 0; $i < $nbdes; $i++) {
        $results[] = rand(1, $faces);
    }
} else {
    $faces = 6;
}




?>
<main>
    <h1>Tirage de dé à <?= $faces ?> faces</h1>
    <div class="results">


        <!----------------------- Avec un dé -------------------------->

        <!-- <div class="circleCenter">
<?php

if (!empty($_POST)) { ?>
        <div class='total'>
            <span><?=$result ?></span>
        </div>
<?php
};
?>
</div> -->

        <!----------------------- Avec un ou plusieurs dés -------------------------->
        <?php
        for ($i = 0; $i < $nbdes; $i++) {

        ?>

            <div class="circleCenter">
                <?php

                if (!empty($_POST)) { ?>
                    <div class='total'>
                        <span><?= $results[$i] ?></span>
                    </div>
                <?php
                };
                ?>
            </div>

        <?php
        };
        ?>




    </div>
    <form action="index.php?faces=<?php echo $faces ?>" method="post">
        <label class="txt-center" for="select">choisissez le nombre de dés</label>
        <select class="form-control rounded-1" id="select" name="nbdes">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
        </select>
        <!-- <input type="hidden" name="result" value="<?php echo rand(1, $faces) ?>"> -->
        <input class="submit btn shadow-1 rounded-1 large primary uppercase" type="submit" value="Lancer le dé">
    </form>

</main>



