<?php require_once('connection.php')?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tableau</title>
        <link rel="stylesheet" href="css/style.css" >
        </head>
    <body>
        <form name="formsup" class="formulaire" >
<?php
if (isset($_GET['fermeranon'])) {
    $fermer=$_GET['fermeranon'];
    
    $requete="SELECT * from Logement where id=$fermer ";
    $resultat=mysqli_query($conn,$requete);
    $ligne=mysqli_fetch_assoc($resultat);
    if ($ligne['status']) {
         $sql="UPDATE `logement` SET `status`=0 WHERE id='$fermer'";
    $resultat=mysqli_query($conn,$sql);
    if ($resultat) {
        echo "<font color='green'>L'annonce a été correctement fermée</font>";
    }
    else {
        echo "<font color='red'>La fermerture a échouée</font>";
    }
    }
    else {
        $sql="UPDATE `logement` SET `status`=1 WHERE id='$fermer'";
        $resultat=mysqli_query($conn,$sql);
        if ($resultat) {
            echo "<font color='green'>L'annonce a été correctement ouverte</font>";
            
        }
        else {
            echo "<font color='red'>L'ouverture a échouée</font>";
        }
    }
    
    
   
}




?>

</form>

</body>

</html>