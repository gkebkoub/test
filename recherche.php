<?php
include("header.php");
$r=$_SESSION["recherche"];
?>
<style>
	.table{
		
		width: 200px;
		float: left;
		margin: 10px;
	}


</style>
<div class="container">
<h2>Nos produits</h2>
	<?php
	
	require_once "fonction.php";
	$bdd=connect();	
					
		try{
			$resultat = $bdd->query("select * from produit where Nom_Prod like '%$r%'");

			while($produits = $resultat->fetch(PDO::FETCH_OBJ)){
				?>
				<div class="responsive-table-line" style=" text-align: center;">
					<table class="table   table-body-center" >
						<tr>
							<th style="font-size:1.2em; text-align: center; height: 65px;"><?php echo $produits->Nom_Prod;?></th>
						</tr>
						<tr>
							<td data-title="Image"><?php echo"<a href='produit_descri.php?id=".$produits->id."'><img src='Images_tel/".$produits->Image."' ></a>";?></td>	
						</tr>
					
				
						<tr>
							<td>
								<?php
									$res2 = $bdd->query("select min(prix) as prix from prix where id_prod= ".$produits->id."");
									while($memoire = $res2->fetch(PDO::FETCH_OBJ)){
										echo "a partir de<h3>".$memoire->prix." € </h3>";
									
									}
								?>	
							</td>
							<tr>
								<td> 
									<a href="produit_descri.php?id=<?php echo $produits->id;?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Selectionner </a>
					
								</td>
							</tr>
						<tr>
					</table>

				</div>
				
			<?php
			}
		}
		catch(PDOException $e){

			echo "erreur dans la requête ".$e->getMessage();
		}


	?>


</div>

<?php
include("footer.php");
?>