<?php require_once('connection.php');
 session_start();
 $users= $_SESSION['monlogin'];
 if (!$_SESSION['monlogin']){
 
  header('location:login.php');
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">
        <link rel="stylesheet" href="page1.css" type="text/css">
        <link rel="stylesheet" href="css/gestion.css" type="text/css">
       <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
     
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">

    </head>
    <body>

    <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        
        <a href="" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="Demande.php" class="nav-link px-2 text-white">Demandes</a></li>
          <li><a href="Gérerannonces.php" class="nav-link px-2 text-secondary">Gérer mes annonces </a></li>
          <?php if (strcmp($_SESSION['monlogin'], "admin")==0) {
                   echo ' <li><a href="" class="nav-link px-2 text-white">Administrer les comptes utilisateurs </a></li>';
                }
                
          ?>
         
          <li><a href="" class="nav-link px-2 text-white">About</a></li>
        </ul>

        
          
          
        </form>
        <?php

            session_start(); 
            if ($_SESSION['monlogin']) {
              echo "";
              echo'<div class="flex-shrink-0 dropdown">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="images/Bleach2020_10_26_16_57_28.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              '.$_SESSION['monlogin'].'
              <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
              <li><a class="dropdown-item" href="modifierprofil.php">Edit Profile</a></li> 
              <li><a class="dropdown-item" href="deconnecter.php">Sign out</a></li>
              </ul>
            </div>' ;
            }else { 
              echo '<div class="text-end">
          <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
          <a  href="inscription.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
        </div>
         ';
         }?>

        
      </div>

    </div>
  </header>

<main>


<div class="container">
<p><h4><b>Listes annonces </b></h4>
<?php
        $requete="SELECT * from Logement where categorie='offre' and login_createur='$users' ";
        $resultat=mysqli_query($conn,$requete);
         
        $nbr=mysqli_num_rows($resultat);
        echo "<p> Total <b>".$nbr."</b> annonces ...";


    ?></p>
    <p> <a href="Ajouter.php"><img src="images/61183.png"  width="50px" height="50px"> </a><br><b>Ajouter</b></p>
  <div class="row">
    <div class="col-12">
		<table class="table table-image table-bordered ">
		  <thead>
		    <tr>
            <th background-color="#e66262">id</th>
            <th>Titre</th>
            <th>Localisation</th>
            <th>prix</th>
            <th>Image</th>
            <th>Date</th>
            <th>Type</th>
            
            <th>Caractéristiques</th>
            <th>Modifier</th>
            
            <th>Activer/<br>Désactiver</th>
            <th>Supprimer</th>
		    </tr>
		  </thead>
		  <tbody>
          <?php
    while($ligne=mysqli_fetch_assoc($resultat)){
        ?>
		<tr>
		    <th scope="row"><?php echo $ligne['id']?></th>
            <td><?php echo $ligne['titre']?></td>
            <td><?php echo $ligne['adresse']?></td>
            <td><?php echo $ligne['prix']?></td>
		    <td class="w-25">
			      <img src="<?php echo $ligne['image']?> "class="img-fluid img-thumbnail" alt="Sheep">
		    </td>
            <td><?php echo $ligne['date']?></td>
            
            <td><?php echo $ligne['type']?></td>
            <td><?php echo $ligne['carac']?></td>
            <td class="w-25">
            <a href="Modifier.php?modifanon=<?php echo $ligne['id']?>"><img src="images/pngtree-black-edit-icon-png-image_4422168.jpg" width="100px" height="100px" alt="Sheep"></a>
		    </td>
            <td class="w-25">
                <?php 
            if ($ligne['status']) {
                echo '<a href="activation.php?fermeranon='.$ligne['id'].'"><img src="images/images.jpg" width="100px" height="100px"  ></a>' ;
            }
            else {
                echo '<a href="activation.php?fermeranon='.$ligne['id'].'"><img src="images/téléchargement (1).png" width="100px" height="100px" ></a>' ;
            }
            ?>
		    </td>
            <td class="w-25">
            <a href="Supprimerdemande.php?suprimanno=<?php echo $ligne['id']?>"><img src="images/téléchargement.png" width="100px" height="100px" alt="Sheep"></a>
		    </td>
		</tr>
            <?php }?>  
		  </tbody>
		</table>   
    </div>
  </div>
</div>


<div class="container">
<p><h4><b>Listes demandes </b></h4>
<?php
        $requete="SELECT * from Logement where categorie='demande' and login_createur='$users' ";
        $resultat=mysqli_query($conn,$requete);
         
        $nbr=mysqli_num_rows($resultat);
        echo "<p> Total <b>".$nbr."</b> annonces ...";


    ?></p>
    <p> <a href="Ajouterdemande.php"><img src="images/61183.png"  width="50px" height="50px"> </a><br><b>Ajouter</b></p>
  <div class="row">
    <div class="col-12">
		<table class="table table-image table-bordered ">
		  <thead>
		    <tr>
            <th background-color="#e66262">id</th>
            <th>Titre</th>
            
            <th>prix</th>
            
            <th>Date</th>
            <th>Type</th>
            
            <th>Caractéristiques</th>
            <th>Modifier</th>
            
            <th>Activer/<br>Désactiver</th>
            <th>Supprimer</th>
		    </tr>
		  </thead>
		  <tbody>
          <?php
    while($ligne=mysqli_fetch_assoc($resultat)){
        ?>
		<tr>
		    <th scope="row"><?php echo $ligne['id']?></th>
            <td><?php echo $ligne['titre']?></td>
            
            <td><?php echo $ligne['prix']?></td>
		   
            <td><?php echo $ligne['date']?></td>
            
            <td><?php echo $ligne['type']?></td>
            <td><?php echo $ligne['carac']?></td>
            <td class="w-25">
            <a href="Modifierdemande.php?modifanon=<?php echo $ligne['id']?>"><img src="images/pngtree-black-edit-icon-png-image_4422168.jpg" width="100px" height="100px" alt="Sheep"></a>
		    </td>
            <td class="w-25">
                <?php 
            if ($ligne['status']) {
                echo '<a href="activation.php?fermeranon='.$ligne['id'].'"><img src="images/images.jpg" width="100px" height="100px"  ></a>' ;
            }
            else {
                echo '<a href="activation.php?fermeranon='.$ligne['id'].'"><img src="images/téléchargement (1).png" width="100px" height="100px" ></a>' ;
            }
            ?>
		    </td>
            <td class="w-25">
            <a href="Supprimerdemande.php?suprimanno=<?php echo $ligne['id']?>"><img src="images/téléchargement.png" width="100px" height="100px" alt="Sheep"></a>
		    </td>
		</tr>
            <?php }?>  
		  </tbody>
		</table>   
    </div>
  </div>
</div>

<script src="assets/dist/js/bootstrap.bundle.min.js"></script>



</main>






        
           
        
        
    </body>
</html>