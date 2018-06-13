<?php
session_start();

if (($_SESSION['role']=="prof")||($_SESSION['role']=="eleve")) {

    ?>
    <!DOCTYPE HTML>
    <!--
        Stellar by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->

    <html>
    <head>
        <title>Stage | Formulaire</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script src="./../../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="./../../assets/css/main.css"/>
        <link rel="stylesheet" href="./../../assets/css/ie9.css"/>
        <link rel="stylesheet" href="./../../assets/css/ie8.css"/>
    </head>

    <?php

        echo $_SESSION['id'];

        require_once('./../../models/fonctions.php');

        if (isset($_GET["nomEnt"]) && isset($_GET["ville"]) && isset($_GET["cp"]) && isset($_GET["adresse"]) && isset($_GET["mail"]) && isset($_GET["tel"]) && isset($_GET["activite"])) {
            entreprise_add($_GET["nomEnt"], $_GET["ville"], $_GET["cp"], $_GET["adresse"], $_GET["mail"], $_GET["tel"], $_GET["activite"]);
            header("location: formulaireStage.php");
        }


        if (isset($_GET["nomTut"]) && isset($_GET["prenomTut"]) && isset($_GET["mail"]) && isset($_GET["tel"]) && isset($_GET["idEnt"])) {
            tuteur_add($_GET["nomTut"], $_GET["prenomTut"], $_GET["mail"], $_GET["tel"], $_GET["idEnt"]);
            header("location: formulaireStage.php");
        }

        $filtre = "";
        $listeEleves = listeEleves($filtre);

        $listeEntreprises = listeEntreprisesPourEleves($filtre);
        if (isset($_GET["ent"])) {
            $listeTuteurs = listeTuteursPourEleves($_GET["ent"]);
            $entreprise = $_GET["ent"];
        }

        $verification = eleveAvecStagePasAccesFormulaire($_SESSION['id']);

        if (isset($_GET["tut"])) {
            $ent = entreprise_getLabel($_GET["tut"]);
            $tut = $_GET["tut"];
            $eleve = eleve_getLabel($_SESSION["id"]);

            list($tuteur, $php) = explode(".", $tut);


            ?>
            <body>

            <!-- Wrapper -->
            <div id="wrapper">

            <!-- Header -->
            <header id="header" class="alt">
                <span class="logo"><img src="./../../images/logo.svg" alt="" /></span>
                <h1>Dipositif d'aide à la recherche</h1>
                <h2>Stage de découverte des 5èmes</h2>
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
                    <li><a href=./../../deconnexion.php>Déconnexion</a></li>
                </ul>
                <ul>
                    <li><a href=./../../home.php>Accueil</a></li>
                    <li><a href=./../listEntreprise.php>Liste des entreprises</a></li>
                    <li><a href=formulaireStage.php>J'ai un stage!</a></li>
                    <li><a href=./../../aide.php>Aide</a></li>
                </ul>
            </nav>
            <!-- Main -->
            <div id="main">

            <!-- Introduction -->
            <section id="intro" class="main">

            <?php if ($verification) { ?>

                <center><h1><b>Vous disposez déjà d'un stage ! Vous allez bientôt être redirigé vers la page
                            d'accueil.</b></h1></center>


                <?php header("refresh:5;url=./../../home.php");
            } elseif ($tuteur) { ?>

                <h2 id="form" align="center" style="margin-bottom:150px;">Récapitulatif des données
                    sélectionnées</font></h2>

                <form method="GET" action="./../../home.php">

                    <table>
                        <tr>
                            <th>Vous êtes:</th>
                            <td><?php echo $eleve ?> </td>
                        </tr>
                        <tr>
                            <th>L'entreprise que vous avez sélectionné:</th>
                            <td><input type=hidden><?php echo $ent ?></td>
                        </tr>
                        <tr>
                            <th>Le tuteur que vous avez sélectionné:</th>
                            <td><input type=hidden name="tut"
                                       value="<?php echo $tuteur ?>"><?php echo tuteur_getLabel($tuteur) ?></td>
                        </tr>

                    </table>
                    <center>
                        <?php if (($_SESSION['role']=="eleve")) { ?>
                            <button type="submit" value="ajout" style="font-size: 20px">Valider ces informations</button>
                        <?php } ?>
                    </center>

                </form>

                <?php
            } else { ?>

                <center><h2><b>Vous n'avez pas choisi de tuteur, vous allez être redirigé vers le formulaire</b></h2>
                </center>

                <?php header("refresh:5;url=formulaireStage.php");
            }
        } ?>
        </section>

        </div>

        <!-- Footer -->
        <footer id="footer">
            <section>

            </section>


        </footer>

    </div>

        <!-- Scripts -->
        <script src="./../../assets/js/jquery.min.js"></script>
        <script src="./../../assets/js/jquery.scrollex.min.js"></script>
        <script src="./../../assets/js/jquery.scrolly.min.js"></script>
        <script src="./../../assets/js/skel.min.js"></script>
        <script src="./../../assets/js/util.js"></script>
        <script src="./../../assets/js/ie/respond.min.js"></script>
        <script src="./../../assets/js/main.js"></script>

        </body>


        </html>

        <?php
    }
else {
    header ('location: ./erreur.php');
}
?>