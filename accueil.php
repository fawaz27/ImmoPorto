<?php require_once('connection.php')?>
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
          <li><a href="Demande.php" class="nav-link px-2 text-secondary">Demandes</a></li>
          <li><a href="accueil.php" class="nav-link px-2 text-white">Gérer mes annonces </a></li>
          <li><a href="" class="nav-link px-2 text-white">Administrer les comptes utilisateurs </a></li>
          <li><a href="" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method ="post" action="" >
          <table><td><input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search"></td>
          <td><input class="btn btn-outline-light me-2" type="submit" name="btsubmit" value="Rechercher"> </td>
          </table>
          
          
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
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
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








        <div id="globl">
            <div id="profil">
            <?php

            session_start(); 
            if ($_SESSION['monlogin']) {
            echo "Bonjour et Bienvenue ".$_SESSION['monlogin']."<br>";
            $requete="SELECT *from users where login='".$_SESSION['monlogin']."' ";
            $resultat=mysqli_query($conn,$requete);
            $ligne=mysqli_fetch_assoc($resultat);
            }

            else {
                header('location:login.php');
            }
            ?>
            <br>
            <a href="modifierprofil.php">Modifier profil</a><br>
            <a href="deconnecter.php">Deconnection</a>



            </div>  
            <div id="tableaubord">

               
                
            </div>
           
        
        </div>
    </body>
</html>