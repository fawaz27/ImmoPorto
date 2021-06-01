<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link rel="stylesheet" href="css/test.css" type="text/css">
            <title>Connexion</title>
        </head>
        <body>
        <div id="container">
            
            
            <form action="inscription_traitement.php" method="post" enctype="multipart/form-data">
                <h1 align="center">Inscription</h1>   
            
            
               
                
                <div >
                    <input type="text" name="pseudo"  placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div >
                    <input type="text" name="nom"  placeholder="Nom" required="required" autocomplete="off">
                </div>
                <div >
                    <input type="text" name="prenom"  placeholder="Prénom" required="required" autocomplete="off">
                </div>
                <div >
                    <input type="email" name="email"  placeholder="Email" required="required" autocomplete="off">
                </div>
                <div >
                    <input type="password" name="password"  placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div >
                    <input type="password" name="password_retype"  placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div >
                    <input type="tel" name="tel"  placeholder="Numéro de téléphone" required="required" autocomplete="off" >
                </div>
                <div>
                <label>Photo de profil</label>
                <input type="file" name="txtIma"  placeholder="Choisir une image" required> 
                </div>   
                <div >
                <input type="submit" name="btadd" value="S'inscrire" id="submit">
                </div>   
            
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
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
        </div>
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
        </form>
        </body>
</html>