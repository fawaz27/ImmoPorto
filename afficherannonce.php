<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil </title>
    <link rel="stylesheet" href="test.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>


<?php
require_once('connection.php');
$id=$_GET['idannonce'];

 $requete="SELECT *from logement  WHERE id='$id'";
 $resultat=mysqli_query($conn, $requete);
  
 $ligne=mysqli_fetch_assoc($resultat);
?>
<div id="conta">
  <div class="album py-5 bg-light">
      <div class="container">
      
        
          <div class="col">
              
              <div class="card shadow-sm">
                <?php echo $ligne['titre']."."?>
                <img src='<?php echo $ligne['image']?>' alt="Image" height="auto" width="auto"  ><br>
    
                <div class="card-body">
                  <p class="card-text">
                     <?php echo "<h1>Publier par  ".$ligne['login_createur'].".</h1>";$log=$ligne['login_createur'];?><br>
                    <?php echo "<h3>Caractéristiques :<h3>"?>
                    <?php echo "<h5>".$ligne['carac']." <h5>"?><br>
                    <?php echo "<h3>Prix : ".$ligne['prix']." FCFA/par mois<h3>"?><br>
                    <?php echo "<h3>Contact :".$ligne['telephone']."</h3>"?>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                   
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
                     

                      ?>
                    <small class="text-muted">Publié il y a <?php echo $lligne['nb_jours'] ?> jours </small>
                  </div>
                </div>
              </div>
          



        </div> 
       </div>
  </div>  

</div>















</body>

</html>