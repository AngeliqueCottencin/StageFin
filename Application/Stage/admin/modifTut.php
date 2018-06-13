<?php
session_start();
if(($_SESSION['role'] == "prof")||($_SESSION['role'] == "admin")){
    $p= $_SESSION['login'];

    ?>
    <!DOCTYPE HTML>
    <!--
    Stellar by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
    <!-- Cette page est redondante avec detailsTut.php mais un des id passé dans ces deux pages n'est pas le même-->
    <html>

    <head>
        <title>Aide Stage | Modification </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="../assets/css/main.css" />
    </head>

	<?php
            require_once('../models/fonctions.php');

            $listeEntreprises = listeEntreprises();

            $nomTuteur = "";
            $prenomTuteur = "";
            $mailTuteur = "";
            $telTuteur = "";
            $idEnt = "";
            
            if (isset ( $_GET ["tut"] )) {
                $unTuteur = tuteur_getByID ( $_GET ["tut"] );
                $id = $unTuteur->idTuteur;
                $nomTuteur = $unTuteur->nomTuteur;
                $prenomTuteur = $unTuteur->prenomTuteur;
                $mailTuteur = $unTuteur->mailTuteur;
                $telTuteur = $unTuteur->telTuteur;
                $idEnt = $unTuteur->idEntreprise;
                
                if (isset ( $_GET ["nomTuteur"] ) && isset ( $_GET ["prenomTuteur"] ) && isset ( $_GET ["mailTuteur"] ) && isset ( $_GET ["telTuteur"] ) && isset ( $_GET ["idEnt"] )) {
                    $nomTuteur = $_GET ["nomTuteur"];
                    $prenomTuteur = $_GET ["prenomTuteur"];
                    $mailTuteur = $_GET ["mailTuteur"];
                    $telTuteur = $_GET ["telTuteur"];
                    $idEnt = $_GET ["idEnt"];
                    $modif_ok = modifTuteur( $id, $nomTuteur, $prenomTuteur, $mailTuteur, $telTuteur, $idEnt);
                    if ($modif_ok) {
                        header ( 'location: listeTuteurs.php' );
                    }
                }
            }

?>

	
	</script>

	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
                        <div class="logo"><img src="./../images/logo.svg" alt="" /></div>
						<h1>Dipositif d'aide à la recherche</h1>
						<h2>Stage de découverte des 3èmes</h2>
					</header>

				<!-- Nav -->
    <nav id="nav">
        <ul>
        <li>
        <?php
        $log = $_SESSION['login'];
        $role = $_SESSION['role'];
        print ("Connecté(e): $log, $role");
        ?>
        </li>
        <li><a href=./../deconnexion.php>Déconnexion</a></li>
    </ul>
    <ul>
    <li><a href=./../home.php>Accueil</a></li>
    <li><a href=listes.php>Listes des élèves et professeurs</a></li>
    <li><a href=listesBis.php>Listes des entreprises et tuteurs</a></li>
    <li><a href=listesStages.php>Liste des stages</a></li>
    <li><a href=./../aide.php>Aide</a></li>
    </ul>
    </nav>
				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
                            <form method="GET" action="modifTut.php">
                           
                                <table class="table-condensed">
                                    <tr>
                                        <td><input type="hidden" name="tut" value="<?php echo $id ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><font size=4>Nom du tuteur:</font></td>
                                        <td><font size=4
                                    </tr>
                                    <tr>
                                        <td><font size=4>Prénom du tuteur:</font></td>
                                        <td><font size=4><input type="text" name="prenomTuteur" value="<?php echo $prenomTuteur ?>"></font></td>
                                    </tr>
                                    <tr>
                                        <td><font size=4>Adresse email du tuteur:</font></td>
                                        <td><font size=4><input type="text" name="mailTuteur" value="<?php echo $mailTuteur ?>"></font></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><font size=4>Numéro de téléphone du tuteur:</font></td>
                                        <td><font size=4><input type="text" name="telTuteur" value="<?php echo $telTuteur ?>"></font></td>
                                    </tr>
                                    <tr>
                                    <td><font size=4>Sélectionnez l'entreprise à laquelle il appartient:</font></td>
                                    <td><font size=4>
                                        <select name="idEnt">
                                            <option value="<?php echo $idEnt ?>"> <?php echo entreprise_getLabel($idEnt)?></option>
                                            <?php foreach($listeEntreprises as $entreprise){ ?>
                                                <option value="<?php echo $entreprise->idEntreprise ?>" > <?php echo entreprise_getLabel($entreprise->idEntreprise) ?> </option>
                                            <?php } ?>
                                        </select>
                                    </font></td>
                                </tr>

                                </table>
                                
                                <center><button type="submit" name="update" class="btn btn-primary" id="update"> Valider les modifications </button></center>
                            
                             </form>
							</section>

						

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							@2018 Salomé Thomas & Angélique Cottencin
						</section>
						
		
					</footer>

			</div>

    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery.scrollex.min.js"></script>
    <script src="../assets/js/jquery.scrolly.min.js"></script>
    <script src="../assets/js/skel.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/ie/respond.min.js"></script>
    <script src="../assets/js/main.js"></script>

    </body>

</html>

<?php
}
else
{
    header ('location: ./erreur.php');
}
?>