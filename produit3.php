<?php
include("header.php");
?>


<style>
	.table{
		
		width: 200px;
		float: left;
		margin: 10px;
	}


</style>


<div class="container"></div>
<h2>Nos produits</h2>
<?php
if (!empty($_SESSION["succes"])) {
?>
<div class="success">
	<?php echo $_SESSION['succes'];?>
</div>
<form method="POST" action="ajout_panier.php">
<?php
}
	
	require_once "fonction.php";
	$bdd=connect();	
					
				try{
						$resultat = $bdd->query("select * from produit");
		
								
						while($produits = $resultat->fetch(PDO::FETCH_OBJ))
						{?>
						<div class="responsive-table-line" style=" text-align: center;">
						<table class="table   table-body-center"  >
						
						<tr>
						<th><?php echo $produits->Nom_Prod;?></th>
						<input type="hidden" name="<?php echo $produits->id;?>">
						<input type="hidden" name="index">
						</tr>
						

					
						<tr>
							<td data-title="Image"><?php echo"<a href='produit_descri.php?id=".$produits->id."'><img src='Images_tel/".$produits->Image."' ></a>";?></td>
							
						</tr>
						<tr>
							<td>
	
	Capacité de Stockage :
		<select name="memoire" onClick="submit()">
		<?php
		try{
						$resultat = $bdd->query("select Memoire from prix,memoire where memoire.Num_memoire=prix.num_memoire and id_prod=".$produits->id."");
		
								
						while($memoire = $resultat->fetch(PDO::FETCH_OBJ))
						{?>
			<option value="<?php echo $memoire->num_Memoire;?>"> <?php echo $memoire->Memoire." Go";?></option>

		<?php
		$_SESSION["memoire"]=$memoire->Memoire;
						}
		}
		catch(PDOException $e)
		{
						echo "erreur dans la requête ".$e->getMessage();
		}
		?>
		</select>
		
	</td>
</tr>
<tr>
	<td><?php echo " A partir de <h3>".$produits->prix." € </h3>" ; ?></td>
<tr>
<tr>
	<td> 
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Ajouter au panier"/>
					
	</td>
</tr>



</table>
</form>
</div>
									
				<?php
						}
					}
					catch(PDOException $e)
					{
						echo "erreur dans la requête ".$e->getMessage();
					}


include("footer.php");
?>