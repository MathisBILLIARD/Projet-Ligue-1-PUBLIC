<?php 

	session_start(); //Démarrer la session
	if($_SESSION['role']=='Admin'){ // si l'utilisateur est authentifié (client ou admin) alors on affiche la page
?>

    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>inscription</title>
            <meta charset="utf-8" />
            <style>
                body{padding:3%;}
                table,td,th{border: solid; border-collapse:collapse;text-align:center;width: 300px;height: 50px;}
            </style>
        </head>
        
        <body>

            <a href="logout.php">Déconnexion</a> 

            <?php

                require 'connexion.php';

                $requete="SELECT Nom, Prenom, Solde FROM utilisateurs WHERE Rôle='Client'"; //Requete pour récuperer les noms des produits et leurs références de la table produit pour la catégorie boisson (CodeCategorie =1)
                $resultat=mysqli_query($connexion, $requete); //Executer la requete	
                if ( $resultat == FALSE ){
                    echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                    die();
                }
            
                $nbreLignes= mysqli_num_rows($resultat); //Nombre de ligne du retour de la requete

                echo "<p> Il y a $nbreLignes clients sur notre site !";
                
                echo "<table>";
                        echo"<tr>";
                            echo"<th>Nom</th>";
                            echo"<th>Prénom</th>";
                            echo"<th>Solde</th>";
                        echo"</tr>";

                        if( $nbreLignes >0){
                            while($rows = mysqli_fetch_assoc($resultat)){
                                echo"<tr>";
                                foreach ($rows as $cle => $val) {
                                        echo"<td>$val</td>";
                                }   
                                echo "</tr>";
                            }
                        }
                            
                echo"</table>";
            
            ?>

            

            <br/>
            <form name="ajout" action="ajout_match.php" method="post">
                        <fieldset>
                            <legend>Ajouter un match</legend>
                            
                            <label for="equipeD">Equipe a Domicile : </label>
                            <input type="text" id="equipeD" name="equipeD"><br/><br/>
                            
                            <label for="equipeE">Equipe a l'Exterieur : </label>
                            <input type="text" id="equipeE" name="equipeE"><br/><br/>
                            
                            <label for="email">Cote equipe a Domicile : </label>
                            <input type="text" id="coteD" name="coteD"><br/><br/>
                            
                            <label for="dateN">Cote equipe a l'Exterieur : </label>
                            <input type="text" id="coteE" name="coteE"><br/><br/>

                            <label for="dateN">Cote equipe match Nul : </label>
                            <input type="text" id="coteN" name="coteN"><br/><br/>

                            <label for="dateMatch">Date du match : </label>
                            <input type="date" id="dateMatch" name="dateMatch"><br/><br/>

                            <label for="heure">Heure du match : </label>
                            <input type="time" id="heure" name="heure"><br/><br/>

                            <label for="championnat">Championnat : </label>
                            <input type="text" id="championnat" name="championnat"><br/><br/>
                            
                            <input Type="submit" name="Ajouter" value="Ajouter">
                        </fieldset>
                    </form>
        </body>           
            <?php

            $requete_match ="SELECT * FROM matchs";//La requere SQL
            $resultat_match = mysqli_query($connexion, $requete_match); //Executer la requete

            if ( $resultat_match == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
            }
            else
            {
                $nbreLignes_match= mysqli_num_rows($resultat_match); //Nombre de ligne du retour de la requete

                echo "<table>";
                    echo"<tr>";
                        echo"<th>id</th>";
                        echo"<th>Equipe a Domicile</th>";
                        echo"<th>Equipe a l'Exterieur</th>";
                        echo"<th>Cote Domicile</th>";
                        echo"<th>Cote Exterieur</th>";
                        echo"<th>Cote Nul</th>";
                        echo"<th>Resultat</th>";
                        echo"<th>Date</th>";
                        echo"<th>Heure</th>";
                        echo"<th>Championnat</th>";
                        echo"<th colspan=2>Action</th>";
                    echo"</tr>";
        
                if( $nbreLignes >0){
					while($rows = mysqli_fetch_assoc($resultat_match)){
						echo"<tr>";
						$id_url = $rows['ID']; 
						foreach ($rows as $cle => $val) {
								echo"<td>$val</td>";
		
						}
					
						echo"	<td><a href='modifier_match.php?id=$id_url'>Modifier</a></td>
								<td><a href='supprimer_match.php?id=$id_url'>Supprimer</a></td>;
						</tr>";
					}
                }
                echo "</table>";
            }

            mysqli_close($connexion);//Fermer la connexion
}
elseif ($_SESSION['role']=='Client') {
    header("Location:acceuil.php");
}
else{ //SINON : si l'utilisateur n'es pas authentifié => redirection vers la page d'authentification TP5.php
	header("Location:connexion_form.php");
}
?>
