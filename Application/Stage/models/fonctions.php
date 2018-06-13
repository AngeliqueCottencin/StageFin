<?php

require_once('connect-db.php');

//fonctions pour ajouter des données à la bases par des formulaires
function eleve_add($nom, $prenom, $classe, $anneesco, $login, $password) {
	global $pdo;
	$req = "INSERT INTO usereleve(nomEleve, prenomEleve, classeEleve, anneeScolaire, login, password) VALUES (:nom, :prenom, :classe, :anneesco, :login, :password);";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":nom", $nom, PDO::PARAM_STR );
	$query->bindValue ( ":prenom", $prenom, PDO::PARAM_STR );
	$query->bindValue ( ":classe", $classe, PDO::PARAM_INT );
	$query->bindValue ( ":anneesco", $anneesco, PDO::PARAM_STR );
	$query->bindValue(":login", $login, PDO::PARAM_STR);
	$query->bindValue(":password", $password, PDO::PARAM_STR);
	return $query->execute ();
}

function entreprise_add($nomEnt, $ville, $cp, $adresse, $mail, $tel, $activite) {
	global $pdo;

	$req = "INSERT INTO entreprise(nomEntreprise, villeEntreprise, cpEntreprise, adresseEntreprise, mailEntreprise, telEntreprise, activiteEntreprise) VALUES (:nomEnt, :ville, :cp, :adresse, :mail, :tel, :activite);";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":nomEnt", $nomEnt, PDO::PARAM_STR );
	$query->bindValue ( ":ville", $ville, PDO::PARAM_STR );
	$query->bindValue ( ":cp", $cp, PDO::PARAM_INT );
	$query->bindValue ( ":adresse", $adresse, PDO::PARAM_STR );
	$query->bindValue(":mail", $mail, PDO::PARAM_STR);
	$query->bindValue(":tel", $tel, PDO::PARAM_STR);
	$query->bindValue(":activite", $activite, PDO::PARAM_STR);	
	return $query->execute ();
}


function tuteur_add($nomTut, $prenomTut, $mail, $tel, $idEnt) {
	global $pdo;

	$req = "INSERT INTO tuteur(nomTuteur, prenomTuteur, mailTuteur, telTuteur, idEntreprise) VALUES (:nomTut, :prenomTut, :mail, :tel, :idEnt);";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":nomTut", $nomTut, PDO::PARAM_STR );
	$query->bindValue ( ":prenomTut", $prenomTut, PDO::PARAM_STR );
	$query->bindValue ( ":mail", $mail, PDO::PARAM_STR );
	$query->bindValue ( ":tel", $tel, PDO::PARAM_STR );
	$query->bindValue ( ":idEnt", $idEnt, PDO::PARAM_INT);	
	return $query->execute ();
}

function stage_add($idEleve, $idTuteur, $dateDuJour){
	global $pdo;

	$req= "INSERT INTO stage(idUserEleve, idUserProf, idTuteur, dateStage) VALUES (:idEleve, 1, :idTuteur, :dateDuJour);";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":idEleve", $idEleve, PDO::PARAM_INT);
	$query->bindValue ( ":idTuteur", $idTuteur, PDO::PARAM_INT);
	$query->bindValue ( ":dateDuJour", $dateDuJour, PDO::PARAM_STR);	
	return $query->execute();
}

function prof_add($nom, $prenom, $login, $password){
	global $pdo;
	$req="INSERT INTO userprof(nomProf, prenomProf, login, password) VALUES (:nom, :prenom, :login, :password);";
	$query = $pdo->prepare($req);
	$query->bindValue(":nom", $nom, PDO::PARAM_STR);
	$query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
	$query->bindValue(":login", $login, PDO::PARAM_STR);
	$query->bindValue(":password", $password, PDO::PARAM_STR);
	return $query->execute();	
}

