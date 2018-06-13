<?php
session_start();
if ($_SESSION['role'] == "admin"){
    ?>

    <!DOCTYPE HTML>
    <!--
        Stellar by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->

    <html>
    <head>
        <title>Stage | Ajout</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="./../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="./../assets/css/main.css" />
    </head>
    <?php

    session_start();
    require_once("../models/fonctions.php");
    if(isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["login"]) && isset($_GET["password"])){
        prof_add($_GET["nom"], $_GET["prenom"], $_GET["login"], $_GET["password"]);
        header("location: listeProfs.php");
    }
    ?>
    <body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="images/logo.svg" alt="" /></span>
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

                <form method="GET" action="ajoutProfAdmin.php">
                    <table>
                        <tr>
                            <td><font size=4>Nom de famille de l'enseignant</font></td>
                            <td><font size=4><input type="text" name="nom"></font></td>
                        </tr>
                        <tr>
                            <td><font size=4>Prénom de l'enseignant':</font></td>
                            <td><font size=4><input type="text" name="prenom"></font></td>
                        </tr>
                        <tr>
                            <td><font size=4>Son identifiant:</font></td>
                            <td><font size=4><input type="text" name="login"></td>
                        </tr>
                        <tr>
                            <td><font size=4>Son mot de passe:</font></td>
                            <td><font size=4><input type="text" name="password"></font></td>
                        </tr>
                    </table>
                    <center><button type="submit" value="ajout" style="font-size:20px"> Ajouter</button></center>
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