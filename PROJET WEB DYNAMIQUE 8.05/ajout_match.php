<?php
    session_start(); //Démarrer la session
	if($_SESSION['role']=='Admin'){ // si l'utilisateur est authentifié (client ou admin) alors on affiche la page


        if(isset($_POST['Ajouter'])){

            require 'connexion.php';
            $equipeD = $_POST['equipeD'];
            $equipeE = $_POST['equipeE'];
            $coteD = $_POST['coteD'];
            $coteE = $_POST['coteE'];
            $coteN = $_POST['coteN'];
            $dateMatch = $_POST['dateMatch'];
            $heure = $_POST['heure']; 

            $requete ="INSERT INTO matchs VALUES(NULL, '$equipeD', '$equipeE', '$coteD', '$coteE', '$coteN', NULL, '$dateMatch', '$heure')";

            $resultat = mysqli_query($connexion, $requete); //Executer la requete
                
                if ( $resultat == FALSE ){  
                    echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                    die();
                }
            
            mysqli_close($connexion);

            header("Location:admin.php");//Redirection vers la page admin.php 

        }
}
elseif ($_SESSION['role']=='Client') {
    header("Location:acceuil.php");
}
else{ //SINON : si l'utilisateur n'es pas authentifié => redirection vers la page d'authentification TP5.php
    header("Location:connexion_form.php");
}
    ?>
    
?>