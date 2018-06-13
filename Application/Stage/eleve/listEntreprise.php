<?php
session_start();
if (($_SESSION['role']=="prof")||($_SESSION['role']=="eleve")) {
    // Ajout de rôles ||$_SESSION['role']=="gestionnaire")){
    ?>

    <!DOCTYPE HTML>
    <!--
        Stellar by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->

    <html>
    <head>
        <title>Stage | Liste d'entreprises</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="./../assets/js/ie/html5shiv.js"></script>
        <link rel="stylesheet" href="./../assets/css/main.css" />
        <link rel="stylesheet" href="./../assets/css/ie9.css" />
        <link rel="stylesheet" href="./../assets/css/ie8.css" />
    </head>
    <?php
    require_once('./../models/fonctions.php');

    $filtre = "";
    if (isset ( $_GET ["query"] )) {
        $filtre = $_GET ["query"];
    }

    $listeEntreprises = listeEntreprisesPourEleves($filtre);
    ?>
    <body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="./../images/logo.svg" alt="" /></span>
            <h1>Stages de découverte 3eme</h1>
            <p></p>
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
                <li><a href=listEntreprise.php>Liste des entreprises</a></li>
                <li><a href=./formulaires/formulaireStage.php>J'ai un stage!</a></li>
                <li><a href=aide.php>Aide</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">

            <!-- Introduction -->
            <section id="intro" class="main">
                
                <center><form method="get" action="listEntreprise.php" style="margin-bottom: 70px;">
                        <font size=5><b>Recherche : </b></font>
                        <select style="font-size:15px; width: 300px" type="search" id="search" placeholder="Rechercher une entreprise" name="query" value="<?php echo $filtre?>">
                                        <option value="Agriculture ">Agriculture</option>
                                        <option value="Agroalimentaire">Agroalimentaire</option>
                                        <option value="Art/Spectacle">Art/Spectacle</option>
                                        <option value="Banque/Assurance/Finance">Banque/Assurance</option>
                                        <option value="BTP">BTP</option>
                                        <option value="Commerce/Distribution">Commerce/Distribution</option>
                                        <option value="Droit/Justice">Droit/Justice</option>
                                        <option value="Economie/Gestion">Economie/Gestion</option>
                                        <option value="Enseignement">Enseignement</option>
                                        <option value="Environnement">Environnement</option>
                                        <option value="Fonction publique">Fonction publique</option>
                                        <option value="Hôtelerie">Hôtelerie</option>
                                        <option value="Industrie">Industrie</option>
                                        <option value="Journalisme">Journalisme</option>
                                        <option value="Logistique">Logistique</option>
                                        <option value="Multimedia/Audiovisuel/Informatique">Multimedia/Audiovisuel/Informatique</option>
                                        <option value="Santé ">Santé </option>
                                        <option value="Sciences humaines">Sciences humaines</option>
                                        <option value="Sécurité">Sécurité</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Tourisme">Tourisme</option>
                                        <option value="Transports">Transports</option>
                                        <option value="Autre secteur">Autre</option>

                        </select>
                        <input style ="margin-bottom: -15px" name="submit" id="s" type="image" src="./../images/search-icon.svg">
                    </form></center>


                <table class="table table-bordered">


                    <div class="table-wrapper">

                        <tr>
                            <th><center><h2><b> Nom </b></h2></center></th>
                            <th><center><h2><b> Secteur d'activité </b></h2></center></th>
                            <th><center><h2><b> Adresse </b></h2></center></th>
                            <th><center><h2><b> Géolocalisation </b></h2></center></th>
                        </tr>
                        <?php foreach ($listeEntreprises as $entreprise){ ?>

                            <tr>
                                <td><center><?php echo $entreprise->nomEntreprise; ?></center></td>
                                <td><center><?php echo $entreprise->activiteEntreprise; ?></center></td>
                                <td><center><?php
                                        $adr =$entreprise->adresseEntreprise." (".$entreprise->cpEntreprise.", ".$entreprise->villeEntreprise.") ";
                                        echo $adr;
                                        ?></center></td>
                                <td><center><?php

                                        $test = $entreprise->nomEntreprise." ".$entreprise->villeEntreprise." ".$entreprise->cpEntreprise." ".$entreprise->adresseEntreprise;
                                        $val= str_replace(' ', '+', $test);
                                        $url= "https://www.google.fr/maps/dir/College+Les+Capucins,+Route+de+Voisenon,+77000+Melun/".$val;
                                        ?>
                                        <a href=<?php echo $url;?> class="button small" TARGET=_BLANK><b>Clique ici!</b></a></center></td>
                            </tr>

                        <?php } ?>
                </table>
                <a href="formulaires/formulaireEntreprise.php" class="button fit">Clique ici si tu veux ajouter une entreprise!</a>
        </div>
    </div>
    <!-- Footer -->
    <footer id="footer">
        <section>

        </section>
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
    <script src="./../assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="./../assets/js/main.js"></script>

    </body>
    </html>
    <?php
}
else {
    header ('location: ./erreur.php');
}
?>