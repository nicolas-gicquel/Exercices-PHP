<?php
if (!empty($_GET)) {
    $nb1 = $_GET['nb1'];
    $nb2 = $_GET['nb2'];
    $signe = $_GET['signe'];
    if (!empty($_GET['signe'])) {
        switch ($signe) {
            case '+':
                $result = intval($nb1) + intval($nb2);
                break;

            case '-':
                $result = intval($nb1) - intval($nb2);
                break;

            case '*':
                $result = intval($nb1) * intval($nb2);
                break;



            default:
                $result = intval($nb1) / intval($nb2);
                break;
        }
    }
};
?>


<form action="calculatrice.php" method="get">
    <input type="text" name="nb1" id="nb1">
    <select name="signe" id="signe">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="nb2" id="nb1">

    <input type="submit" value="Calculer">
    <div class="result">
        <p>
            <?php
            if (!empty($_GET)) {
                echo "Le résultat de $nb1$signe$nb2 = $result";
            }

            ?>
        </p>
    </div>
</form>