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

    $anneeActuelle = date("Y");
    $anneePrecedente = $anneeActuelle - 1;
    $annee = $anneePrecedente."-".$anneeActuelle;


    $filtre="";
    if (isset ( $_GET ["query"] )) {
        $filtre = $_GET ["query"];
    }
    $listeEleves= listeEleves($filtre);

    if(isset($_GET["sup"])){
        /*supprimeStageParEleve($_GET["sup"]);
        sup_unEleve($_GET["sup"]);*/

        standByUnEleve($_GET["sup"]);
        header('location: listeEleves.php');
    }

    if(isset($_GET["annee"])){
        standByElevesByAnnee($_GET["annee"]);
        header('location: listeEleves.php');
    }

    if(isset($_GET["annul"])){
        annulerStandByUnEleve($_GET["annul"]);
        header('location: listeEleves.php');
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
        <center><h2><b><a href="ajoutEleveAdmin.php">Cliquez ici pour ajouter un élève</a></b></h2></center>
    <center><h2><b><a href="listeEleves.php?annee=<?php echo $annee ?>">Cliquez ici pour supprimer les élèves de l'année passée</a></b></h2></center>

    <br>
    <center><h2><b>Eleves de l'année <?php echo $anneePrecedente."-".$anneeActuelle?></b></h2></center>
    <table>
    <tr>
    <th>Nom & Prénom</th>
    <th>Classe</th>
    <th>Année scolaire</th>
    <th>Identifiant</th>
    <th>Mot de passe</th>
    <th>Modifier</th>
    <th>Supprimer</th>
    </tr>

    <?php foreach($listeEleves as $eleve){
    if($eleve->present == 1){
    ?>

    <tr>
    <td><?php echo $eleve->nomEleve." ".$eleve->prenomEleve ?></td>
    <td><?php echo $eleve->classeEleve ?></td>
    <td><?php  echo $eleve->anneeScolaire ?></td>
    <td><?php echo $eleve->login ?></td>
    <td><?php echo $eleve->password ?></td>
    <td><a href="modifEleve.php?eleve=<?php echo $eleve->idUserEleve ?>">Modifier</a></td>
    <td><a href="listeEleves.php?sup=<?php echo $eleve->idUserEleve ?>">Supprimer</a></td>

    </tr>
    <?php } }
    ?>
    </table>

    <h3>*: Ils seront toujours présent dans la table, mais en "stand-by", inactifs en tant qu'élèves</h3>

    <br>
    <center><h2><b>Anciens élèves</b></h2></center>

    <center><form method="get" action="listeEleves.php" style="margin-bottom: 70px;">
        <font size=4><b>Recherche : </b></font>
    <input style="font-size:23px" type="search" id="search" placeholder="20xx-20xx" name="query" value="<?php echo $filtre?>">
        <input style ="margin-bottom: -15px" name="submit" id="s" type="image" src="../images/search-icon.svg">
        </form></center>
    <table>
    <tr>
    <th>Nom & Prénom</th>
    <th>Classe</th>
    <th>Année scolaire</th>
    <th>Identifiant</th>
    <th>Mot de passe</th>
    <th>Annuler</th>
    </tr>

    <?php foreach($listeEleves as $eleve){
    if($eleve->present == 0){
    ?>

    <tr>
    <td><?php echo $eleve->nomEleve." ".$eleve->prenomEleve ?></td>
    <td><?php echo $eleve->classeEleve ?></td>
    <td><?php  echo $eleve->anneeScolaire ?></td>
    <td><?php echo $eleve->login ?></td>
    <td><?php echo $eleve->password ?></td>
    <td><a href="listeEleves.php?annul=<?php echo $eleve->idUserEleve ?>">Annuler</a></td>
    </tr>
    <?php } }
    ?>
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