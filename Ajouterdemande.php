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
        <form name="formAdd" action="" method="POST" class="formulaire" enctype="multipart/form-data">
            <h2 align="center">Ajouter une demande</h2>

            
            <label><b>Titre :</b></label>      
            <input type="text" name="txttr"  placeholder="Entrer le titre de la demande" required>
           

            <label><b>Prix :</b></label>      
            <input type="number" name="txtPrix"  placeholder="Entrer le prix" required>


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
                <input type="radio" name="txtTyp" value="À acheter" ><label for="Achat">À acheter</label>
                   
                <input type="radio" name="txtTyp" value="À louer" ><label for="Location">À louer</label>
                <table>   <tr>
                    <td >
                        <input type="submit" name="btadd" value="Ajouter" id="submit">
                    </td>
                    <td >
                        <input type="reset"  name="btaddreset" value="Annuler">
                    </td>
                </tr>
            </table>
            <?php header( 'content-type: text/html; charset=utf-8' ); 
            ini_set('display_errors', 'off');
                if (isset($_POST['btadd'])) {
                    $requete="SELECT * from Logement  ";
                    $sql = "SELECT CURDATE() AS dat";
                    $resultat=mysqli_query($conn,$requete);
                    $result=mysqli_query($conn,$sql);
                    $ligne=mysqli_fetch_assoc($result);
                    $date=$ligne['dat'];
                    
                    $nbr=mysqli_num_rows($resultat);
                    session_start();
                    $matri=$nbr ;
                    $adr=" ";
                    $prix=$_POST['txtPrix'];
                    
                    $target="images/depositphotos_8987777-stock-photo-3d-house.jpg";
                    $str1=$_POST['ncham'];
                    $str2=$_POST['nsalon'];
                    $str3=$_POST['nsabain'];   
                    $str4=$_POST['surface'];
                    $str5=$_POST['garage'];
                    $str6=$_POST['jardin'];
                    $str="Cette maison doit posséder  $str1 chambres ";
                    if ($str2) {
                        $str=$str.", $str2 salons";
                    }
                    if ($str3) {
                        $str=$str.", $str3 salle de bain";
                    }
                    if ($str4) {
                        $str=$str.",  une surface de $str4 m²";
                    }
                    if ($str5) {
                        $str=$str.",  au moins un garage";
                    }
                    if ($str6) {
                        $str=$str.",  au moins un jardin";
                    }
                    $car=$str.".";
                    

                    
                    
                    $typ=$_POST['txtTyp'];
                    $cat="demande";
                    $stat="1";
                    $titre=$_POST['txttr'];
                    $createur= $_SESSION['monlogin'];
                    $requete="INSERT INTO logement (id,titre, adresse, prix,image, carac, type,status,categorie, login_createur,date) VALUES (' $matri' ,' $titre ',' $adr','$prix','$target','$car','$typ','$stat','$cat','$createur','$date')";
                    
                    $resultat=mysqli_query($conn,$requete);
                    if ($resultat) {
                        echo "<font color='green'>Insertion de données faits</font> ";
                    }
                    else {
                        echo "<font color='red'>Echec d'insertion des données</font>";
                    }

                }


            ?>

        
        </form>
</div>



    </body>

</html> 