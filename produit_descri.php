<?php 
include("header.php");

$id=$_GET["id"];

?>
<br>
	<div class="container">
	<style>




	</style>
			
	<?php
	require_once "fonction.php";
				$bdd=connect();	
		try{
						$resultat = $bdd->query("select Nom_Prod, Imagedeux,Systeme_exploi,Dimensions,Poids,Taille_ecran,Type_ecran,Autonomie,Batterie,Note , Stock ,Processeur, Ram , Libelle_Marque , Reseau, App, Memoire, prix.num_memoire as mem
													from produit, marque, memoire , prix
													where produit.Marque=marque.Num_Marque
													and prix.id_Prod=produit.id
													and id_prod=$id
													limit 1
													");
		
								
						while($carac = $resultat->fetch(PDO::FETCH_OBJ))
						{
							echo "<div class='row'>
									<img src='Images_tel/".$carac->Imagedeux."' class='col-md-3'>"?>
									<div class="col-md-3 col-md-offset-1" style="margin-top:250px;">
									<form method="POST" action="">
									Capacité de stockage :
									<select name="memoire" onClick="submit()">
									<?php
										$res = $bdd->query("select Memoire, prix.num_memoire as mem from prix,memoire where memoire.Num_memoire=prix.num_memoire and id_prod=$id");
											while($memoire = $res->fetch(PDO::FETCH_OBJ)){?>
											<?php
											if (empty($_POST["memoire"])) {
												$_POST["memoire"]=3;
												?>
												<option value="<?php echo $memoire->mem;?>" <?php if ($memoire->mem == $_POST["memoire"]) { echo 'selected="selected"';}  ?>> <?php echo $memoire->Memoire." Go";?></option>
												<?php
												}
												else{


																						?>
												<option value="<?php echo $memoire->mem;?>" <?php if ($memoire->mem == $_POST["memoire"]) { echo 'selected="selected"';}  ?>> <?php echo $memoire->Memoire." Go";?></option>

											
											<?php
											}
											}
											?>
								</select>
								</form>
								

								<?php

									$res2 = $bdd->query("select prix from prix where num_memoire=".$_POST['memoire']." and id_prod=$id");
									while($memoire = $res2->fetch(PDO::FETCH_OBJ)){
										echo "<div class='col-md-offset-2'><h3>".$memoire->prix." € </h3></div>";
									
									}
								?>	
								
								<a href="ajout_panier.php?id=<?php echo $id; ?>&amp;page=index&amp;mem=<?php echo $_POST['memoire'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier  </a>

								</div>
								</div>
							<div class="table-responsive table-hover table-bordered">
				  <table class="table">
				    <tr>
					    <th> Caractéristiques :</th>
					    
				    </tr>
				    <tr >
				    	<td >OS</td>
				    	<td> <?php echo $carac->Systeme_exploi; ?></td>
				    </tr>
				      <tr>
				    	<td>Réseau</td>
				    	<td> <?php echo $carac->Reseau ; ?></td>
				    	
				    </tr>
				     <tr >
				    	<td rowspan="2">Ecran</td>
				    	<td> <?php echo $carac->Type_ecran; ?></td>
				    	
				    </tr>
				    <tr>
				    	<td><?php echo $carac->Taille_ecran; ?> </td>
				    	
				    </tr>
				     <tr>
				    	<td > Photo</td>
				    	<td> <?php echo $carac->App; ?></td>
				    	
				    </tr>
				 	 <tr>
				    	<td rowspan="2">Batterie</td>
				    	<td> <?php echo $carac->Batterie; ?> mAh</td>
				    	
				    </tr>
				        <tr>
				    	<td> <?php echo $carac->Autonomie ; ?></td>
				    	
				    </tr>
				     	 <tr>
				    	<td >Processeur</td>
				    	<td>  <?php echo $carac->Processeur ; ?></td>
				    	
				    </tr>
				    <tr>
				    	<td rowspan="2">Encombrement</td>
				    	<td> <?php echo $carac->Poids ; ?></td>
				    	
				    </tr>
				        <tr>
				    	<td> <?php echo $carac->Dimensions ; ?> </td>
				    	
				    </tr>
				    	 <tr>
				    	<td >Ram</td>
				    	<td> <?php echo $carac->Ram ; ?> </td>
				    	
				    </tr>

				    	  </table>
				</div>
				<?php
			}					
		}
		catch(PDOException $e)
					{
						echo "erreur dans la requête ".$e->getMessage();
					}
		?>


				

</div>
<br><br>
<?php
include("footer.php");

?>