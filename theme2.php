<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php

if (isset($_COOKIE['theme'])){ //si la cookie existe
			$style=$_COOKIE['theme'];	//on récupère le theme choisi
		}
		else{
 
			echo '<form method="post" action="theme.php">		
			<label>Choisir votre thème préféré : </label>
			<select name="Choixtheme">
				<option value="sombre">Sombre</option>
				<option value="clair">Clair (par defaut)</option>
			</select>
			<input type="submit" class="envoyer" name="Envoyer" Value="Envoyer"/>
		</form>';


		$style="clair";
		}

?>


<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>