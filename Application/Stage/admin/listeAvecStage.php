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
        <title>Aide Stage | Liste </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="../assets/css/main.css" />
    </head>
    <?php
    require_once('../models/fonctions.php');
    $filtre="";
    if (isset ( $_GET ["query"] )) {
        $filtre = $_GET ["query"];
    }
    $listeStages= listeStages();
    $listeAnciensStages = listeAnciensStages($filtre);


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
        <center><h2><b>Stages actuels</b></h2></center>
    <table>
    <tr>
    <th>Eleve</th>
    <th>Entreprise</th>
    <th>Tuteur</th>
    <th>Professeur référent</th>
    <th>Date à laquelle l'élève a rentré son stage sur le site</th>
    </tr>

    <?php foreach($listeStages as $stage){

    ?>
    <tr>
    <td><a href="detailsEleve.php?eleve=<?php echo $stage->idUserEleve ?>"><?php echo $stage->nomEleve." ".$stage->prenomEleve ?></td>
        <td><a href="detailsEnt.php?ent=<?php echo $stage->idEntreprise ?>"><?php echo $stage->nomEntreprise ?></a></td>
    <td><a href="detailsTut.php?tuteur=<?php echo $stage->idTuteur ?>"><?php echo "M/Mme ".$stage->nomTuteur." ".$stage->prenomTuteur ?></a></td>
    <td><a href="detailsProf.php?prof=<?php echo $stage->idUserProf ?>"><?php echo "M/Mme ".$stage->nomProf." ".$stage->prenomProf ?></a></td>
    <td><?php echo $stage->dateStage ?></td>
    </tr>
    <?php } ?>
    </table>

    <br>
    <center><h2><b>Anciens Stages</b></h2></center>
    <center><form method="get" action="listeAvecStage.php" style="margin-bottom: 70px;">
        <font size=4> <b>Recherche : </b></font>
    <input style="font-size:23px" type="search" id="search" placeholder="20xx-20xx" name="query" value="<?php echo $filtre?>">
        <input style ="margin-bottom: -15px" name="submit" id="s" type="image" src="../images/search-icon.svg">
        </form></center>
    <table>
    <tr>
    <th>Eleve</th>
    <th>Entreprise</th>
    <th>Tuteur</th>
    <th>Professeur référent</th>
    <th>Date à laquelle l'élève a rentré son stage sur le site</th>
    </tr>

    <?php foreach($listeAnciensStages as $stage){

    ?>
    <tr>
    <td><a href="detailsEleve.php?eleve=<?php echo $stage->idUserEleve ?>"><?php echo $stage->nomEleve." ".$stage->prenomEleve ?></td>
        <td><a href="detailsEnt.php?ent=<?php echo $stage->idEntreprise ?>"><?php echo $stage->nomEntreprise ?></a></td>
    <td><a href="detailsTut.php?tuteur=<?php echo $stage->idTuteur ?>"><?php echo "M/Mme ".$stage->nomTuteur." ".$stage->prenomTuteur ?></a></td>
    <td><a href="detailsProf.php?prof=<?php echo $stage->idUserProf ?>"><?php echo "M/Mme ".$stage->nomProf." ".$stage->prenomProf ?></a></td>
    <td><?php echo $stage->dateStage ?></td>
    </tr>
    <?php } ?>
    </table>
    </section>
    <!-- faire une barre de recherche -->


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