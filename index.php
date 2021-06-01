<?php require_once('connection.php');
session_start();  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    
    <title>Accueil </title>
    <link rel="stylesheet" href="loccar_style.css">
    <link rel="stylesheet" href="css/page1.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">

    

    <!-- Bootstrap core CSS -->
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
          <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="Demande.php" class="nav-link px-2 text-white">Demandes</a></li>
          <li><a href="Gérerannonces.php" class="nav-link px-2 text-white">Gérer mes annonces </a></li>
          <?php if (strcmp($_SESSION['monlogin'], "admin")==0) {
                   echo ' <li><a href="" class="nav-link px-2 text-white">Administrer les comptes utilisateurs </a></li>';
                }
                
          ?>
         
          <li><a href="" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method ="post" action="" >
          <table><td><input type="search" class="form-control form-control-dark" name="motcle" placeholder="Search..." aria-label="Search"></td>
          <td><input class="btn btn-outline-light me-2" type="submit" name="btsubmit" value="Rechercher"> </td>
          </table>
          
          
        </form>

        <?php

            
            if ($_SESSION['monlogin']) {
              $users=$_SESSION['monlogin'];
              $requete1="SELECT * from users where login='$users'";
              $result1=mysqli_query($conn,$requete1);
              $ligne1=mysqli_fetch_assoc($result1);

              echo "";
              echo'<div class="flex-shrink-0 dropdown">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="'.$ligne1['image'].'" alt="mdo" width="32" height="32" class="rounded-circle">
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
    
  <?php
        if(isset($_POST['btsubmit'])){
            $mot=$_POST['motcle'];
            
            $requete="SELECT *from logement where titre LIKE BINARY '%$mot%' and status=1 and categorie='offre'" ;   
            $resultat=mysqli_query($conn, $requete);
             

        }
        else{
            $requete="SELECT *from logement  where categorie='offre'";
            $resultat=mysqli_query($conn, $requete);
           } 
           if (mysqli_num_rows($resultat)> 0) {
            
            ?>
 
  <div class="album py-5 bg-light">
         <div class="container">
      
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
             <?php
   while($ligne=mysqli_fetch_assoc($resultat)){
       ?>

            <div class="col">
              
                <div class="card shadow-sm">
                  <a href="afficherannonce.php?idannonce=<?php echo $ligne['id']?>"><?php echo $ligne['titre']?></a>
                  <img src='<?php echo $ligne['image']?>' alt="Image" height="300" width="350"  ><br>
      
                  <div class="card-body">
                    <p class="card-text"><?php echo "Caractéristiques : ".substr($ligne['carac'],0,34)."..."?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                      <a href="afficherannonce.php?idannonce=<?php echo $ligne['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                        
                      </div>
                      <?php 
                      $sql = "SELECT CURDATE() AS dat";
                      $result=mysqli_query($conn,$sql);
                      $li=mysqli_fetch_assoc($result);
                      $date=$li['dat'];
                      $date2=$ligne['date'];
                      $req="SELECT DATEDIFF('$date','$date2') AS nb_jours";
                      $tmp=mysqli_query($conn,$req);
                      $lligne=mysqli_fetch_assoc($tmp);

                      if ($lligne['nb_jours']==0) {
                        echo '<small class="text-muted"> Publié il y a 0 jours  </small>';
                      }
                      else {
                        echo '<small class="text-muted">Publié il y a '.$lligne['nb_jours'].' jours  </small>';
                      }

                      ?>
                      
                    </div>
                  </div>
                </div>
            </div>
              <?php } ?> 


            </div> 
          </div>
  </div>  
  <?php }else {echo "<b>0 results</b>";} ?> 
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</main>
</body>
</html>









































<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil </title>
    <link rel="stylesheet" href="loccar_style.css">
  </head>

  <body>
  <!--  <div id="entete">
        
        
        <video class="video_entete" autoplay="autoplay">
            <source src="images/LOC.mp4" type="video/mp4">
        </video>
        <a href="login.php" class="login">Login</a><br><br>
        <a href="inscription.php" class="login">Sign up</a>
        <p class="nomsite">Location logement</p>
        <div id="formauto">
            <form name="formauto" method ="post" action="">
                <input id="motcle" type="text" name="motcle" placeholder=" Recherche par marque...">
                <input class="btfind" type="submit" name="btsubmit" value="Rechercher"> 
            </form>

         </div>
    </div>-->

    
  </body>
</html>

