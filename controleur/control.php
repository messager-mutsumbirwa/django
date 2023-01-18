<?php
	function formatDate($day,$mois,$year,$hour,$min,$sec){
		$Date=$day."-".$mois."-".$year." ".$hour.":".$min.":".$sec;
		return $Date;
	}
	function makeConnection(){
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}

	function verification($login,$pwd_crypte,$commande){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		//preparation de la requete de selection
		$requete = $connect->prepare($commande);
		$requete->bindValue(':login', $login);
		$requete->bindValue(':pwd', $pwd_crypte);
		$requete->execute();

		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
				$requete->closeCursor();
				return $result['id'];
			
		}else{return false;}
	}

	function identification($log,$pwd_crypte){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		//preparation de la requete de selection
		$requete = $connect->prepare("SELECT id FROM clients WHERE login = :login AND pwd = :pwd");
		$requete->bindValue(':login', $log);
		$requete->bindValue(':pwd', $pwd_crypte);
		$requete->execute();

		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
				$requete->closeCursor();
				return $result['id'];
			
		}else{return false;}
	}

	function identificationVendeur($log,$mdp){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		//preparation de la requete de selection
		$requete = $connect->prepare("SELECT idfsseur FROM fournisseurs WHERE login = :login AND pwd=:pwd");
		$requete->bindValue(':login', $log);
		$requete->bindValue(':pwd', $mdp);
		$requete->execute();

		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
				$requete->closeCursor();
				return $result['idfsseur'];
			
		}else{return false;}
	}

	function seeData($id){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$requete = $connect->prepare("SELECT * FROM mag WHERE id = :id");
		$requete->bindValue(':id', $id);
		$requete->execute();

		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
			$requete->closeCursor();
			return $result;
		}else {return false;}
	}

	function seeDataFsseurs($idfsseur){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$requete = $connect->prepare("SELECT * FROM fournisseurs WHERE idfsseur = :idfsseur");
		$requete->bindValue(':idfsseur', $idfsseur);
		$requete->execute();

		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
			$requete->closeCursor();
			return $result;
		}else {return false;}
	}

	function seeDataClients($id){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$requete = $connect->prepare("SELECT * FROM clients WHERE id = :id");
		$requete->bindValue(':id', $id);
		$requete->execute();

		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
			$requete->closeCursor();
			return $result;
		}else {return false;}
	}

	function seeDataClientsCreation($login,$pwd){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$requete = $connect->prepare("SELECT id_clients FROM clients WHERE login = login AND pwd = pwd");
		$requete->bindValue(':login', $login);
		$requete->bindValue(':pwd', $pwd);
		$requete->execute();

		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
			$requete->closeCursor();
			return $result;
		}else {return false;}
	}

	function seeDataPanier($id){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$requete = $connect->prepare("SELECT * FROM mag m RIGHT JOIN panier p ON m.id = p.id_mag WHERE id_clients = :id_clients");
		$requete->bindValue(':id_clients', $id);
		$requete->execute();

		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
			$requete->closeCursor();
			return $result;
		}else {return false;}
	}

	function verifsuppMag($id,$commande){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		//preparation de la requete de selection
		$requete = $connect->prepare($commande);
		$requete->bindValue(':id', $id);
		$requete->execute();
	}

	function verifsuppPanier($id,$cmd){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		//preparation de la requete de selection
		$requete = $connect->prepare($cmd);
		$requete->bindValue(':id', $id);
		$requete->execute();
	}

	function verifsuppFacture($id,$day_achat,$cmd){
		// connexion a la BD
		$connect= new PDO('mysql:dbname=zikearch;host=localhost','root','');
		$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		//preparation de la requete de selection
		$requete = $connect->prepare($cmd);
		$requete->bindValue(':id', $id);
		$requete->bindValue(':day_achat', $day_achat);
		$requete->execute();
	}
?>

