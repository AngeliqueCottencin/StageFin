<?php
require_once("./models/fonctionAuthentificationProf.php");

//on test si les champs sont remplis, puis s'ils sont vrais (existent) ou faux
if (isset($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['login']) && !empty($_POST['pwd'])){
	
	
	//on fait appelà la fonction getAuthentification et on lui passe en paramètre login et password
	$result = getAuthentificationProf($_POST['login'], $_POST['pwd']);
	
	//var_dump($result);
	if($result){ // si $result est vrai
		
		session_start();
		
		$_SESSION['id'] = $result['idUserProf'];
		$_SESSION['login'] = $result['login'];
		$_SESSION['role'] = $result['role'];
		
		header ('location: ./home.php');
	}
	
	else{ // si $result est faux
		header('location: authentificationProf.php');
	}
	
	
}

// si rien n'est renseigné, on redirige l'utilisateur vers la page d'authentification
else{
	header('location: authentificationProf.php');
}
?>