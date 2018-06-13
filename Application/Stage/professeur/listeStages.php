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
        <script src="../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="../assets/css/main.css" />
    </head>

    <?php
    require_once('../models/fonctions.php');

    $listeStages = listeStageFantome();
    if(isset($_GET['eleve'])){
        updateEleveNonSuivi($_SESSION['id'], $_GET['eleve']);
        header('location: listeStages.php');
    }

    ?>

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
                <center><h2>Liste des élèves non suivis par un professeur</h2></center></br>

                <table>
                    <tr>
                        <th><center>Eleve</center></th>
                        <th><center>Classe</center></th>
                        <th><center>Entreprise</center></th>
                        <th><center>Tuteur</center></th>
                        <th><center>Suivre cet élève</center></th>
                    </tr>

                    <?php foreach($listeStages as $element){ ?>
                        <tr>
                            <td><center><?php echo $element->nomEleve." ". $element->prenomEleve?></center></td>
                            <td><center><?php echo $element->classeEleve ?></center></td>
                            <td><center><?php echo $element->nomEntreprise." (". $element->adresseEntreprise. ", ". $element->villeEntreprise. ")"?></center></td>
                            <td><center><a href="infoTuteur.php?idTuteur=<?php echo $element->idTuteur ?>"><?php echo "M/Mme ".$element->nomTuteur?></center></a></td>
                            <td><center><a href="listeStages.php?eleve=<?php echo $element->idUserEleve ?>">Suivre</a></center></td>
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