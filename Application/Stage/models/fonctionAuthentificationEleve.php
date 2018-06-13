<?php

require_once('connect-db.php');

function getAuthentificationEleve($login, $pass){
	global $pdo;
	$query = "SELECT * FROM usereleve WHERE login=:login AND password=:pass";

	$prep = $pdo->prepare($query);
	$prep->bindValue(':login', $login);
	$prep->bindValue(':pass', $pass);
	$prep->execute();
	
	// on vérifie que la requete renvoie bien une ligne
	if($prep->rowCount() == 1){
		$result = $prep->fetch(PDO::FETCH_ASSOC);
		if ($result['present']==1){
			return $result;
		}
	}
	else{
		return false;
	}
	
}

?>