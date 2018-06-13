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
    $listeTuteurs= listeTuteurs();
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
        <h2 Liste des tuteurs </h2>
        <table>
        <tr>
        <th>Nom & Prénom</th>
        <th>Adresse email</th>
    <th>Numéro de téléphone</th>
    <th>Entreprise</th>
    <th>Modifier</th>
    </tr>

    <?php foreach($listeTuteurs as $tuteur){ ?>
    <tr>
    <td><?php echo $tuteur->nomTuteur." ".$tuteur->prenomTuteur?></td>
    <td><?php echo $tuteur->mailTuteur ?></td>
    <td><?php echo $tuteur->telTuteur ?></td>
    <td><a href="detailsEnt.php?ent=<?php echo $tuteur->idEntreprise?>"><?php echo entreprise_getLabel($tuteur->idEntreprise)?></a></td>
    <td><a href="modifTut.php?tut=<?php echo $tuteur->idTuteur ?>">Modifier</a></td>
    </tr>
    <?php } ?>
    </table>
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