<?php
session_start();
include("utilisateurFactory.class.php");
?>

<!DOCTYPE html>

<html lang="en">
	<head>

		<title>ShopTel</title>
		<meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="description" content="">
    		<meta name="author" content="">
    	<link href="css/modern-business.css" rel="stylesheet">
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="style.css">
  		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bs.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	</head>
<body>

<nav class="navbar navbar-inverse navbar-static-top">

  <div class="container-fluid">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>


      <a class="navbar-brand" href="index.php">Shoptel.com</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
 
        <li>
          <a href="produit.php" role="button" aria-expanded="false">Produits </a>
         
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" action="recherche.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Tapez votre recherche ici" name="recherche">
        </div>
        <button type="submit" class="btn btn-default">Rechercher</button>
      </form>
      <?php
      if (isset($_POST["recherche"])) {
      	$_SESSION["recherche"]=$_POST["recherche"];
      	}
      ?>
      <ul class="nav navbar-nav navbar-right">
        <?php
				if(!empty($_POST['login']) && !empty($_POST['mdp']))
				{
					echo utilisateurFactory::logUtilisateur($_POST['login'],$_POST['mdp']);
				}
				if (!empty($_SESSION["Auth"])) {
					

					?>
					<li class="dropdown" >
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profil <span class="glyphicon glyphicon-menu-down"></span></a>
         			 <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style=" margin-left: 10px; margin-right: 10px; margin-top: 5px;">
         			<div class="form-group" >
         			  <li role="presentation"><a href="logout.php" class="btn btn-danger btn-sm btn-block" style="margin-bottom:5px;"> Déconnexion </a></li>
    				<li role="presentation"><a href="membre.php" class="btn btn-default btn-sm btn-block" style="margin-bottom:5px;"> Page membre </a></li>
				   
						
					<?php
					if ($_SESSION['Auth']['type']=='admin') {
						?>
						<li role="presentation"><a href="admin.php" class="btn btn-default btn-sm btn-block" style="margin-bottom:5px;"> Page administrateur </a></li>
					<?php
					
					}
					?>
					</div>
						</ul>
						</li>
						<?php
				}
					else{
						?>
			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Connexion <span class="glyphicon glyphicon-menu-down"></span></a>
          <ul class="dropdown-menu" role="menu">
          <div class="form-group">
          	<form class="  " method="POST" action="index.php" style="margin-left: 10px; margin-right: 10px; width: 200px;">
				<label class="control-label">Identifiant</label>

				<div class="input-group">

					<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
					</div>

					<input type="text" class="form-control" name="login">
				</div>
				<div class="form-group">
					<label class="control-label">Mot de passe</label>

						<div class="input-group">

							<div class="input-group-addon">
								<span class="glyphicon glyphicon-edit"></span>
							</div>

							<input type="password" class="form-control" name="mdp">
						</div>
				</div>
					
					
				<div class="form-group">
						
					<input type="submit"class=" btn btn-success" value="Envoyer">
					<input type="reset" class=" btn btn-danger" value="Annuler">
				</div>
				<div class="form-group">
					<a href="inscription.php">S'inscrire</a>
				</div>

			</form>
		</div>
          </ul>
          <?php
						}
						
		?>
        
        </li>
         <li><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier 
         <?php if (isset($_SESSION["panier"])) {
         	# code...
        	echo "(".count($_SESSION["panier"]).")"; 
        	 }else{
        	 	echo "(0)";
        	 }
        	 ?>
        	 </a></li>
      </ul>

    </div>
  </div>
</nav>