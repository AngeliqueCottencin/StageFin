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

    <?php
    require_once('../models/fonctions.php');
    $listeStages= listeStages();
    ?>


    </script>

    <body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
        <div class="logo"><img src="./../images/logo.svg" alt=""/></div>
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
        <li><a href=deconnexion.php>Déconnexion</a></li>
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
        <center><h2>Liste de tous les élèves ayant un stage</h2></center>
        <center><h3><b><font color="red"><?php echo compterLesStages(); ?> élèves sur <?php echo compterLesEleves(); ?> ont un stage<b></h3></center></br>

    <!-- Prof -->
    <?php if($_SESSION['role'] == "prof"){ ?>
    <table>
    <tr>
    <th><center>Eleve</center></th>
    <th><center>Entreprise</center></th>
    <th><center>Tuteur</center></th>
    </tr>

    <?php foreach($listeStages as $stage){ ?>

    <tr>
    <td><center><a href="detailsEleve.php?eleve=<?php echo $stage->idUserEleve ?>"><?php echo $stage->nomEleve." ".$stage->prenomEleve ?></center></td>
    <td><center><a href="detailsEnt.php?ent=<?php echo $stage->idEntreprise ?>"><?php echo $stage->nomEntreprise ?></a></center></td>
    <td><center><a href="detailsTut.php?tuteur=<?php echo $stage->idTuteur ?>"><?php echo "M/Mme ".$stage->nomTuteur." ".$stage->prenomTuteur ?></a></center></td>
    </tr>
    <?php } ?>
    </table>
    <?php } ?>

    <!-- Admin -->
    <?php if($_SESSION['role'] == "admin"){ ?>
    <table>
    <tr>
    <th><center>Eleve</center></th>
    <th><center>Entreprise</center></th>
    <th><center>Tuteur</center></th>
    <th><center>Professeur référent</center></th>
    </tr>

    <?php foreach($listeStages as $stage){ ?>

    <tr>
    <td><center><a href="detailsEleve.php?eleve=<?php echo $stage->idUserEleve ?>"><?php echo $stage->nomEleve." ".$stage->prenomEleve ?></center></td>
    <td><center><a href="detailsEnt.php?ent=<?php echo $stage->idEntreprise ?>"><?php echo $stage->nomEntreprise ?></a></center></td>
    <td><center><a href="detailsTut.php?tuteur=<?php echo $stage->idTuteur ?>"><?php echo "M/Mme ".$stage->nomTuteur." ".$stage->prenomTuteur ?></a></center></td>
    <td><center><a href="detailsProf.php?prof=<?php echo $stage->idUserProf ?>"><?php echo "M/Mme ".$stage->nomProf." ".$stage->prenomProf ?></a></center></td>
    </tr>
    <?php } ?>
    </table>
    <?php } ?>

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
    <script src="../assets/js/ie/respond.min.js">
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