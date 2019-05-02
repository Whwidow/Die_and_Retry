<?php 

require 'database.php';

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
		$nameError = null;
		$name = htmlentities(trim($_POST['Title']));
		$valid = true;

	       if (empty($Title)) 
	       {
	           $nameError = 'Please enter titre';
	           $valid = false;
	       }

 if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
 { 
            $sql = "INSERT INTO videogames (Title, ReleaseDate, idPlatform, idPublisher, idDeveloper) 
					VALUES ('$Title', '$ReleaseDate', '$idPlatform', '$idPublisher', '$idDeveloper')";
            $q = $pdo->prepare($sql);
            $q->execute(array($Title, $ReleaseDate, $idPlatform, $idPublisher, $idDeveloper));
            Database::disconnect();
            header("Location: Home.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud</title>
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
        
    </head>

<body><br />

<div class="container"><br />
	<div class="row"><br />
		<h3>Ajouter un jeu</h3>
	</div><br />

	
<form method="post" action="Add.php"><br />

		<div class="control-group <?php echo !empty($TitleError)?'error':'';?>">
	    <label class="control-label">Title</label><br />
			<div class="controls">
	            <input name="Title" type="text"  placeholder="Name" value="<?php echo !empty($Title)?$name:'';?>">
	                <?php if (!empty($TitleError)): ?>
	                <span class="help-inline"><?php echo $TitleError;?></span>
	                <?php endif; ?>
			</div>
		</div><br />

		<div class="control-group<?php echo !empty($ageError)?'error':'';?>">
        <label class="control-label">Date de sortie</label><br />
			<div class="controls">
                <input type="date" name="ReleaseDate" value="<?php echo !empty($ReleaseDate)?$ReleaseDate:''; ?>">
                    <?php if(!empty($ReleaseDateError)):?>
                    <span class="help-inline"><?php echo $ReleaseDateError ;?></span>
                    <?php endif;?>
			</div>
		</div><br />
		
		<div class="control-group<?php echo !empty($idPlatformError)?'error':'';?>">
        <label class="control-label">idPlatform</label><br />
			<div class="controls">
                <input type="number" name="firstname" value="<?php echo !empty($idPlatform)?$idPlatform:''; ?>">
                    <?php if(!empty($idPlatformError)):?>
                    <span class="help-inline"><?php echo $idPlatformError ;?></span>
                    <?php endif;?>
			</div>
		</div><br />

		<div class="control-group  <?php echo !empty($idPublisher)?'error':'';?>">
        <label class="control-label">idPublisher</label><br />
			<div class="controls">
                <input type="number" name="url" value="<?php echo !empty($idPublisher)? $idPublisher:'' ; ?>">
                	<?php if(!empty($idPublisherError)):?>
                	<span class="help-inline"><?php echo $idPublisherError ;?></span>
                	<?php endif;?>
            </div>
        </div><br />

        <div class="control-group  <?php echo !empty($idDeveloper)?'error':'';?>">
        <label class="control-label">idPublisher</label><br />
			<div class="controls">
                <input type="number" name="url" value="<?php echo !empty($idDeveloper)? $idDeveloper:'' ; ?>">
                	<?php if(!empty($idDeveloperError)):?>
                	<span class="help-inline"><?php echo $idDeveloperError ;?></span>
                	<?php endif;?>
            </div>
        </div><br />


		<div class="form-actions">
           		<input type="submit" class="btn btn-success" name="submit" value="submit">
                <a class="btn" href="index.php">Retour</a>
		</div>
</form>
</div>
 


</body>
</html>