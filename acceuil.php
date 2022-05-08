<?php 

	session_start(); //Démarrer la session
	if($_SESSION['role']=='Admin' || $_SESSION['role']=='Client'){ // si l'utilisateur est authentifié (client ou admin) alors on affiche la page
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>inscription</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="acceuil.css">
        </head>

        <body>

        <header>

        </header>
        
        <main>

            <section class="paris_sportif">

                    
                    <?php 

                        require 'connexion.php';
                        
                        $requete = "SELECT * FROM matchs";

                        $resultat = mysqli_query($connexion, $requete); //Executer la requete

                        if ( $resultat == FALSE ){
                            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                            die();
                        }
                        else
                        {
                            $nbreLignes= mysqli_num_rows($resultat); //Nombre de ligne du retour de la requete

                            if( $nbreLignes >0){

                                $i = 0;

                                while($rows = mysqli_fetch_assoc($resultat)){
                                    
                                    $test=(string)$i;
                                    $match ="matchs";
                                    $css=$match.$test;
                                    echo "<div class='$css'>";
                                    $image = $rows['EquipeD'];
                                    $equipeD = $rows['EquipeD'];
                                    $equipeE = $rows['EquipeE'];
                                    $coteEquipeD = $rows['CoteD'];
                                    $coteEquipeE = $rows['CoteE'];
                                    $coteMatchNul = $rows['CoteNul'];
                               
                                    
                                
                                    echo'<img class="photo" src="images/'.$image.'.jpg" alt="'.$image.'">';

                                    echo '<form class="equipeD" method="post"><input type="submit" name="envoie_prono_equipeD" value='.$equipeD.'></form>';
                                    if(isset($_POST['envoie_prono_equipeD'])){
                                        $_SESSION['prono'] = $equipeD;
                                        header("Location:prono_equipeD.php");
                                    }
                                    echo "<p class='coteEquipeD'> $coteEquipeD";
                                    echo '<form class="matchNul" method="post" action="prono_match_nul.php"><input type="submit" name="envoie_prono_nul" value="Match nul"></form>';
                                    echo "<p class='coteMatchNul'> $coteMatchNul";
                                    echo '<form class="equipeE" method="post" action="prono_equipeE.php"><input type="submit" name="envoie_prono_equipeE" value='.$equipeE.'></form>';
                                    echo "<p class='coteEquipeE'> $coteEquipeE";
                                    echo '</div>';
                                    $i++;
                                    
                                }
                            }
                        }



                    ?>
                    


            </section>
            


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