//fonctions qui donnent accès à toutes les données de chaque table 
function listeEntreprisesPourEleves($filtre) {
	global $pdo;
	if (isset ( $filtre ) && ($filtre) != "") {
		$req = "SELECT * FROM entreprise WHERE activiteEntreprise LIKE :filtre_activite OR villeEntreprise LIKE :filtre_ville ;";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":filtre_activite", "%" . $filtre . "%", PDO::PARAM_STR );
		$query->bindValue ( ":filtre_ville", "%" . $filtre . "%", PDO::PARAM_STR );
	} else {
		$req = "SELECT * FROM entreprise WHERE active = 1 ORDER BY villeEntreprise ASC; ";
		$query = $pdo->prepare ( $req );
	}
	$query->execute ();
	return $query->fetchAll();
}

function listeEntreprises() {
	global $pdo;
	$req = "SELECT * FROM entreprise ;";
	$query = $pdo->prepare ( $req );
	$query->execute ();
	return $query->fetchAll();
}

function listeTuteursPourEleves($idEnt){
	global $pdo;
	$req = "SELECT * FROM tuteur WHERE idEntreprise = :idEnt; ";
	$query = $pdo->prepare($req);
	$query->bindValue(":idEnt", $idEnt, PDO::PARAM_INT);
	$query->execute();
	return $query->fetchAll();
}

function listeTuteurs(){
	global $pdo;
	$req = "SELECT * FROM tuteur ; ";
	$query = $pdo->prepare($req);
	$query->execute();
	return $query->fetchAll();
}

function listeEleves($filtre){
	global $pdo;
	if (isset ( $filtre ) && ($filtre) != "") {
		$req = "SELECT * FROM usereleve WHERE anneeScolaire LIKE :filtre_annee ;";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":filtre_annee", "%" . $filtre . "%", PDO::PARAM_STR );
	} else {
		$req = "SELECT * FROM usereleve ;";
		$query = $pdo->prepare($req);
	}
	$query->execute();
	return $query->fetchAll();

}

//deux fonction pour récuperer le nom de l'entreprise en lui passant un id venant d'une autre table
function entreprise_getByID($id) {
	global $pdo;
	$req = "SELECT * FROM entreprise e where e.idEntreprise=:id;";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":id", $id, PDO::PARAM_INT );
	$query->execute ();
	return $query->fetch ();
}

function entreprise_getLabel($id) {
	$entreprise = entreprise_getByID ( $id );
	if ($entreprise != null) {
		return $entreprise->nomEntreprise . " (" . $entreprise->villeEntreprise.")";
	} else {
		
	}
}



//fonctions pour les professeur

//liste des stages qui ne sont suivis par aucun professeur
function listeStageFantome(){
	global $pdo;
	$req="SELECT * FROM usereleve, userprof, entreprise, tuteur, stage WHERE usereleve.idUserEleve = stage.idUserEleve AND userprof.idUserProf = stage.idUserProf AND entreprise.idEntreprise = tuteur.idEntreprise AND tuteur.idTuteur = stage.idTuteur AND userprof.role = 'profFantome' ; ";
	$query = $pdo->prepare ( $req );
	$query->execute ();
	return $query->fetchAll ();	
}

//afficher les détails du tuteur avec tableau
function tuteur_getByIDFetchAll($idTuteur) {
	global $pdo;
	$req = "SELECT * FROM tuteur where idTuteur=:idTuteur;";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":idTuteur", $idTuteur, PDO::PARAM_INT );
	$query->execute ();
	return $query->fetchAll ();
}

//afficher les détails du tuteur sans tableau
function tuteur_getByID($idTuteur) {
	global $pdo;
	$req = "SELECT * FROM tuteur where idTuteur=:idTuteur;";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":idTuteur", $idTuteur, PDO::PARAM_INT );
	$query->execute ();
	return $query->fetch ();
}

function tuteur_getLabel($id) {
	$tuteur = tuteur_getByID ( $id );
	if ($tuteur == null) {
		echo "Ce tuteur n'existe pas.";
	} else {
		return $tuteur->nomTuteur . " " . $tuteur->prenomTuteur;
	}
}

