<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	
	$id = $_GET["id"];
	if ($id == 0) {
		$user = getNewUser();
		$action = "CREATE";
		$libelle = "Créer";
	} else {
		$user = readUser($id);
		$action = "UPDATE";
		$libelle = "Mettre à jour";
	}
?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- -->
		<link rel="stylesheet" href="style.css" type="text/css"  />
		<title>INDEX</title>
	</head>

<!-- Début Header -->
			<nav class="navbar navbar-expand-lg navbar-dark static-top">
			    <a class="navbar-brand" href="#">
			    <img class="col-3" id="logo" src="Logodr.jpg" alt="LOGO">
				</a> 

			    <a class="nav-link text-white offset-10" href="index.php?logout=true">
			    Se déconnecter</a>
			</nav>
<!-- / Header -->

<body>
<!-- Conteneur de la page -->
  <div class="container">	
	<a class="btn btn-info col-3 offset-6" href="Home.php">Retour à la liste des jeux</a>

	<form action="createUpdate.php" method="get">
	  <p>	
		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<input type="hidden" name="action" value="<?php echo $action;  ?>"/>

		<div class="form-group col-10 offset-1">
			<label for="name">Titre :</label><br/>
            <input type="text" id="nom" name="Title" value="<?php echo $user['Title']; ?>" />
        </div>
	    <div class="form-group col-10 offset-1">
	        <label for="prenom">Date de sortie:</label><br/>
	        <input type="date" id="prenom" name="ReleaseDate" value="<?php echo $user['ReleaseDate'];  ?>">
	    </div>
	    <div class="form-group col-10 offset-1">
	        <label for="age">idPlatform :</label><br/>
	        <input type="number" id="age" name="idPlatform" value="<?php echo $user['idPlatform'];  ?>">
	    </div>
	    <div class="form-group col-10 offset-1">
	        <label for="adresse">idPublisher :</label><br/>
	        <textarea type="number" id="adresse" name="idPublisher" value="<?php echo $user['idPublisher'];  ?>"></textarea>
	    </div>
	    <div class="form-group col-10 offset-1">
	        <label for="age">idDeveloper :</label><br/>
	        <input type="number" id="age" name="idDeveloper" value="<?php echo $user['idDeveloper'];  ?>">
	    </div><br/>
	    <!-- Pour créer un jeu -->
		<div class="button">
			<button class="btn btn-info" type="submit"><?php echo $libelle;  ?></button>
		</div>
	</p>
	</form>
	<!-- Pour supprimer un jeu -->
	<?php if ($action!="CREATE") { ?>
	<form action="createUpdate.php" method="get" class="col-4 offset-8">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>	
		<p><div class="button">
		<button class="btn btn-danger" type="submit">Supprimer</button>
		</p></div>
	</form>

	<?php } ?>
</div>

	<!-- Ajax -->
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</body>
</html>