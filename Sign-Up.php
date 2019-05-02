<?php

require_once 'Dbconfig.php';
// 
if($user->is_loggedin()!="")
  {
    $user->redirect('');
  }

// Test les champs pour savoir si il sont vides
if(isset($_POST['btn-signup']))
  {
    $uname = trim($_POST['txt_uname']);
    $umail = trim($_POST['txt_umail']);
    $upass = trim($_POST['txt_upass']); 
 
  if($uname=="") {
      $error[] = "Veuillez indiquer un nom / pseudo !"; 
   }
   else if($umail=="") {
      $error[] = "Veuillez remplir le champ email !"; 
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Veuillez entrez une adresse email valide !';
   }
   else if($upass=="") {
      $error[] = "Veuillez remplir le champ mot de passe !";
   }
   else if(strlen($upass) < 6){
      $error[] = "Le mot de passe doit contenir au moins 6 caractéres "; 
   }
   else
   {
      try  
      {
         $stmt = $DB_con->prepare("SELECT user_name,user_email FROM user WHERE user_name=:uname OR user_email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['user_name']==$uname) {
            $error[] = "Désolé ce nom / pseudo existe déja !";
         }
         else if($row['user_email']==$umail) {
            $error[] = "Désolé cet email est déja utilisé !";
         }
         else
         {
           // Si tout est valide; alors on enregistre les données dans la table USER
            if($user->EnregistrerUser($fname,$lname,$uname,$umail,$upass)) 
            {
                $user->redirect('Sign-Up.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inscription</title>
  <!-- Pour Bootsrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Pour le CSS -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Lien Pour les Icones Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<!-- Début Header -->
    <nav class="navbar navbar-expand-lg navbar-dark static-top">
        <a class="navbar-brand" href="#">
        <img class="col-3" id="logo" src="Logodr.jpg" alt="LOGO"></a> 
    </nav>
<!-- / Header -->

<body>
  <!-- Début de la page D'inscription -->
  <div class="container">
    <div class="form-container col-10 offset-1">
      <form method="post">
        <h4 class="text-right">Inscription</h4><hr/>
            
        <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
            <div class="alert alert-danger">
            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
            </div>
        <?php
               }
            }
            else if(isset($_GET['joined']))
        { ?>

        <div class="alert alert-info">
            <i class="glyphicon glyphicon-log-in"></i> &nbsp; Vous venez d'etre enregistrer avec succés !<a href='index.php'> Connecter vous</a> ici pour accéder à la page :)
        </div>
                 
<?php  }  ?>
    
    <!-- Début des champs d'entrée du Formulaire d'inscription-->
        <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="Entrez un nom/pseudo" value="<?php if(isset($error)){echo $uname;}?>" />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="Votre email" value="<?php if(isset($error)){echo $umail;}?>" />
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="txt_upass" placeholder="Votre mot de passe" />
        </div>
      <!-- Bouton d'envoi de l'inscription -->    
      <div class="clearfix"></div><hr />
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
              <i class="glyphicon glyphicon-open-file"></i>&nbsp;S'inscrire !
            </button>
        </div><br />
        <!-- Lien vers la Connexion -->
        <label>Vous posséder déja un compte ? <a href="index.php">Connecter vous</a></label>
    </form>
  </div>
</div>


  <!-- Pour Ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</body>
</html>