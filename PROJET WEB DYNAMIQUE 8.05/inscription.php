<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>inscription</title>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="inscription.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">


    </head>

    <?php
            require 'connexion.php';

            $nomError = $prenomError = $emailError = $numTelError = $dateError = $mdpError = $mdp_confirmError = "";
            $mail_valid = $mdp_valid = $mdp_confirm_valid = $same_mdp = "";
            $globalError = 0;

            function verificationEmail($chaine){
				$pattern = '/^[a-zA-Z0-9.-]+@[a-zA-Z.]/';
				return preg_match($pattern,$chaine);
			}

			function verificationPassword($chaine){

				$test_string = is_string($chaine);
                $majuscule = preg_match('/[A-Z]/', $chaine);
                $minuscule = preg_match('/[a-z]/', $chaine);
                $chiffre = preg_match('/[0-9]/', $chaine);
                    
                if(!$majuscule || !$minuscule || !$chiffre || strlen($chaine) < 8 || !$test_string){
                    return false;
                }
                else 
                    return true;
			}

			function same_mdp($mdp, $confirm_mdp){
				if($mdp == $confirm_mdp){
					return true;
				}
				else {
					return false;
				}

			}


            if(isset($_POST['Envoyer'])){

                if(empty($_POST['nom'])){
					$nomError = " Le nom est requis ";
                    $globalError = 1;
				}
				else{
					$nom = $_POST["nom"];
				}
                
                if(empty($_POST['prenom'])){
					$prenomError = " Le prénom est requis ";
                    $globalError = 1;
				}
				else{
					$prenom = $_POST["prenom"];
				}

				if(empty($_POST["email"])){
					$emailError = " L'email est requis";
                    $globalError = 1;
				}
				else{
					$email = $_POST["email"];
					$verif_mail=verificationEmail($email);
					if(!$verif_mail){
						$mail_valid = "Veuillez rentrer une adresse mail valide";
                        $globalError = 1;
					}
				}

                if(empty($_POST['num_tel'])){
					$numTelError = "Le numéro de téléphone est requis";
					$globalError = 1;
				}
				else{
					$tel = $_POST["num_tel"];
				}

				if(empty($_POST['dateN'])){
					$dateError = "Votre date de naissance est requise";
					$globalError = 1;
				}
				else{
					// date aujourd'hui
					/*$dateDuJour = date("Y-m-d");
					$dateDuJour = (int)$dateDuJour;
					echo $dateDuJour;
					echo "</br>";
					$testdate = $_POST['dateN'];
					$testdate = (int)$testdate;
					echo $testdate;
					echo "</br>";
					
					if (($dateDuJour - $testdate) < 18){*/



						
					if ((new \DateTime())->diff(new \DateTime($_POST['dateN']))->format('%y') < 18){
    					$dateError = "Vous êtes mineur, interdit aux paris sportifs";//le visiteur a moins 18 ans
						$globalError = 1;
					}
					
					else {
						$date = $_POST['dateN']; //le visiteur a au moins 18 ans
						echo $date;
					}
						
				}

				if(empty($_POST["mdp"])){
					$mdpError = " Le mot de passe est requis";
                    $globalError = 1;
				}
				else {
					$mdp = $_POST["mdp"];
					$verif_mdp=verificationPassword($mdp);
					if(!$verif_mdp){
						$mdp_valid = " Ne répond pas aux attentes de sécurité : < 8 lettres avec au moins 1 MAJ, 1 MIN, 1 chiffre";
                        $globalError = 1;
					}
				}
				
				if(empty($_POST["mdp_confirm"])){
					$mdp_confirmError = " Le mot de passe est requis";
                    $globalError = 1;
				}
				else {
					$mdp_confirm = $_POST["mdp_confirm"];
					$verif_mdp_confirm=verificationPassword($mdp_confirm);
					if(!$verif_mdp_confirm){
						$mdp_confirm_valid = "Le mot de passe est invalide";
                        $globalError = 1;
					}
					else{
						$test = same_mdp($mdp, $mdp_confirm);
						if(!$test){
							$same_mdp= " Les mots de passe ne correspondent pas ";
                            $globalError = 1;
						}
					}
				}

				if($globalError == 0){
                
					$requete ="INSERT INTO utilisateurs VALUES(NULL, '$nom', '$prenom', '$date', '$email', '$mdp', '0', '$tel', 'Client')";
	
					$resultat = mysqli_query($connexion, $requete); //Executer la requete
				
					if ( $resultat == FALSE ){  
						echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
						die();
					}
				
				}
            }

           
            
            mysqli_close($connexion);
        ?>

    <body>

		<!-- image (logo) -->
        <a href="index.php"><img class="logo" src="bidoobet.png" alt=""></a>

        <form method="POST">

			<h1>Inscription</h1>

            <?php echo "<p>".$nomError."</p>"; ?>
			<input class="saisie" type="text" id="nom" name="nom" placeholder="Votre nom">
				
			<?php echo "<p>".$prenomError."</p>"; ?>
			<input class="saisie" type="text" id="prenom" name="prenom" placeholder="Votre prénom">
			
			<?php echo "<p>".$emailError."</p>"; echo "<p>".$mail_valid."</p>"; ?>
			<input class="saisie" class="saisie" type="text" id="email" name="email" placeholder="Votre adresse Email">
			
            <?php echo "<p>".$numTelError."</p>"; ?>
			<input class="saisie" type="text" id="num_tel" name="num_tel" placeholder="Votre numéro de téléphone">
				
			<?php echo "<p>".$dateError."</p>"; ?>
			<input  type="date" id="dateN" name="dateN">
            		
			<?php echo "<p>".$mdpError."</p>"; echo "<p>".$mdp_valid."</p>"; ?>
			<input class="saisie" type="text" id="mdp" name="mdp" placeholder="Votre mot de passe">

            <?php echo "<p>".$mdp_confirmError."</p>"; ?>
			<input class="saisie" type="text" id="mdp_confirm" name="mdp_confirm" placeholder="Confirmation du mot de passe">
			
			<input class="submit" Type="submit" name="Envoyer" value="Envoyer">
    	    
        </form>

        

    </body>
</html>