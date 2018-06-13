<?php
require_once('./models/fonctions.php');
session_start();
$datetime = date("Y-m-d");
if (($_SESSION['role']=="prof")||($_SESSION['role']=="eleve")||($_SESSION['role']=="admin")) {

    ?>
    <!DOCTYPE HTML>

    <!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

    <head>
        <title>Aide Stage | Accueil </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>

    <body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <div class="logo"><img src="images/logo.svg" alt="" /></div>
            <h1>Dipositif d'aide à la recherche</h1>
            <h2>Stage de découverte des 3èmes</h2>
        </header>

        <!-- Vérification du rôle pour page de Home spécifique -->
        <!-- Eleve -->

        <?php if ($_SESSION['role']=="eleve") { ?>
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
                    <li><a href=deconnexion.php>Déconnexion</a></li>
                </ul>
                <ul>
                    <li><a href=home.php>Accueil</a></li>
                    <li><a href=eleve/listEntreprise.php>Liste des entreprises</a></li>
                    <li><a href=eleve/formulaires/formulaireStage.php>J'ai un stage!</a></li>
                    <li><a href=Aide.php>Aide</a></li>
                </ul>
            </nav>

            <!-- Main -->
            <div id="main">

                <!-- Introduction -->
                <section id="intro" class="main">

                    <?php

                    if(isset($_GET["tut"])) {
                        stage_add($_SESSION["id"], $_GET["tut"], $datetime);

                        ?>

                        <center><h2><b>Votre stage a bien été ajouté !</b></h2></center>

                        <?php

                        header('refresh:5;url=home.php'); } else {

                        ?>

                        <center><h2>Bonjour et bienvenue sur le site web réalisé pour vous aider à trouver un stage ! </h2>
                            <h3>Vous avez des difficultés à trouver un stage ? Ce site annexe à celui de votre collège est là pour vous !</h3></center>
                        <p style="padding-top: 40px; padding-bottom: 0;">Sont à votre disposition sur ce site: </p>
                        <ul style="padding-left:50px;">
                            <li>
                                une liste contenant des informations sur diverses entreprises ainsi que leur localisation pour vous repérer
                            </li>
                            <li>
                                des documents sous format PDF téléchargeable et imprimable:
                                <ul style="list-style-type:circle;">
                                    <li> attestation de stage</li>
                                    <li> exemples de lettres de motivation et CV</li>
                                </ul>
                            </li>
                            <li>
                                un formulaire à remplir afin de faire savoir à vos enseignants le fait que vous avez un stage
                            </li>
                        </ul>
                    <?php } ?>
                </section>

						

            </div>

        <?php } ?>
        <!-- Prof -->

        <?php if ($_SESSION['role']=="prof") { ?>

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
                <li><a href=deconnexion.php>Déconnexion</a></li>
            </ul>
            <ul>
                <li><a href=home.php>Accueil</a></li>
                <li><a href=professeur/listes.php>Voir les listes</a></li>
                <li><a href=.aide.php>Aide</a></li>
        </nav>

        <!-- Main -->
        <div id="main">

            <!-- Introduction -->
            <section id="intro" class="main">
                <center><h2>Bonjour et bienvenue sur le site web réalisé pour donner un coup de pouce aux 3èmes dans la recherche de leur stage ! </h2>
                    <h3>Cette version du site à laquelle vous, professeurs, avez accès, est différente de celle proposée aux élèves </h3></center>
                <p style="padding-top: 40px; padding-bottom: 0;">Voici ce que vous pouvez faire sur cette version-ci: </p>
                <ul style="padding-left:50px;">
                    <li>
                        Voir la liste des élèves que vous suivrez tout au long de leur stage
                    </li>
                    <li>
                        Voir la liste des élèves qui n'ont pas encore de professeur assigné
                    </li>
                    <li>
                        Sélectionner le ou les élèves que vous comptez suivre durant cette période
                    </li>
                </ul>
            </section>

            <?php } ?>

            <!-- Admin -->

            <?php if ($_SESSION['role']=="admin") { ?>

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
                    <li><a href=deconnexion.php>Déconnexion</a></li>
                </ul>
                    <ul>
                        <li><a href=home.php>Accueil</a></li>
                        <li><a href=admin/listes.php>Listes des élèves et professeurs</a></li>
                        <li><a href=admin/listesBis.php>Listes des entreprises et tuteurs</a></li>
                        <li><a href=admin/listesStages.php>Liste des stages</a></li>
                        <li><a href=admin/aide.php>Aide</a></li>
                    </ul>
                </nav>
                <!-- Main -->
                <div id="main">

                    <!-- Introduction -->
                    <section id="intro" class="main">
                        <center><h2>Bonjour et bienvenue sur le site web réalisé pour donner un coup de pouce aux 3èmes dans la recherche de leur stage ! </h2>
                            <h3>Cette version du site à laquelle vous avez accès, est différente de celle proposée aux élèves ainsi qu'aux professeurs </h3></center>
                        <p style="padding-top: 40px; padding-bottom: 0;">Voici ce que vous pouvez faire en tant qu'admin: </p>
                        <ul style="padding-left:50px;">
                            <li>
                                Voir la liste des élèves, professeurs, tuteurs et entreprises
                            </li>
                            <li>
                                Voir la liste des élèves qui n'ont pas encore de professeur assigné et celle de ceux qui sont suivis
                            </li>
                            <li>
                                Vider les tables élèves, stages et tuteurs
                            </li>
                            <li>
                                Supprimer, ajouter, modifier un élève, un professeur ou une entreprise
                            </li>
                            <li>
                                Supprimer un stage (dans le cas où l'élève se serait trompé, afin qu'il recommence la procédure)
                            </li>
                        </ul>
                    </section>

						

                </div>
            <?php } ?>
            <!-- Fin de vérification du rôle pour page spécifique -->
				
            <!-- Footer -->
            <footer id="footer">
                <section>
                    @2018 Salomé Thomas & Angélique Cottencin
                </section>
            </footer>
        </div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/ie/respond.min.js"></script>
        <script src="assets/js/main.js"></script>

    </body>


</html>

    <?php
}
else
{
    header ('location: ./erreur.php');
}
?>