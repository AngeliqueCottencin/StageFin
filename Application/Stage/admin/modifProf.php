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

    $nomProf = "";
    $prenomProf = "";
    $loginProf = "";
    $passProf= "";

    if (isset ( $_GET ["prof"] )) {
        $unProf = prof_getByID ( $_GET ["prof"] );
        $id = $unProf->idUserProf;
        $nomProf = $unProf->nomProf;
        $prenomProf = $unProf->prenomProf;
        $loginProf = $unProf->login;
        $passProf = $unProf->password;

        if (isset ( $_GET ["nomProf"] ) && isset ( $_GET ["prenomProf"] ) && isset ($_GET ["login"] ) && isset($_GET["password"])) {
            $nomProf = $_GET ["nomProf"];
            $prenomProf = $_GET ["prenomProf"];
            $loginProf = $_GET ["login"];
            $passProf = $_GET["password"];
            $modif_ok = modifProf( $id, $nomProf, $prenomProf, $loginProf, $passProf);
            if ($modif_ok) {
                header ( 'location: listeProfs.php' );
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
        <form method="GET" action="modifProf.php">

        <table class="table-condensed">
        <tr>
        <td><input type="hidden" name="prof" value="<?php echo $id ?>"></td>
        </tr>
        <tr>
            <td><font size=4>Nom de l'enseignant :</font></td>
    <td><font size=4><input type="text" name="nomProf" value="<?php echo $nomProf ?>"></font></td>

    </tr>
    <tr>
    <td><font size=4>Prénom de l'enseignant :</font></td>
    <td><font size=4><input type="text" name="prenomProf" value="<?php echo $prenomProf ?>"></font></td>
    </tr>
    <tr>
    <td><font size=4>Son identifiant: </font></td>
    <td><font size=4><input type="text" name="login" value="<?php echo $loginProf?>"></font></td>
    </tr>
    <tr>
    <td><font size=4>Son mot de passe: </font></td>
    <td><font size=4><input type="text" name="password" value="<?php echo $passProf ?>"></font></td>
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