//button pour que le prof connecter suive l'élève choisi
function updateEleveNonSuivi($idUserProf, $idUserEleve){
	global $pdo;
	$req = "UPDATE stage SET idUserProf = :idUserProf WHERE idUserEleve = :idUserEleve; ";
	$query = $pdo->prepare($req);
	$query->bindValue(":idUserProf", $idUserProf, PDO::PARAM_INT);
	$query->bindValue(":idUserEleve", $idUserEleve, PDO::PARAM_INT);
	return $query->execute();
}

//button pour que le prof qui s'est par hasard trompé dans sa manip' ne suive plus l'élève choisi
function nePlusSuivre( $idUserEleve){
	global $pdo;
	$req = "UPDATE stage SET idUserProf = 1 WHERE idUserEleve = :idUserEleve; ";
	$query = $pdo->prepare($req);
	$query->bindValue(":idUserEleve", $idUserEleve, PDO::PARAM_INT);
	return $query->execute();
}

function listeStage_ByLoginProf($loginProf){
	global $pdo;
	$req="SELECT * FROM usereleve, userprof, entreprise, tuteur, stage WHERE usereleve.idUserEleve = stage.idUserEleve AND userprof.idUserProf = stage.idUserProf AND entreprise.idEntreprise = tuteur.idEntreprise AND tuteur.idTuteur = stage.idTuteur AND userprof.login = :loginProf ; ";
	$query = $pdo->prepare ( $req );
	$query->bindValue(":loginProf", $loginProf, PDO::PARAM_STR);	
	$query->execute ();
	return $query->fetchAll ();	
}


function compterLesStages(){
	global $pdo;
	$req="SELECT COUNT(stage.idStage) FROM usereleve, stage WHERE usereleve.idUserEleve = stage.idUserEleve AND usereleve.present=1" ;
	$countStages=$pdo->prepare ( $req );
	$countStages->execute();
	$nb_stages = $countStages->fetchColumn();
	return $nb_stages;

}

function compterLesEleves(){
	global $pdo;
	$count = "SELECT COUNT(idUserEleve) as nb_eleves FROM usereleve WHERE present=1";
	$countEleves=$pdo->prepare ( $count );
	$countEleves->execute();
	$nb_eleves = $countEleves->fetchColumn();
	return $nb_eleves;
}

