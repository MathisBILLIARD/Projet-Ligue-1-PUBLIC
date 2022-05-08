<?php 
	session_start();; //Démarrer la session
	if(isset($_SESSION['role'])){ // si un utilisateur est authentifié
		session_unset(); //détruire les variables
		session_destroy();//détruire la session
		header("Location:index.php");
	}
?>