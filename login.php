<?php require_once('connection.php')?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Authentification</title>
        <link rel="stylesheet" href="css/test.css" type="text/css">
    </head>
    <body>

    <div id="container">
        <form action="" method="POST" class="formulaire">
            <h1>Connection</h1>
            
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="txtlogin" required="required" autocomplete="off" class="zonetext">

            
            <input type="password" placeholder="Entrer le mot de passe" name="txtpw" required="required" autocomplete="off" class="zonetext">
            <input type="submit" name="btlogin" value="Se connecter" id="submit" class="submit">
            
            <?php
            if (isset($_POST['btlogin'])) {
                
                $requete="SELECT * from users where login='".$_POST['txtlogin']."' and password='".$_POST['txtpw']."'";
               
               
               if($resultat=mysqli_query($conn,$requete)) {
                   
                   $ligne=mysqli_fetch_assoc($resultat);
                   
                   if($ligne!=0){
                       
                       session_start();
                       $_SESSION['monlogin']=$_POST['txtlogin'];
                       header("location:index.php");
                      
                   }
                   else{
                    
                        echo "<font color='red'>Login ou mot de passe est invalide </font> ";
                }
               } 
            }
            ?>
        </form>

    </div>
    </body>
</html>
