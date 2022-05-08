
	
<?php
	//Connexion
	require 'connexion.php';
	
	//ETAPE 1: Récupération des données de la BD
	if(isset($_GET['id'])){
		//Compléter
		$id = $_GET['id'];
		$requete= "SELECT * FROM matchs WHERE ID = $id";//La requere SQL
		$resultat = mysqli_query($connexion, $requete); //Executer la requete
	
	
	//ETAPE 2: Compléter le formulaire en bas
		$rows = mysqli_fetch_assoc($resultat);
        $id = $rows['ID'];
		$equipeD = $rows['EquipeD'];
		$equipeE = $rows['EquipeE'];
		$coteD = $rows['CoteD'];
		$coteE = $rows['CoteE'];
        $coteNul = $rows['CoteNul'];
		$resultatFin = $rows['ResultatFin'];
		$date = $rows['Date'];
		$heure = $rows['Heure'];
        $championnat = $rows['Championnat'];

	}
	//ETAPE 3: Modification des données de la BD selon les valeurs envoyées par le formulaire
	if(isset($_POST['Modifier'])){
		$id = $_POST['ID'];
		$equipeD = $_POST['EquipeD'];
		$equipeE = $_POST['EquipeE'];
		$coteD = $_POST['CoteD'];
		$coteE = $_POST['CoteE'];
        $coteNul = $_POST['CoteNul'];
		$resultatFin = $_POST['ResultatFin'];
		$date = $_POST['Date'];
		$heure = $_POST['Heure'];
        $championnat = $_POST['Championnat'];
		$requete_modif="UPDATE matchs SET EquipeD = '$equipeD', EquipeE = '$equipeE', CoteD = '$coteD', CoteE ='$coteE', CoteNul = '$coteNul', ResultatFin = '$resultatFin', Date = '$date', Heure = '$ WHERE ID = $id";
		mysqli_query($connexion, $requete_modif);
		mysqli_close($connexion);
        header("Location:admin.php");//Redirection vers la page TP4.php 

	}
?>

<!-- ETAPE 2: Formulaire de modification -->
	<form name="modif" action="modifier_match.php" method="post">
		<fieldset>
			<legend>Modifier un matchs</legend>
			<input type="hidden" id="id" name="id" value="<?php echo $id; ?>"><br/>
			
            <label for="equipeD">Equipe a Domicile : </label>
            <input type="text" id="equipeD" name="equipeD" value="<?php echo $equipeD; ?>"><br/><br/>
                            
            <label for="equipeE">Equipe a l'Exterieur : </label>
            <input type="text" id="equipeE" name="equipeE" value="<?php echo $equipeE; ?>"><br/><br/>
                            
            <label for="email">Cote equipe a Domicile : </label>
            <input type="text" id="coteD" name="coteD" value="<?php echo $coteD; ?>"><br/><br/>
                            
            <label for="dateN">Cote equipe a l'Exterieur : </label>
            <input type="text" id="coteE" name="coteE" value="<?php echo $coteE; ?>"><br/><br/>

            <label for="dateN">Cote equipe match Nul : </label>
            <input type="text" id="coteN" name="coteN" value="<?php echo $coteNul; ?>"><br/><br/>

            <label for="dateMatch">Resultat en fin de match : </label>
            <input type="text" id="resultatFin" name="dateMatch" value="<?php echo $resultatFin; ?>"><br/><br/>

            <label for="dateMatch">Date du match : </label>
            <input type="date" id="dateMatch" name="dateMatch" value="<?php echo $date; ?>"><br/><br/>

            <label for="heure">Heure du match : </label>
            <input type="time" id="heure" name="heure" value="<?php echo $heure; ?>"><br/><br/>

            <label for="championnat">Championnat : </label>
            <input type="text" id="championnat" name="championnat" value="<?php echo $championnat; ?>"><br/><br/>
            
            <input class="send "Type="submit" name="Modifier" value="Modifier">

		</fieldset>
    </form>