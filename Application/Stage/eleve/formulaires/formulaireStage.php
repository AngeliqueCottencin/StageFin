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
    require_once('./../..//models/fonctions.php');
    $filtre = "";
    $listeEleves = listeEleves($filtre);

    $listeEntreprises = listeEntreprisesPourEleves($filtre);
    if (isset($_GET["ent"])) {
        $listeTuteurs = listeTuteursPourEleves($_GET["ent"]);
        $entreprise = $_GET["ent"];
    }

    $verification = eleveAvecStagePasAccesFormulaire($_SESSION['id']);
    ?>
    <body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="./../../images/logo.svg" alt=""/></span>
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
                } else { ?>

                    <h3 id="form" align="center" style="margin-bottom:150px;">Vous êtes priés de remplir ce formulaire
                        si vous disposez d'un stage</font></h3>

                    <form method="GET" action="formulaireStage.php">

                        <table>

                            <?php if (isset($_GET["ent"])) { ?>


                            <?php } else { ?>
                                <tr>
                                    <td><font size=5>L'entreprise qui vous accueille:</font></td>
                                    <td><font size=5>
                                            <select name="ent"
                                                    onChange="location.href='formulaireStage.php?ent='+this.options[this.selectedIndex].value+'.html';">
                                                <?php foreach ($listeEntreprises

                                                as $entreprise){ ?>
                                                <option></option>
                                                <option value="<?php echo $entreprise->idEntreprise ?>"> <?php echo $entreprise->nomEntreprise . " (" . $entreprise->villeEntreprise . ")" ?>
                                                    <?php } ?>
                                            </select>
                                        </font></td>
                                </tr>
                                <tr>
                                    <td><a href="formulaireEntreprise.php">Vous ne trouvez pas votre entreprise dans
                                            cette liste ? cliquez ici !</a></td>
                                </tr>
                            <?php } ?>


                            <?php

                            if (isset($_GET["ent"])) {
                                $entreprise = $_GET["ent"];
                                list($lentreprise, $html) = explode(".", $entreprise);
                                if ($lentreprise) {
                                    ?>
                                    <center><h2><b> Vous avez sélectionné l'entreprise
                                                suivante: <?php echo entreprise_getLabel($lentreprise); ?> </b></h2>
                                    </center>

                                    <tr>
                                        <td><font size=5>Votre tuteur:</font></td>
                                        <td><font size=5>
                                                <select name="idTuteur"
                                                        onChange="location.href='verificationInfos.php?tut='+this.options[this.selectedIndex].value+'.php';">
                                                    <?php

                                                    foreach ($listeTuteurs as $tuteur) { ?>"
                                                        <option></option>
                                                        <option value="<?php echo $tuteur->idTuteur ?>"> <?php echo "M/Mme " . $tuteur->nomTuteur . " (" . entreprise_getLabel($tuteur->idEntreprise) . ")" ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </font></td>
                                    </tr>
                                    <tr>
                                        <td><a href="formulaireTuteur.php">Vous ne trouvez pas votre tuteur dans cette
                                                liste ? cliquez ici !</a></td>
                                    </tr>
                                <?php } else { ?>
                                    <h2>Vous n'avez sélectionné aucune entreprise, vous allez être redirigé vers le
                                        formulaire</h2>
                                    <?php header("refresh:5;url=formulaireStage.php");
                                }
                            } ?>


                        </table>
                    </form>

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


