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

    $listeProfs= listeProfs();

    if(isset($_GET["prof"])){
        /*remplaceParProfFantome($_GET["prof"]);
        sup_UnProf($_GET["prof"]);*/

        standByUnProfEtRemplaceParFantome($_GET["prof"]);
        header("location: listeProfs.php");
    }

    if(isset($_GET["annul"])){
        annulerStandByUnProf($_GET["annul"]);
        header("location: listeProfs.php");
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
        <center><h2><b><a href="ajoutProfAdmin.php">Ajouter un professeur</a></b></h2></center>

    <br>
    <center><h2><b>Liste des professeurs actuels</b></h2></center>

    <table>
    <tr>
    <th>Nom & Prénom</th>
    <th>Identifiant</th>
    <th>Mot de passe</th>
    <th>Modifier</th>
    <th>Supprimer</th>
    </tr>

    <?php foreach($listeProfs as $prof){
    if($prof->present == 1){
    ?>
    <tr>
    <td><?php echo $prof->nomProf." ".$prof->prenomProf ?></td>
    <td><?php echo $prof->login ?></td>
    <td><?php echo $prof->password ?></td>
    <td><a href="modifProf.php?prof=<?php echo $prof->idUserProf ?>">Modifier</a></td>
    <td><a href="listeProfs.php?prof=<?php echo $prof->idUserProf ?>">Supprimer</a></td>
    </tr>
    <?php }} ?>
    </table>


    <br>
    <center><h2><b>Anciens professeurs</b></h2></center>

    <table>
    <tr>
    <th>Nom & Prénom</th>
    <th>Identifiant</th>
    <th>Mot de passe</th>
    <th>Annuler</th>
    </tr>

    <?php foreach($listeProfs as $prof){
    if($prof->present == 0){
    ?>
    <tr>
    <td><?php echo $prof->nomProf." ".$prof->prenomProf ?></td>
    <td><?php echo $prof->login ?></td>
    <td><?php echo $prof->password ?></td>
    <td><a href="listeProfs.php?annul=<?php echo $prof->idUserProf ?>">Annuler</a></td>
    </tr>
    <?php }} ?>
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