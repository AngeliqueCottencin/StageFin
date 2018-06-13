<?php
session_start();
if (($_SESSION['role']=="Prof")||($_SESSION['role']=="eleve")) {
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
		<title>Stage | Aide</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1>Stages de découverte 3eme</h1>
						<p></p>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href=Home.php>Accueil</a></li>
							<li><a href=Eleve/listEntreprise.php>Liste des entreprises</a></li>
							<li><a href=FormulaireStage.php>Formulaire</a></li>
							<li><a href=Aide.php>Aide</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							
						</section>
						<section>
							
						</section>
		
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php
} 
else { 
	header ('location: ./erreur.php');
} 
?>