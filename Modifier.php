<?php require_once('connection.php')?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tableau</title>
        <link rel="stylesheet" href="css/test.css" >
        </head>
    <body>
    <div id="container">
        <form name="formupda" method="POST" class="formulaire" enctype="multipart/form-data">
        <h2 align="center">Mettre à jour une annonce</h2>

            <label><b>Titre :</b></label>      
            <input type="text" name="txttr"  placeholder="Entrer la titre de l'offre" required>
            
            <label><b>Localisation :</b></label>      
            <input type="text" name="txtAdr"  placeholder="Entrer la localisation du bien" required>

            <label><b>Prix :</b></label>      
            <input type="number" name="txtPrix"  placeholder="Entrer le prix" required>

            <label><b>Image :</b></label>      
            <input type="file" name="txtIma"  placeholder="Choisir une image" required>

            <fieldset>
                <legend><b>Caractéristiques :</b></legend>
                <table>
                <tr>
                <td><input type="number" name="ncham"  placeholder="Nombre de chambre" required ></td>
                <td><input type="number" name="nsalon"  placeholder="Nombre de salon" required ></td>
                </tr>
                <tr>
                <td><input type="number" name="nsabain"  placeholder="Nombre de salle de bain" required ></td>
                <td><input type="number" name="surface"  placeholder="Surface en m²" required ></td>
                </tr>
                <tr>
                <td >Autres</td>
                <td>
                    <input type="checkbox" name="garage" value="Garage">Garage
              
                    <input type="checkbox" name="jardin" value="Jardin">Jardin
               
                    
                </td>
            </tr>
                </table>
            </fieldset>    
            
            

            <label><b>Type :</b></label>      
                <input type="radio" name="txtTyp" value="À vendre" ><label for="Vente">À vendre</label>
                   
                <input type="radio" name="txtTyp" value="À louer" ><label for="Location">À louer</label>
                <table>   <tr>
                    <td >
                        <input type="submit" name="btmod" value="Mettre à jour" id="submit">
                    </td>
                    <td >
                        <input type="reset"  name="btmodreset" value="Annuler">
                    </td>
                </tr>
            </table>
</div>
<?php
ini_set('display_errors', 'off');
if (isset($_POST['btmod'])) {
    $modifier=$_GET['modifanon'];
    
    $adr=$_POST['txtAdr'];
    $titre=$_POST['txttr'];   
    $prix=$_POST['txtPrix'];
    $ima=$_FILES['txtIma']['tmp_name'];
    $target="images/".$_FILES['txtIma']['name'];
    move_uploaded_file($ima,$target);
    
    $sql = "SELECT CURDATE() AS dat";
    $result=mysqli_query($conn,$sql);
    $ligne=mysqli_fetch_assoc($result);
    $date=$ligne['dat'];
                   
    $str1=$_POST['ncham'];
    $str2=$_POST['nsalon'];
    $str3=$_POST['nsabain'];   
    $str4=$_POST['surface'];
    $str5=$_POST['garage'];
    $str6=$_POST['jardin'];
    $str="Cette maison possède  $str1 chambres ";
                    if ($str2) {
                        $str=$str.", $str2 salons";
                    }
                    if ($str3) {
                        $str=$str.", $str3 salle de bain";
                    }
                    if ($str4) {
                        $str=$str.", possède une surface de $str4 m²";
                    }
                    if ($str5) {
                        $str=$str.", possède au moins un garage";
                    }
                    if ($str6) {
                        $str=$str.", possède au moins un jardin";
                    }
    $car=$str.".";
    
    $typ=$_POST['txtTyp'];
    
    $requete="UPDATE `logement` SET `titre`='$titre', `adresse`='$adr',`prix`='$prix',`image`='$target',`carac`='$car',`type`='$typ' WHERE id='$modifier'";
    $resultat=mysqli_query($conn,$requete);
    if ($resultat) {
        echo "<font color='green'>La mise à jour a été correctement effectuée</font>";
    }
    else {
        echo "<font color='red'>La mise à jour a échouée</font>";
    }
}
?>
</form>

    </body>

</html>