<?php require_once('connection.php');
 session_start();
 $users= $_SESSION['monlogin'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tableau</title>
        <link rel="stylesheet" href="css/gestion.css" type="text/css">
        <style>
           .myphoto {
     width: 130px;
     height: 100px;
     border-radius: 5px;
     border: 1px solid;
    }
    </style>
    </head>
    <body>
    <p><h1><b>Listes annonces </b></h1>

    <?php
        $requete="SELECT * from Logement where categorie='offre' and login_createur='$users' ";
        $resultat=mysqli_query($conn,$requete);

        $nbr=mysqli_num_rows($resultat);
        echo "<p> Total <b>".$nbr."</b> annonces ...";


    ?></p>
    <p> <a href="Ajouter.php"><img src="images/61183.png"  width="50px" height="50px"> </a><br><b>Ajouter</b></p>
    
<table width="100%" border="1px" class="tableaustyle">
        <tr>
            <th>id</th>
            <th>Titre</th>
            <th>Adresse</th>
            <th>prix</th>
            <th>Image</th>
            <th>Département</th>
            <th>Type</th>
            
            <th>Caractéristiques</th>
            <th>Modifier</th>
            
            <th>Activer/<br>Désactiver</th>
            <th>Supprimer</th>
    </tr>
    <?php
    while($ligne=mysqli_fetch_assoc($resultat)){
        ?>
        <tr>
            <td><?php echo $ligne['id']?></td>
            <td><?php echo $ligne['titre']?></td>
            <td><?php echo $ligne['adresse']?></td>
            <td><?php echo $ligne['prix']?></td>
            
            <td><img src='<?php echo $ligne['image']?>' class="myphoto"></td>
            <td><?php echo $ligne['departement']?></td>
            <td><?php echo $ligne['type']?></td>
            <td><?php echo $ligne['carac']?></td>
            <td><a href="Modifier.php?modifanon=<?php echo $ligne['id']?>"><img src='images/pngtree-black-edit-icon-png-image_4422168.jpg'  width="50px" height="50px"></td>
            <td><?php 
            if ($ligne['status']) {
                echo '<a href="activation.php?fermeranon='.$ligne['id'].'"><img src="images/images.jpg"  width="50px" height="50px">' ;
            }
            else {
                echo '<a href="activation.php?fermeranon='.$ligne['id'].'"><img src="images/téléchargement (1).png"  width="50px" height="50px">' ;
            }
            ?>
            </td>
            <td><a href="Supprimer.php?suprimanno=<?php echo $ligne['id']?>"><img src='images/téléchargement.png'  width="50px" height="50px"></td>
            
        </tr>
    
<?php }?>
</table>
<br>
<br>
<br>
<br>
<p><h1><b>Listes demandes </b></h1>

    <?php
       
        
        $requete="SELECT * from Logement where categorie='demande' and login_createur='$users' ";
        $resultat=mysqli_query($conn,$requete);

        $nbr=mysqli_num_rows($resultat);
        echo "<p> Total <b>".$nbr."</b> annonces ...";


    ?></p>
    <p> <a href="Ajouterdemande.php"><img src="images/61183.png"  width="50px" height="50px"> </a><br><b>Ajouter</b></p>
    
<table width="100%" border="1px" class="tableaustyle">
        <tr>
            <th>id</th>
            
            <th>prix</th>
            
            <th>departement</th>
            <th>Type</th>
            
            <th>Caractéristiques</th>
            <th>Modifier</th>
            <th>Activer/<br>Désactiver</th>
            <th>Supprimer</th>
    </tr>
    <?php
    while($ligne=mysqli_fetch_assoc($resultat)){
        ?>
        <tr>
            <td><?php echo $ligne['id']?></td>
           
            <td><?php echo $ligne['prix']?></td>
            <td><?php echo $ligne['departement']?></td>
            <td><?php echo $ligne['type']?></td>

            <td><?php echo $ligne['carac']?></td>
            <td><a href="Modifierdemande.php?modifanon=<?php echo $ligne['id']?>"><img src='images/pngtree-black-edit-icon-png-image_4422168.jpg'  width="50px" height="50px"></td>
            <td><?php 
            if ($ligne['status']) {
                echo '<a href="activation.php?fermeranon='.$ligne['id'].'"><img src="images/images.jpg"  width="50px" height="50px">' ;
            }
            else {
                echo '<a href="activation.php?fermeranon='.$ligne['id'].'"><img src="images/téléchargement (1).png"  width="50px" height="50px">' ;
            }
            ?>
            </td>
            <td><a href="Supprimerdemande.php?suprimanno=<?php echo $ligne['id']?>"><img src='images/téléchargement.png'  width="50px" height="50px"></td>
        </tr>
    
<?php }?>
</table>
</body>

</html>