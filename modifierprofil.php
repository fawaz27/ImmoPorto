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
    <form action="modifierprofil_traitement.php" method="post">
                <h1 align="center">Modifier profil</h1>       
                <?php
                session_start();
                $user= $_SESSION['monlogin'];  
                $requete="SELECT *from users WHERE login='$user'"; 
                $resultat=mysqli_query($conn,$requete);
                
                if ($ligne=mysqli_fetch_assoc($resultat)) {
                    $pseudo = $ligne['login'];
                    $email = $ligne['email'];
                    $password = $ligne['password'];
                    $ima=$ligne['image'];
                    $nom=$ligne['nom'];
                    $prenom=$ligne['prenom'];
                    $tel=$ligne['telephone'];
                }
                ?>
                <div class="displayed" align="center" >
                    
                    <img class="imag" src="<?php echo $ima ?>"    height="200px"  >     
                    <br>
                    
                    </div>
                <div>
                    <label><b>Nom d'utilisateur :</b></label>
                    <input type="text" name="pseudo"  value="<?php echo $pseudo ?>" required="required" autocomplete="off">
                </div>
                <div >
                <label><b>Nom  :</b></label>
                    <input type="text" name="nom" value="<?php echo $nom ?>" required="required" autocomplete="off">
                </div>
                <div >
                <label><b>Prénom :</b></label>
                    <input type="text" name="prenom"  value="<?php echo $prenom ?>" required="required" autocomplete="off">
                </div>
                <div >
                <label><b>Email :</b></label>
                    <input type="email" name="email"  value="<?php echo $email ?>" required="required" autocomplete="off">
                </div>
                <div >
                <label><b>Mot de passe :</b></label>
                    <input type="password" name="password"  value="<?php echo $password ?>" required="required" autocomplete="off">
                </div>
                <div >
                <label><b>Re-tapez le mot de passe:</b></label>
                    <input type="password" name="password_retype"  value="<?php echo $password ?>" required="required" autocomplete="off">
                </div>
                <div >
                <label><b>Téléphone :</b></label>
                    <input type="tel" name="tel"  value="<?php echo $tel ?>" required="required" autocomplete="off" >
                </div>
                <div>
                
                <div >
                <input type="submit" name="btadd" value="Modifier" id="submit">
                </div>   
          
</div>
<?php

if(isset($_GET['reg_err'])) {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Modification réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;
                        case 'sql':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur sql </strong> 
                                </div>
                            <?php
                            break;
                        case 'email_already':
                                ?>
                                    <div class="alert alert-danger">
                                    <strong>Erreur</strong> email existe déjà
                                    </div>
                                <?php
                            break;
                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }


                
?>





</form>

    </body>

</html>