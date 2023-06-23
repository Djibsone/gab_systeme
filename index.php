<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if (isset($_SESSION['message'])) 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    <br><br>
    <form action="./traitement.php" method="post">
        <div class="form-controler">
            <label for="">Numéros compte</label>
            <input type="text" name="numero">
        </div><br>
        <div class="form-controler">
            <label for="">Montant</label>
            <input type="text" name="montant">
        </div><br>
        <div class="form-controler">
            <label for="">Numéros compte versement</label>
            <input type="text" name="versement">
        </div><br>
        <button type="submit" name="ok">Transferer</button>
    </form>
</body>
</html>