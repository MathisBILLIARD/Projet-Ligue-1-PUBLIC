<?php 

	session_start(); //Démarrer la session
	if($_SESSION['role']=='Admin' || $_SESSION['role']=='Client'){ // si l'utilisateur est authentifié (client ou admin) alors on affiche la page
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>inscription</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="prono_match.css">
        </head>

        <body>

        <header>

        </header>
        
        <main>  
        <?php

        
            require 'connexion.php';
                
            $prono = $_SESSION['prono'];
            echo $prono;
            $id = $_SESSION['id'];
            
            /*
            $requete ="INSERT INTO prono_utilisateurs VALUES(NULL, '$nom', '$prenom', '$email', '$naissance')";

            $resultat = mysqli_query($connexion, $requete); //Executer la requete
                    
                if ( $resultat == FALSE ){  
                    echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                    die();
                }
                
            mysqli_close($connexion);

            header("Location:TP4.php");//Redirection vers la page TP4.php 
            */


        ?>
        </main>

        <footer>

        </footer>

    </body>
</html>	

<?php 

}
else{ //SINON : si l'utilisateur n'es pas authentifié => redirection vers la page d'authentification TP5.php
    header("Location:connexion_form.php");
}
?>