<html>
<header>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</header>

 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark static-top">
        <a class="navbar-brand" href="#">
          <img class="col-3" id="logo" src="Logodr.jpg" alt="LOGO">
        </a>    
        <div class="collapse navbar-collapse" id="navbarResponsive">
        	<a class="nav-link" href="index.php?logout=true">
        	Se déconnecter </a>
    	</div>
</nav><br/>

<body>
<div class="container">

<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	$action = $_GET["action"];

	if ($action == "DELETE") {
		$id = $_GET["id"];
	} else {
		$id = $_GET["id"];
		$nom = $_GET["Title"];
		$prenom = $_GET["ReleaseDate"];
		$age = $_GET["idPlatform"];
		$adresse = $_GET["idPublisher"];
		$dev = $_GET["idDeveloper"];
		
	}
	

	if ($action == "CREATE") {
		createUser($nom, $prenom, $age, $adresse, $dev);

		echo "<h3 class='text-center'>Le jeu à bien était ajouté</h3> <br>";
		echo "<br/><br/><a class='btn btn-dark col-6 offset-3' href='Home.php'>Retourner à la liste des jeux</a>";
		
	}
	
	if ($action == "UPDATE") {
		updateUser($id, $nom, $prenom, $age, $adresse, $dev);
		echo "<h3 class='text-center'>Le jeu à bien était mofifier </h3><br>";
		echo "<br/><br/><a class='btn btn-dark col-6 offset-3' href='Home.php'>Retourner à la liste des jeux</a>";
	}
	if ($action == "DELETE") {
		deleteUser($id);
		echo "
		<div class='container'>
		<h3 class='text-center'>Jeu supprimé</h3> <br>
		<div>
		";
		echo "<br/><br/><a class='btn btn-dark col-6 offset-3' href='Home.php'>Retourner à la liste des jeux</a>";
	}
	

	
?>

</div>
</body>
</html>