//admin

	function listeProfs(){
		global $pdo;
		$req = "SELECT * FROM userprof ;";
		$query = $pdo->prepare($req);
		$query->execute();
		return $query->fetchAll();

	}

	function entreprise_getByIDFetchAll($id) {
		global $pdo;
		$req = "SELECT * FROM entreprise e where e.idEntreprise=:id;";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":id", $id, PDO::PARAM_INT );
		$query->execute ();
		return $query->fetchAll ();
	}

	function listeStages(){
		global $pdo;
		$req="SELECT * FROM usereleve, userprof, entreprise, tuteur, stage WHERE usereleve.idUserEleve = stage.idUserEleve AND userprof.idUserProf = stage.idUserProf AND entreprise.idEntreprise = tuteur.idEntreprise AND tuteur.idTuteur = stage.idTuteur AND usereleve.present = 1; ";
		$query = $pdo->prepare ( $req );
		$query->execute ();
		return $query->fetchAll ();	
	}


	function listeAnciensStages($filtre){
		global $pdo;
		if(isset ( $filtre ) && ($filtre) != ""){
			$req="SELECT * FROM usereleve, userprof, entreprise, tuteur, stage WHERE usereleve.idUserEleve = stage.idUserEleve AND userprof.idUserProf = stage.idUserProf AND entreprise.idEntreprise = tuteur.idEntreprise AND tuteur.idTuteur = stage.idTuteur AND usereleve.present = 0 AND usereleve.anneeScolaire LIKE :filtre_annee; ";			
			$query = $pdo->prepare ( $req );
			$query->bindValue ( ":filtre_annee", "%" . $filtre . "%", PDO::PARAM_STR );
						
		} else{
			$req="SELECT * FROM usereleve, userprof, entreprise, tuteur, stage WHERE usereleve.idUserEleve = stage.idUserEleve AND userprof.idUserProf = stage.idUserProf AND entreprise.idEntreprise = tuteur.idEntreprise AND tuteur.idTuteur = stage.idTuteur AND usereleve.present = 0; ";			
			$query = $pdo->prepare ( $req );
			
		}
		$query->execute ();
		return $query->fetchAll ();	
	}

	//details Eleve pour liste avec tableau
	function eleve_getByIDFetchAll($idEleve) {
		global $pdo;
		$req = "SELECT * FROM usereleve where idUserEleve=:idEleve;";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":idEleve", $idEleve, PDO::PARAM_INT );
		$query->execute ();
		return $query->fetchAll ();
	}

	//details pour avoir un eleve sans tableau
	function eleve_getByID($idEleve) {
		global $pdo;
		$req = "SELECT * FROM usereleve where idUserEleve=:idEleve;";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":idEleve", $idEleve, PDO::PARAM_INT );
		$query->execute ();
		return $query->fetch ();
	}

	function eleve_getLabel($id) {
		$eleve = eleve_getByID ( $id );
		if ($eleve == null) {
			echo "Cet élève n'existe pas.";
		} else {
			return $eleve->nomEleve . " " . $eleve->prenomEleve;
		}
	}

	//details Prof avec tableau
	function prof_getByIDFetchAll($idProf) {
		global $pdo;
		$req = "SELECT * FROM userprof where idUserProf=:idProf;";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":idProf", $idProf, PDO::PARAM_INT );
		$query->execute ();
		return $query->fetchAll ();
	}

	//details pour un prof sans tableau
	function prof_getByID($idProf) {
		global $pdo;
		$req = "SELECT * FROM userprof where idUserProf=:idProf;";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":idProf", $idProf, PDO::PARAM_INT );
		$query->execute ();
		return $query->fetch ();
	}

	//afficher la liste des élèves sans stage
	function elevesSansStage(){
		global $pdo;
		$req="SELECT * FROM usereleve WHERE idUserEleve NOT IN (SELECT idUserEleve FROM stage);";
		$query = $pdo->prepare($req);
		$query->execute();
		return $query->fetchAll();
	}

	//fonctions modif !

	//modifier les infos d'un élève
	function modifEleve($idEleve, $nomEleve, $prenomEleve, $classeEleve, $anneeSco, $loginEleve, $passEleve){
		global $pdo;
		$req="UPDATE usereleve SET nomEleve = :nomEleve, prenomEleve = :prenomEleve, classeEleve = :classeEleve, anneeScolaire = :anneeSco, login = :loginEleve, password = :passEleve WHERE idUserEleve = :idEleve;  ";
		$query = $pdo->prepare($req);
		$query->bindValue ( ":nomEleve", $nomEleve, PDO::PARAM_STR);
		$query->bindValue ( ":prenomEleve", $prenomEleve, PDO::PARAM_STR);
		$query->bindValue ( ":classeEleve", $classeEleve, PDO::PARAM_INT);
		$query->bindValue ( ":anneeSco", $anneeSco, PDO::PARAM_STR);
		$query->bindValue ( ":loginEleve", $loginEleve, PDO::PARAM_STR);
		$query->bindValue ( ":passEleve", $passEleve, PDO::PARAM_STR);
		$query->bindValue ( ":idEleve", $idEleve, PDO::PARAM_INT);
		return $query->execute();

	}

	//modifier les infos d'un prof
	function modifProf($idProf, $nomProf, $prenomProf, $loginProf, $passProf){
		global $pdo;
		$req="UPDATE userprof SET nomProf = :nomProf, prenomProf = :prenomProf, login = :loginProf, password = :passProf WHERE idUserProf = :idProf;  ";
		$query = $pdo->prepare($req);
		$query->bindValue ( ":nomProf", $nomProf, PDO::PARAM_STR);
		$query->bindValue ( ":prenomProf", $prenomProf, PDO::PARAM_STR);
		$query->bindValue ( ":loginProf", $loginProf, PDO::PARAM_STR);
		$query->bindValue ( ":passProf", $passProf, PDO::PARAM_STR);
		$query->bindValue ( ":idProf", $idProf, PDO::PARAM_INT);
		return $query->execute();

	}

	function modifEnt($idEnt, $nomEnt, $villeEnt, $cpEnt, $adresseEnt, $mailEnt, $telEnt, $activite, $active){
		global $pdo;
		$req="UPDATE entreprise SET nomEntreprise = :nomEnt, villeEntreprise = :villeEnt, cpEntreprise = :cpEnt, adresseEntreprise = :adresseEnt , mailEntreprise = :mailEnt, telEntreprise = :telEnt, activiteEntreprise = :activite, active = :active WHERE idEntreprise = :idEnt;  ";
		$query = $pdo->prepare($req);
		$query->bindValue ( ":nomEnt", $nomEnt, PDO::PARAM_STR);
		$query->bindValue ( ":villeEnt", $villeEnt, PDO::PARAM_STR);
		$query->bindValue ( ":cpEnt", $cpEnt, PDO::PARAM_INT);
		$query->bindValue ( ":adresseEnt", $adresseEnt, PDO::PARAM_STR);
		$query->bindValue ( ":mailEnt", $mailEnt, PDO::PARAM_STR);
		$query->bindValue ( ":telEnt", $telEnt, PDO::PARAM_STR);
		$query->bindValue ( ":activite", $activite, PDO::PARAM_STR);
		$query->bindValue ( ":active", $active, PDO::PARAM_INT);
		$query->bindValue ( ":idEnt", $idEnt, PDO::PARAM_INT);
		return $query->execute();

	}

	function modifTuteur($idTut, $nomTut, $prenomTut, $mailTut, $telTut, $idEnt){
		global $pdo;
		$req="UPDATE tuteur SET nomTuteur = :nomTut, prenomTuteur = :prenomTut, mailTuteur = :mailTut, telTuteur= :telTut, idEntreprise = :idEnt WHERE idTuteur = :idTut;  ";
		$query = $pdo->prepare($req);
		$query->bindValue ( ":nomTut", $nomTut, PDO::PARAM_STR);
		$query->bindValue ( ":prenomTut", $prenomTut, PDO::PARAM_STR);
		$query->bindValue ( ":mailTut", $mailTut, PDO::PARAM_STR);
		$query->bindValue ( ":telTut", $telTut, PDO::PARAM_STR);
		$query->bindValue ( ":idEnt", $idEnt, PDO::PARAM_INT);
		$query->bindValue ( ":idTut", $idTut, PDO::PARAM_INT);
		return $query->execute();

	}


	
