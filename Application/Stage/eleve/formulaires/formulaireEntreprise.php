<?php
session_start();

if (($_SESSION['role']=="prof")||($_SESSION['role']=="eleve")) {

    ?>
    <!DOCTYPE HTML>
    <!--
        Stellar by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->

    <html>
    <head>
        <title>Stage | Formulaire</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script src="./../../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="./../../assets/css/main.css"/>
        <link rel="stylesheet" href="./../../assets/css/ie9.css"/>
        <link rel="stylesheet" href="./../../assets/css/ie8.css"/>
    </head>

    <?php

    require_once('./../../models/fonctions.php');
    $msg = "";
    if(isset($_POST["nomEnt"]) && isset($_POST["ville"]) && isset($_POST["cp"]) && isset($_POST["adresse"]) && isset($_POST["mail"]) && isset($_POST["tel"]) && isset($_POST["activite"])){
        $nom = $_POST["nomEnt"];
        $ville = $_POST["ville"];
        $cp = $_POST["cp"];
        $adresse =$_POST["adresse"];
        $mail =$_POST["mail"];
        $tel =$_POST["tel"];
        $activite=$_POST["activite"];
        if(empty($nom) || empty($ville) || empty($cp) ||empty ($adresse) || empty($mail) || empty($tel) ||empty($activite)){
            $msg="Veuillez remplir tous les champs !";
					
        } else{
            entreprise_add($_POST["nomEnt"], $_POST["ville"], $_POST["cp"],  $_POST["adresse"], $_POST["mail"], $_POST["tel"], $_POST["activite"]);
            header("location: formulaireStage.php");
        }
    }
    ?>
    <body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="images/logo.svg" alt="" /></span>
            <h1>Dipositif d'aide à la recherche</h1>
            <h2>Stage de découverte des 5èmes</h2>
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
                <li><a href=./../../deconnexion.php>Déconnexion</a></li>
            </ul>
            <ul>
                <li><a href=./../../home.php>Accueil</a></li>
                <li><a href=./../listEntreprise.php>Liste des entreprises</a></li>
                <li><a href=formulaireStage.php>J'ai un stage!</a></li>
                <li><a href=./../../aide.php>Aide</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">

            <!-- Introduction -->
            <section id="intro" class="main">
							 	
                <center><h2><b><font color="red"><?php echo $msg; ?></font></b></h2></center>
								
                <h2>Les informations sur l'entreprise qui vous accueille (si non présente dans la liste proposée):</h2>
                <form method="POST" action="formulaireEntreprise.php">

                    <table>
                        <tr>
                            <td><font size=5>Nom de l'entreprise:</font></td>
                            <td><font size=5><input type="text" name="nomEnt"></font></td>
                        </tr>
										
                        <tr>

                            <td><font size=5>Secteur d'activité de l'entreprise:</font></td>
                            <td><font size=5><select type="text" name="activite" >
                                        <option value="Agriculture ">Agriculture</option>
                                        <option value="Agroalimentaire">Agroalimentaire</option>
                                        <option value="Art/Spectacle">Art/Spectacle</option>
                                        <option value="Banque/Assurance/Finance">Banque/Assurance</option>
                                        <option value="BTP">BTP</option>
                                        <option value="Commerce/Distribution">Commerce/Distribution</option>
                                        <option value="Droit/Justice">Droit/Justice</option>
                                        <option value="Economie/Gestion">Economie/Gestion</option>
                                        <option value="Enseignement">Enseignement</option>
                                        <option value="Environnement">Environnement</option>
                                        <option value="Fonction publique">Fonction publique</option>
                                        <option value="Hôtelerie">Hôtelerie</option>
                                        <option value="Industrie">Industrie</option>
                                        <option value="Journalisme">Journalisme</option>
                                        <option value="Logistique">Logistique</option>
                                        <option value="Multimedia/Audiovisuel/Informatique">Multimedia/Audiovisuel/Informatique</option>
                                        <option value="Santé ">Santé </option>
                                        <option value="Sciences humaines">Sciences humaines</option>
                                        <option value="Sécurité">Sécurité</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Tourisme">Tourisme</option>
                                        <option value="Transports">Transports</option>
                                        <option value="Autre secteur">Autre</option>
                                </font></td>
											
                        </tr>
                        <tr>
                            <td><font size=5>Ville de l'entreprise :</font></td>
                            <td><font size=5><input type="text" name="ville"></font></td>
                        </tr>
                        <tr>
                            <td><font size=5>Code postal de la ville:</font></td>
                            <td><font size=5><input type="number" name="cp"></font></td>
                        </tr>
                        <tr>
                            <td><font size=5>Adresse de l'entreprise:</font></td>
                            <td><font size=5><input type="text" name="adresse"></font></td>
											
                        </tr>
                        <tr>
                            <td><font size=5>Adresse email de l'entreprise:</font></td>
                            <td><font size=5><input type="text" name="mail"></font></td>
											
                        </tr>
                        <tr>
                            <td><font size=5>Numéro de téléphone de l'entreprise:</font></td>
                            <td><font size=5><input type="text" name="tel" ></font></td>
											
                        </tr>
                    </table>
                    <center><button type="submit" value="ajout" style="font-size: 20px"> Ajoutez l'entreprise qui vous accueille à la liste des entreprises </button></center>
                </form>
	
            </section>



        </div>

        <!-- Footer -->
        <footer id="footer">
            <section>
							
            </section>
						
		
        </footer>

    </div>

    <!-- Scripts -->
    <script src="./../../assets/js/jquery.min.js"></script>
    <script src="./../../assets/js/jquery.scrollex.min.js"></script>
    <script src="./../../assets/js/jquery.scrolly.min.js"></script>
    <script src="./../../assets/js/skel.min.js"></script>
    <script src="./../../assets/js/util.js"></script>
    <script src="./../../assets/js/ie/respond.min.js"></script>
    <script src="./../../assets/js/main.js"></script>

    </body>
    </html>

    <?php
}
else {
    header ('location: ./erreur.php');
}
?>