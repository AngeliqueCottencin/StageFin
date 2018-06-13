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
    <html>
	
    <head>
        <title>Aide Stage | Liste </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="./../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="./../assets/css/main.css" />
    </head>

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
    <li><a href=listes.php>Voir les listes</a></li>
    <li><a href=./../aide.php>Aide</a></li>
    </nav>

    <!-- Main -->
    <div id="main">

        <!-- Introduction -->
        <section id="intro" class="main">
        <center> <h2> Choisissez la liste vers laquelle vous souhaitez être redirigé </h2>
    <br>
    <a href="elevesSansStage.php" class="button fit">Liste des collégiens sans stage</a>
    <a href="elevesAvecStage.php" class="button fit">Liste de tous collégiens avec un stage</a>
    <a href="listeStages.php" class="button fit">Liste des collégiens ayant un stages non suivis</a>
    <a href="listeSuivis.php" class="button fit">Liste des collégiens que vous suivez</a>
    </centre>
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
    <script src="./../assets/js/jquery.min.js"></script>
    <script src="./../assets/js/jquery.scrollex.min.js"></script>
    <script src="./../assets/js/jquery.scrolly.min.js"></script>
    <script src="./../assets/js/skel.min.js"></script>
    <script src="./../assets/js/util.js"></script>
    <script src="./../assets/js/ie/respond.min.js"></script>
    <script src="./../assets/js/main.js"></script>

    </body>
    </html>
    <?php
}
else
{
    header ('location: ./erreur.php');
}
?>