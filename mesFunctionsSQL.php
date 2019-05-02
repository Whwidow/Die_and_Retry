<?php 
	
	function getDatabaseConnexion() {
		try {
		    $user = "root";
			$pass = "";
			$pdo = new PDO('mysql:host=localhost;dbname=videogames', $user, $pass);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

	
	// récupere tous les users
	function getAllUsers() 
	{
		$connexion = getDatabaseConnexion();
		$requete = 'SELECT id, Title, ReleaseDate, idPlatform, idPublisher, idDeveloper 
					FROM videogames

					';
		$rows = $connexion->query($requete);
		return $rows;
	}

	// creer un user
	function createUser($Title, $ReleaseDate, $idPlatform, $idPublisher, $idDeveloper) 
	{
		try {
			$connexion = getDatabaseConnexion();
			$sql = "INSERT INTO videogames (Title, ReleaseDate, idPlatform, idPublisher, idDeveloper) 
					VALUES ('$Title', '$ReleaseDate', '$idPlatform', '$idPublisher', '$idDeveloper')";
	    	$connexion->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	//recupere un user
	function readUser($id) 
	{
		$connexion = getDatabaseConnexion();
		$requete = "SELECT * FROM videogames WHERE id = '$id' ";
		$stmt = $connexion->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
		
	}

	//met à jour le user
	function updateUser($id, $Title, $ReleaseDate, $idPlatform, $idPublisher, $idDeveloper) {
		try {
			$connexion = getDatabaseConnexion();
			$requete = "UPDATE videogames set 
						Title = '$Title',
						ReleaseDate = '$ReleaseDate',
						idPlatform = '$idPlatform',
						idPublisher = '$idPublisher', 
						idDeveloper = '$idDeveloper'
						where id = '$id' ";
			$stmt = $connexion->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	// suprime un user
	function deleteUser($id) {
		try {
			$connexion = getDatabaseConnexion();
			$requete = "DELETE from videogames where id = '$id' ";
			$stmt = $connexion->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	function getNewUser() {
		$user['id'] = "";
		$user['Title'] = "";
		$user['ReleaseDate'] = "";
		$user['idPlatform'] = "";
		$user['idPublisher'] = "";
		$user['idDeveloper'] = "";
		
	}
	


 ?>