function eleveAvecStagePasAccesFormulaire($id){
	global $pdo;

	$req = "SELECT * FROM stage WHERE idUserEleve =:id ;";
	$query = $pdo->prepare($req);
	$query->bindValue(":id", $id, PDO::PARAM_INT);
	$query->execute();
	return $query->fetchAll();
}


function standByUnProf($id){
	global $pdo;
	
	$req="UPDATE userprof SET userprof.present = 0  WHERE userprof.idUserProf = :id";
	$query=$pdo->prepare($req);
	$query->bindValue ( ":id", $id, PDO::PARAM_INT);	
	return $query->execute();
}

function standByUnProfEtRemplaceParFantome($id){
	$standByProf = standByUnProf($id);
	if($standByProf){
		global $pdo;
		
		$req = "UPDATE stage SET idUserProf = 1 WHERE idUserProf = :id";
		$query=$pdo->prepare($req);
		$query->bindValue ( ":id", $id, PDO::PARAM_INT);	
		return $query->execute();
	} else {
		global $pdo;
		
		$req="UPDATE userprof SET userprof.present = 0  WHERE userprof.idUserProf = :id";
		$query=$pdo->prepare($req);
		$query->bindValue ( ":id", $id, PDO::PARAM_INT);	
		return $query->execute();
	}
}

function annulerStandByUnProf($id){
	global $pdo;

	$req = "UPDATE userprof SET present = 1 WHERE idUserProf = :id";
	$query = $pdo->prepare($req);
	$query->bindValue(":id", $id, PDO::PARAM_INT);
	return $query->execute();
}


