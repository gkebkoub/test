<?php
include("header.php");
?>
<div class="container">

<style>
	.table{
		
		width: 200px;
		float: left;
		margin: 10px;
	}


</style>

<thead>

<h2>Nos produits</h2>
<?php
if (!empty($_SESSION["succes"])) {
?>
<div class="success">
	<?php echo $_SESSION['succes'];?>
</div>

<?php
}
	
require_once "fonction.php";
				$bdd=connect();	
					
				try{
						$resultat = $bdd->query("select  distinct Nom_Prod, id , Image , Prix from produit, prix where produit.id = prix.id_prod");
		
								
						while($produits = $resultat->fetch(PDO::FETCH_OBJ))
						{
						?>
<div class="responsive-table-line" style=" text-align: center;">
<table class="table   table-body-center"  >
<thead>
<tr>
<th><?php echo $produits->Nom_Prod;?></th>

</tr>
</thead>

<tbody>
<?php
$id = $produits->id;
?>
<tr>
	<td data-title="Image"><?php echo"<a href='produit_descri.php?id=".$produits->id."'><img src='Images_tel/".$produits->Image."' ></a>";?></td>
	
</tr>
<tr>
	<td>
	Capacité de Stockage :
		<select name="memoire">
		<?php
		
		try{
						$resultat1 = $bdd->query("select Memoire from prix,memoire where memoire.Num_memoire=prix.num_memoire and id_prod=$id");
		
								
						while($memoire = $resultat1->fetch(PDO::FETCH_OBJ))
						{?>
			<option> <?php echo $memoire->Memoire." Go";?></option>

		<?php
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
	<td><?php echo " A partir de <h3>".$produits->Prix." € </h3>" ; ?></td>
	
	
<tr>
<tr>
	<td> 
					<a href="ajout_panier.php?id=<?php echo $produits->id;?>&amp;page=index>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier</a>
					
	</td>
</tr>
<?php
						}
						
						?>

<?php
						
						
						
						}
						catch(PDOException $e)
						{
						echo "erreur dans la requête ".$e->getMessage();
						}
						?>



</tbody>
</table>

									
				<?php
				
					


include("footer.php");
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(funtion(){
		$('.success').delay(1000).slideUp();
	})
</script>

