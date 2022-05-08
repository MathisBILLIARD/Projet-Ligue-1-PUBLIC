<?php
    //Démarrer la session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>connexion</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="connexion_form.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

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

        <!-- image (logo) -->
        <a href="index.php"><img class="logo" src="bidoobet.png" alt=""></a>
        
        <form method="POST">


        
                <h1>Connexion</h1>


                <?php echo "<p>".$emailError."</p>"; ?><input class="saisie" type="text" id="email" name="email" placeholder="Votre adresse Email">
        
                                

                <?php echo "<p>".$mdpError."</p>";  ?><input class="saisie" type="text" id="mdp" name="mdp" placeholder="Votre mot de passe" >
                
                <?php echo "<p>".$RetourRequete."</p>";  ?>
        
                <input class="send" Type="submit" name="Envoyer" value="Envoyer">

                    
                    
        </form>
        
                
        
    </body>
</html>