function standByUnEleve($id){
	global $pdo;

	$req="UPDATE usereleve SET present = 0 WHERE idUserEleve = :id";
	$query=$pdo->prepare($req);
	$query->bindValue ( ":id", $id, PDO::PARAM_INT);	
	return $query->execute();
}

function standByElevesByAnnee($annee){
	global $pdo;

	$req="UPDATE usereleve SET present=0 WHERE anneeScolaire = :annee ;";
	$query=$pdo->prepare($req);
	$query->bindValue ( ":annee", $annee, PDO::PARAM_STR);
	return $query->execute();

}

function annulerStandByUnEleve($id){
	global $pdo;

	$req = "UPDATE usereleve SET present = 1 WHERE idUserEleve = :id";
	$query = $pdo->prepare($req);
	$query->bindValue(":id", $id, PDO::PARAM_INT);
	return $query->execute();

}
	/*Suppression d'un tuteur
	function supprimeStageByTuteur($idTuteur){
		global $pdo;
		$req = "DELETE FROM stage WHERE idTuteur = :idTuteur;";
		$query = $pdo->prepare($req);
		$query->bindValue (":idTuteur", $idTuteur, PDO::PARAM_INT);
		return $query->execute();
	}


	function sup_UnTuteur($idTuteur){
		$stageSansTuteur = supprimeStageByTuteur($idTuteur);
		if($stageSansTuteur){
			global $pdo;
			$req="DELETE FROM tuteur WHERE idTuteur = :idTuteur ;";
			$query = $pdo->prepare($req);		
			$query->bindValue ( ":idTuteur", $idTuteur, PDO::PARAM_INT);
			return $query->execute();
		} else{
			global $pdo;
			$req="DELETE FROM tuteur WHERE idTuteur = :idTuteur ;";
			$query = $pdo->prepare($req);		
			$query->bindValue ( ":idTuteur", $idTuteur, PDO::PARAM_INT);
			return $query->execute();
		}
	}*/


//fonctions suppression !


	/*//Suppression d'un élève 
	function supprimeStageParEleve($idEleve){
		global $pdo;
		$req = "DELETE FROM stage WHERE idUserEleve = :idEleve;";
		$query = $pdo->prepare($req);
		$query->bindValue (":idEleve", $idEleve, PDO::PARAM_INT);
		return $query->execute();

	}
	
	function sup_UnEleve($idEleve){
		$supStage = supprimeStage($idEleve);
		if($supStage){
			global $pdo;
			$req = "DELETE FROM usereleve WHERE idUserEleve = :idEleve;";
			$query = $pdo->prepare($req);
			$query->bindValue (":idEleve", $idEleve, PDO::PARAM_INT);
			return $query->execute();
		} else {
			global $pdo;
			$req = "DELETE FROM usereleve WHERE idUserEleve = :idEleve;";
			$query = $pdo->prepare($req);
			$query->bindValue (":idEleve", $idEleve, PDO::PARAM_INT);
			return $query->execute();
		}
	}

	//Suppression d'un professeur
	function remplaceParProfFantome($idProf){
		global $pdo;
		$req="UPDATE stage SET idUserProf=1 WHERE idUserProf = :idProf ;";
		$query = $pdo->prepare($req);		
		$query->bindValue ( ":idProf", $idProf, PDO::PARAM_INT);
		return $query->execute();	
	}

	function sup_UnProf($idProf){
		$profRemplace = remplaceParProfFantome($idProf);
		if($profRemplace){
			global $pdo;
			$req="DELETE FROM userprof WHERE idUserProf = :idProf ;";
			$query = $pdo->prepare($req);		
			$query->bindValue ( ":idProf", $idProf, PDO::PARAM_INT);
			return $query->execute();
		} else {
			global $pdo;
			$req="DELETE FROM userprof WHERE idUserProf = :idProf ;";
			$query = $pdo->prepare($req);		
			$query->bindValue ( ":idProf", $idProf, PDO::PARAM_INT);
			return $query->execute();
		}
	}
	*/


	

?>
