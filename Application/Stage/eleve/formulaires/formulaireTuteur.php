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

    require_once('./../../models/fonctions.php');
    $msg = "";
    if(isset($_POST["nomTut"]) && isset($_POST["prenomTut"]) && isset($_POST["mail"]) && isset($_POST["tel"]) && isset($_POST["idEnt"])){
        $nom = $_POST["nomTut"];
        $prenom =$_POST["prenomTut"];
        $mail = $_POST["mail"];
        $tel =$_POST["tel"];
        $ident=$_POST["idEnt"];
        if(empty($nom) || empty($prenom) || empty($mail) || empty($tel) || empty($ident)){
            $msg = "Veuillez remplir TOUS les champs";
        } else {
            tuteur_add($_POST["nomTut"], $_POST["prenomTut"], $_POST["mail"],  $_POST["tel"], $_POST["idEnt"]);
            header("location: formulaireStage.php");
        }
    }
    $filtre = "";
    $liste = listeEntreprisesPourEleves($filtre);
    /*foreach($liste as $data) {
        $nom = entreprise_getLabel($data->idEntreprise);
        $idEntreprise = entreprise_getById($data->idEntreprise);
    }*/
    ?>
    <body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="./../../images/logo.svg" alt="" /></span>
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


                <center><h2><b><font color="red"><?php echo $msg; ?></font></b></h2></center>

                <h2>Les informations sur votre tuteur, responsable de vous durant votre stage :</h2>
                <form method="POST" action="formulaireTuteur.php">


                    <table>
                        <tr>
                            <td><font size=5>Nom de votre tuteur:</font></td>
                            <td><font size=5><input type="text" name="nomTut"
                                                    placeholder=""></font></td>
                        </tr>
                        <tr>
                            <td><font size=5>Prénom de votre tuteur:</font></td>
                            <td><font size=5><input type="text" name="prenomTut"
                                                    placeholder=""></font></td>
                        </tr>
                        <tr>
                            <td><font size=5>Adresse mail de votre tuteur:</font></td>
                            <td><font size=5><input type="text" name="mail" placeholder=""></font></td>
                        </tr>
                        <tr>
                            <td><font size=5>Numéro de téléphone de votre tuteur:</font></td>
                            <td><font size=5><input type="text" name="tel" placeholder=""></font></td>

                        </tr>

                        <tr>
                            <td><font size=5>Sélectionnez l'entreprise à laquelle il appartient:</font></td>
                            <td><font size=5>
                                    <select name="idEnt">
                                        <?php foreach($liste as $entreprise){ ?>
                                            <option value="<?php echo $entreprise->idEntreprise ?>"> <?php echo $entreprise->nomEntreprise?></option>
                                        <?php } ?>
                                    </select>
                                </font></td>
                        </tr>
                    </table>
                    <center><button type="submit" value="ajout" style="font-size: 20px"> Ajoutez votre tuteur à la liste des tuteurs</button></center>
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