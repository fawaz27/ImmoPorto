<?php require_once('connection.php')?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Suppression demande</title>
        <link rel="stylesheet" href="css/style.css" >
        </head>
    <body>
        <form name="formsup" class="formulaire">

<?php

if (isset($_GET['suprimanno'])) {
    $sup=$_GET['suprimanno'];
    $requete="DELETE FROM `logement` WHERE `logement`.`id` ='$sup'";
    $resultat=mysqli_query($conn,$requete);
    if ($resultat) {
        echo "<font color='green'>La supression a été correctement effectuée</font>";
    }
    else {
        echo "<font color='red'>La supression a échouée</font>";
    }
}
?>
</form>

    </body>

</html>