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

    $nomEntreprise = "";
    $villeEntreprise = "";
    $cpEntreprise = "";
    $adresseEntreprise = "";
    $mailEntreprise = "";
    $telEntreprise= "";
    $activite= "";
    $active= "";

    if (isset ( $_GET ["ent"] )) {
        $uneEntreprise = entreprise_getByID ( $_GET ["ent"] );
        $id = $uneEntreprise->idEntreprise;
        $nomEntreprise = $uneEntreprise->nomEntreprise;
        $villeEntreprise = $uneEntreprise->villeEntreprise;
        $cpEntreprise = $uneEntreprise->cpEntreprise;
        $adresseEntreprise = $uneEntreprise->adresseEntreprise;
        $mailEntreprise = $uneEntreprise->mailEntreprise;
        $telEntreprise = $uneEntreprise->telEntreprise;
        $activite = $uneEntreprise->activiteEntreprise;
        $active = $uneEntreprise->active;


        if (isset ( $_GET ["nomEntreprise"] ) && isset ( $_GET ["villeEntreprise"] ) && isset ( $_GET ["cpEntreprise"] ) && isset ( $_GET ["adresseEntreprise"] ) && isset ( $_GET ["mailEntreprise"] ) && isset($_GET["telEntreprise"]) && isset($_GET["activite"]) && isset($_GET["active"])) {
            $nomEntreprise = $_GET ["nomEntreprise"];
            $villeEntreprise = $_GET ["villeEntreprise"];
            $cpEntreprise = $_GET ["cpEntreprise"];
            $adresseEntreprise = $_GET ["adresseEntreprise"];
            $mailEntreprise = $_GET ["mailEntreprise"];
            $telEntreprise = $_GET["telEntreprise"];
            $activite = $_GET["activite"];
            $active = $_GET["active"];
            $modif_ok = modifEnt( $id, $nomEntreprise, $villeEntreprise, $cpEntreprise, $adresseEntreprise, $mailEntreprise, $telEntreprise, $activite, $active);
            if ($modif_ok) {
                header ( 'location: listeEntreprises.php' );
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
        <form method="GET" action="modifEnt.php">

        <table class="table-condensed">
        <tr>
        <td><input type="hidden" name="ent" value="<?php echo $id ?>"></td>
        </tr>
        <tr>
        <td><font size=4>Nom de l'entreprise:</font></td>
    <td><font size=4><input type="text" name="nomEntreprise" value="<?php echo $nomEntreprise ?>"></font></td>

    </tr>
    <td><font size=4>Secteur d'activité de l'entreprise:</font></td>
    <td><font size=4><select type="text" name="activite" >
        <option value=<?php echo $activite ?><?php echo $activite ?></option>
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
        </font></td>
    <tr>
    <td><font size=4>Ville de l'entreprise:</font></td>
    <td><font size=4><input type="text" name="villeEntreprise" value="<?php echo $villeEntreprise ?>"></font></td>
    </tr>
    <tr>
    <td><font size=4>Code postal de la ville:</font></td>
    <td><font size=4><input type="number" name="cpEntreprise" value="<?php echo $cpEntreprise ?>"></font></td>
    </td>
    </tr>
    <tr>
    <td><font size=4>Adresse de l'entreprise:</font></td>
    <td><font size=4><input type="text" name="adresseEntreprise" value="<?php echo $adresseEntreprise ?>"></font></td>
    </tr>
    <tr>
    <td><font size=4>Adresse email de l'entreprise: </font></td>
    <td><font size=4><input type="text" name="mailEntreprise" value="<?php echo $mailEntreprise?>"></font></td>
    </tr>
    <tr>
    <td><font size=4>Numéro de téléphone de l'entreprise: </font></td>
    <td><font size=4><input type="text" name="telEntreprise" value="<?php echo $telEntreprise ?>"></font></td>
    </tr>
    <tr>
    <td><font size=4>Entreprise en activité: </font></td>
    <td><select type="number" name="active">
        <?php if($active==1){?>
        <option value="<?php echo $active ?>">Oui</option>
        <?php } else{ ?>
        <option value="<?php echo $active ?>">Non</option>
        <?php } ?>
        <option value="1">Oui</option>
        <option value="0">Non</option>
        </select></font></td>
    </tr>

    </table>

    <center><button type="submit" class="btn btn-primary" id="update" style="font-size:20px"> Valider les modifications </button></center>

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