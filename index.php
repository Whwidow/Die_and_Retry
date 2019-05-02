<?php

require_once 'Dbconfig.php';

if($user->is_loggedin()!="")
  {
    $user->redirect('');
  }

if(isset($_POST['btn-login']))
{
      $uname = $_POST['txt_uname_email'];
      $umail = $_POST['txt_uname_email'];
      $upass = $_POST['txt_password'];
      
     if($user->login($uname,$umail,$upass))
     {
        $user->redirect('Home.php');
     }
     else
     {
        $error = "Vous n'etes pas enregistrer dans la Base de Données!";
     } 
}  ?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion à Die and Retry</title>
  <!-- Pour Bootsrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Pour le CSS -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Lien Pour les Icones Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>


 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark static-top">
        <a class="navbar-brand" href="#">
          <img class="col-3" id="logo" src="Logodr.jpg" alt="LOGO">
          </a>
</nav><br/>

<body>

<div class="container">
     <div class="form-container col-8 offset-2">
        <form method="post">
            <h4 class="text-right">Connexion</h4><hr>
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            <!-- Pour les deux entrées pseudo/pass -->
            <div class="form-group">
              <input type="text" class="form-control" name="txt_uname_email" placeholder="Entrez un pseudo ou email" required />
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="txt_password" placeholder="Votre mot de passe" required />
            </div>

            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                 <i class="glyphicon glyphicon-log-in"></i>&nbsp;Connexion !
                </button>
            </div>
            <br />
            <label><a href="Sign-Up.php">S'inscrire</a></label>
        </form>
       </div>
</div>

</body>
</html>
