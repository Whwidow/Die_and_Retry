<?php
// Connexion à la BDD 
include_once 'Dbconfig.php';

// 
	if(!$user->is_loggedin())
	{
	 	$user->redirect('index.php');
	}

	$user_id = $_SESSION['user_session'];
	$stmt = $DB_con->prepare("SELECT * FROM user WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Bootstrap -->
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  	<!-- CSS -->
	  	<link rel="stylesheet" type="text/css" href="style.css">
		<title>Accueil - Liste des jeux</title>
	</head>

<!-- Début Header -->
		<nav class="navbar navbar-expand-lg navbar-dark static-top">
			<a class="navbar-brand" href="#">
			<img class="col-3" id="logo" src="Logodr.jpg" alt="LOGO"></a> 
			<a class="nav-link text-white offset-10" href="index.php?logout=true">
			Se déconnecter</a>
		</nav>
<!-- / Header -->

<body>
<!-- Conteneur de la page -->
	<div class="container col-10 "><hr>
			<!-- Permet d'afficher le nom/pseudo de l'utilisateur -->
			<h5 class="col-7 offset-6">Bonjour <?php print($userRow['user_name']); ?> et bienvenue</h5>
			<!-- Pour le bouton d'ajout  -->
			<button type="button" class="btn btn-default btn-lg"></button>
		        <a class="btn btn-outline-dark d-block col-4 text-center" href=formulaireUtilisateur.php?id=0 >
		        <!-- Pour ajouter un jeu -->
		        <span class="glyphicon glyphicon-star " aria-hidden="true"></span> 
		        Ajouter un jeu 
		        </a><br/><br/>
	        <!-- Afficher le tableau des données -->
	        <div class="scroller text-center">
	            <?php  
	            	include 'mesFunctionsSQL.php';
	            	include 'mesFunctionsTable.php';

	              	$headers = getHeaderTable();
	              	$jeux = getAllUsers();
	              	afficherTableau($jeux, $headers);
	            ?>  
	        </div>
	</div>
<br/><br/><br/>
<!-- FIN DE LA PAGE  -->
		

	<!-- Pour Ajax -->
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</body>
</html>