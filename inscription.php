<?php
include("header.php");


if (!empty($_POST)) {
	
	extract($_POST);
	$valid=true;

	if (!empty($login) && utilisateurFactory::userExiste($login)) {
		$valid=false;
		$erreurloginExiste=true;
	}
	if (!empty($mdp) && !empty($mdp2) && $mdp!=$mdp2) 

	{
		$valid =false;
		$erreurpassdiff=true;
		
	}
	if (!empty($email) && utilisateurFactory::emailExiste($email)) 

	{
		$valid =false;
		$erreuremailExiste=true;
		
	}

	if (!empty($email) && !empty($email2) && $email!=$email2) {
		$valid=false;
		$erreurmaildiff=true;
	}
		if (!empty($mdp) && strlen($mdp) <5)

	{
		$valid =false;
		$erreurcourtdiff=true;
		
	}
	if ($valid) 
	{
		$type="membre";
		utilisateurFactory::sauvegardeUtilisateur($login,sha1($mdp),$type,$email);
		$crea_valide=true;

		if ($crea_valide) 
		{
			header('location:index.php');
		}
	}

}


?>


<form class="col-md-5  col-md-offset-3" method="POST" action="">
	
	
	<fieldset>

	
	<legend>Identification</legend>
		<div class="form-group">
			<label class="control-label">Identifiant</label>

			<div class="input-group">

				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>

				<input type="text" class="form-control" placeholder="Choissisez un identifiant" name="login" value="<?php if (isset($login)) {echo $login;}?>" required />
			
				<?php if (isset($erreurloginExiste) && $erreurloginExiste) { ?>
		
			</div>
			 <div id="bulle">
 					ce login existe deja
			 </div>

		<?php } ?>
		</div>
		
		<div class="form-group">
			<label class="control-label">Mot de passe</label>

			<div class="input-group">

				<div class="input-group-addon">
					<span class="glyphicon glyphicon-edit"></span>
				</div>

				<input type="password" class="form-control" placeholder="5 caractères minimun" name="mdp">
			</div>
		</div>
			<?php if (isset($erreurcourtdiff) && $erreurcourtdiff) { ?>
			 <div id="bulle">
 			mot de passe trop court 
 			</div>

			<?php } ?>
			<div class="form-group">
			<label class="control-label">Confimer votre mot de passe</label>

				<div class="input-group">

					<div class="input-group-addon">
						<span class="glyphicon glyphicon-edit"></span>
					</div>

					<input type="password" class="form-control" placeholder="Confirmer votre mot de passe" name="mdp2">
					<?php if (isset($erreurpassdiff) && $erreurpassdiff) { ?>
			 	
				</div>
			</div>
				<div id="bulle">
			 			mot de passe différents
					 </div>

					<?php } ?>
		</div>
			<div class="form-group">
			<label class="control-label">Votre e-mail</label>

			<div class="input-group">

				<div class="input-group-addon">
					<span class="glyphicon glyphicon-envelope"></span>
				</div>

				<input type="text" class="form-control" name="email" placeholder="Remplissez votre email">
				<?php if (isset($erreurmaildiff) && $erreurmaildiff) {?>
				
			</div>
		</div>
			<div id="bulle">
						E-mail différents
					</div>
				<?php
				}
				
				?>
			</div>
			<div class="form-group">
			<label class="control-label">Confimer votre e-mail</label>

			<div class="input-group">

				<div class="input-group-addon">
					<span class="glyphicon glyphicon-envelope"></span>
				</div>

				<input type="text" class="form-control" name="email2" placeholder="Confirmer votre email">

			</div>
			<?php if (isset($erreuremailExiste) && $erreuremailExiste) { ?>
			 <div id="bulle">
			 	cet email  existe deja
			 </div>

			<?php } ?>
		</div>

	
	</fieldset>	
	<div class="form-group ">
		
			<input type="submit"class=" btn btn-primary col-md-4" value="Envoyer">
			<input type="reset" class=" btn btn-warning" value="Annuler">
			<a href="index.php" class="btn btn-info col-md-offset-1">Accueil</a>
	</div>
	

</form>
<script type="http://code.jquery.com/jquery.js"></script>
<script type="js/bootstrap.min.js"></script>

</body>
</html>
