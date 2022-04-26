<?php
    //Démarrer la session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>inscription</title>
        <meta charset="utf-8" />
    </head>

    <?php

            require 'connexion.php';

            $emailError = $mdpError = $ErrorConnexion =  $RetourRequete = "";

            if(isset($_POST['Envoyer'])){

                if(empty($_POST['email'])){
                    $emailError = 'Veuillez saisir une adresse mail';
                }
                else if(empty($_POST['mdp'])){
                    $mdpError = ' Veuillez saisir un mot de passe ';
                }
                else {

                    $email = $_POST['email'];
                    $mdp = $_POST['mdp'];
                    echo "$mdp";
                    $requete ="SELECT * FROM utilisateurs WHERE Email = '$email' AND Psswd = '$mdp'";
	
					$resultat = mysqli_query($connexion, $requete); //Executer la requete
				
					//si il y a un résultat, mysqli_num_rows() renvoie 1
                    //si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat, donc identifiants incorrect
                    if(!mysqli_num_rows($resultat)) {
                        $RetourRequete = "Email ou le mot de passe est incorrect";
                    } 
                    else {
                        //on ouvre la session avec $_SESSION:
                        //la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                        $rows = mysqli_fetch_assoc($resultat);
                        $role = $rows['Role'];
                        
                        echo "</br> $role";
                        $_SESSION['role'] = $role;
                        if($_SESSION['role'] == "Admin"){
                            header("Location:admin.php");
                        }
                        else if($_SESSION['role'] == 'Client'){
                            header("Location:acceuil.php");
                        }
                    }
                }
            }
    ?>

    <body>
        
        <form method="POST">
        
         
                    
            <label for="email">Email : </label>
            <input type="text" id="email" name="email"><?php echo $emailError; ?><br/>
    
                            
            <label for="prenom">Mot de passe : </label>
            <input type="text" id="mdp" name="mdp"><?php echo $mdpError;  ?><br/>
            
            <?php echo $RetourRequete;  ?>
            </br>
            <input Type="submit" name="Envoyer" value="Envoyer">
                    
        </form>
        
                
        
    </body>
</html>