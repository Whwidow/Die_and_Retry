	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<!-- -->
			<link rel="stylesheet" href="style.css" type="text/css"  />
			<title>INDEX</title>
		</head>
<body>

<?php

function afficherTableau($rows, $headers) {
		?>
		<div class="table">
		<table class="table table-hover table-striped">
		    <tr>
		    <?php foreach ($headers as $header): ?>
		        <th class="bg-info"><?php echo $header; ?></th>
		    <?php endforeach; ?>
		    </tr>

			<?php foreach ($rows as $row): ?>
			    <tr>
			    <?php for ($k = 0; $k < count($headers); $k++): ?>
			    	<?php if ($k == 0){ ?>
			    		<td><?php echo '<a href=formulaireUtilisateur.php?id='.$row[$k].' >'.$row[$k].'</a>'; ?></td>
			    	<?php } else { ?>
			    		<td><?php echo $row[$k]; ?></td>
			    	<?php } ?>
			        
			    <?php endfor; ?>
			    </tr>
			<?php endforeach; ?>

		</table>
	</div>
		<?php

}

function getHeaderTable() {
	$headers = array();
	$headers[] = "Modifier ici";
	$headers[] = "Titre";
	$headers[] = "Date de sortie";
	$headers[] = "idPlatform";
	$headers[] = "idPublisher";
	$headers[] = "idDeveloper";
	return $headers;
}


?>

<script type="text/javascript" src="script.js"></script>

</body>
</html>



 