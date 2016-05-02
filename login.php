<?php
include("header.php");


include("utilisateurFactory.class.php");

if(!empty($_POST['login']) && !empty($_POST['mdp']))
{
	echo utilisateurFactory::logUtilisateur($_POST['login'],$_POST['mdp']);
}

?>

<?php

if (!empty($_SESSION["Auth"])) {
	echo "<h2>Bienvenue ".$_SESSION['Auth']['login']."</h2>";

	?>
	<p><a  class="btn btn-danger" href="logout.php">Deconnexion</a></p>
	<p><a  class="btn btn-info" href="membre.php">Page membre</a></p>
	<?php
	if ($_SESSION['Auth']['type']=='admin') {
		?>
		<p><a  class="btn btn-info" href="admin.php">Page administrateur</a></p>
		<?php
	}
}
	else{
		if (isset($result)&& !empty($result)) {
			echo "<div id='bulle'>".$result."</div>";
		}
}


?>
<form class="col-md-4  col-md-offset-3" method="POST" action="index.php">
	
	

	<?php
	if (utilisateurFactory::estLog()==0) {
		# code...
	?>
		<fieldset>

	<style>
	fieldset{

			border:1px solid #DDDDDD;
			border-radius: 5px;
			width:500px;
			height: 300px;
			padding-left: 50px;
			padding-right: 50px;
		}
	legend{
			border-bottom: none;
			position: relative;
			width: auto;
			padding-left: 10px;
			padding-right: 10px;

		}
		.btn{
			margin-left: 60px;
			margin-top: 10px;
		}
		
	</style>
	<legend>Identification</legend>
		<div class="form-group">
			<label class="control-label">Identifiant</label>

			<div class="input-group">

				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>

				<input type="text" class="form-control" name="login">
			</div>
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
	
	</fieldset>	
	<div class="form-group">
		
			<input type="submit"class=" btn btn-success col-md-4" value="Envoyer">
			<input type="reset" class=" btn btn-danger" value="Annuler">
	</div>
	<div class="form-group">
			<a href="inscription.php">S'inscrire</a>
	</div>

</form>
<?php }?>
<script type="http://code.jquery.com/jquery.js"></script>
<script type="js/bootstrap.min.js"></script>
</body>
</html>
