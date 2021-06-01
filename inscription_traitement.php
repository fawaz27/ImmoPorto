<?php 
    require_once('connection.php'); // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $nom=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $tel=($_POST['tel']);
        // On vérifie si l'utilisateur existe
        $requete="SELECT * FROM users WHERE login ='$pseudo'";
        $reqs="SELECT * FROM users WHERE email ='$email'";
        
        $resultat=mysqli_query($conn,$requete);
        $set=mysqli_query($conn,$reqs);
        $row=mysqli_num_rows($resultat);
        $ligne=mysqli_num_rows($set);
        $ima=$_FILES['txtIma']['tmp_name'];
        $target="images/profils/".$_FILES['txtIma']['name'];
        move_uploaded_file($ima,$target);

        
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if ($ligne==0){
                if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            $sql="INSERT INTO `users`(`login`, `nom`, `prenom`, `password`, `email`, `telephone`, `image`) VALUES ('$pseudo','$nom','$prenom','$password','$email','$tel','$target')";
                            $res=mysqli_query($conn,$sql);
                            if ($resultat) {
                                echo "<font color='green'>Insertion de données faits</font> "; 
                                header('Location:inscription.php?reg_err=success');
                            }
                            else {
                                echo " ". mysqli_error($conn);
                                header('Location:inscription.php?reg_err=sql');
                                echo "<font color='red'>Echec d'insertion des données</font>";
                            }
                            // On redirige avec le message de succès
                           
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
                }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
            }else{ header('Location: inscription.php?reg_err=email_already'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }
