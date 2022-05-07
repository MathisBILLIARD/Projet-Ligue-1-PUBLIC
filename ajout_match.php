<?php

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

?>