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
        <title>Aide Stage | Modification </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="../assets/css/main.css" />
    </head>
    <?php

    require_once('../models/fonctions.php');

    $nomEleve = "";
    $prenomEleve = "";
    $classeEleve = "";
    $anneeSco = "";
    $loginEleve = "";
    $passEleve= "";

    if (isset ( $_GET ["eleve"] )) {
        $unEleve = eleve_getByID ( $_GET ["eleve"] );
        $id = $unEleve->idUserEleve;
        $nomEleve = $unEleve->nomEleve;
        $prenomEleve = $unEleve->prenomEleve;
        $classeEleve = $unEleve->classeEleve;
        $anneeSco = $unEleve->anneeScolaire;
        $loginEleve = $unEleve->login;
        $passEleve = $unEleve->password;

        if (isset ( $_GET ["nomEleve"] ) && isset ( $_GET ["prenomEleve"] ) && isset ( $_GET ["classeEleve"] ) && isset ( $_GET ["anneeScolaire"] ) && isset ( $_GET ["login"] ) && isset($_GET["password"])) {
            $nomEleve = $_GET ["nomEleve"];
            $prenomEleve = $_GET ["prenomEleve"];
            $classeEleve = $_GET ["classeEleve"];
            $anneeSco = $_GET ["anneeScolaire"];
            $loginEleve = $_GET ["login"];
            $passEleve = $_GET["password"];
            $modif_ok = modifEleve( $id, $nomEleve, $prenomEleve, $classeEleve, $anneeSco, $loginEleve, $passEleve);
            if ($modif_ok) {
                header ( 'location: listeEleves.php' );
            }
        }
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
        <form method="GET" action="modifEleve.php">

        <table class="table-condensed">
        <tr>
        <td><input type="hidden" name="eleve" value="<?php echo $id ?>"></td>
        </tr>
        <tr>
        <td><font size=4>Nom de l'élève :</font></td>
    <td><font size=4><input type="text" name="nomEleve" value="<?php echo $nomEleve ?>"></font></td>

    </tr>
    <tr>
    <td><font size=4>Prénom de l'élève :</font></td>
    <td><font size=4><input type="text" name="prenomEleve" value="<?php echo $prenomEleve ?>"></font></td>
    </tr>
    <tr>
    <td><font size=4>Classe Eleve :</font></td>
    <td><font size=4><select type="number" name="classeEleve">

        <option value="<?php echo $classeEleve ?>"> <?php echo $classeEleve?> </option>
        <option value="31">3ème1</option>
    <option value="32">3ème2</option>
    <option value="33">3ème3</option>
    <option value="34">3ème4</option>

    </select></font></td>
    </td>
    </tr>
    <tr>
    <td><font size=4>Son année scolaire:</font></td>
    <td><font size=4><input type="text" name="anneeScolaire" value="<?php echo $anneeSco ?>" placeholder = "format 20xx-20xx"></font></td>
    <td><h4>ATTENTION: la date doit impérativement se présenter sous le format 20xx-20xx (ex: 2017-2018)</h4></td>
    </tr>
    <tr>
    <td><font size=4>Son identifiant: </font></td>
    <td><font size=4><input type="text" name="login" value="<?php echo $loginEleve?>"></font></td>
    </tr>
    <tr>
    <td><font size=4>Son mot de passe: </font></td>
    <td><font size=4><input type="text" name="password" value="<?php echo $passEleve ?>"></font></td>
    </tr>

    </table>

    <center><button type="submit" name="update" class="btn btn-primary" id="update"> Valider les modifications </button></center>

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
    </html>
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