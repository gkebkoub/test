<?php 
include 'header.php';
  
$bdd=connect();
$totalHT=0;
$frais=5;
?>
<div class="container">
<?php


if (empty($_SESSION["panier"])) {
?>
			<div class="col-lg-8 col-offset-6 centered" style="margin-left : 500px;">
	           	<h2>Votre panier est vide </h2>
	        	
	        	<a href="produit.php" class="btn btn-info "><span class="glyphicon glyphicon-shopping-cart"></span> Poursuivre mes achats</a>
        	</div>
        	<?php
}
else{
 ?>

 <h2>Votre Panier </h2>
        <div class="responsive-table-line" style="width=600px;">
			<table class="table  table-striped" style="width=600px;"  >
          <tr>
            <th class="text" >Produit</th>
			
            <th>Prix Unit.</th>
            <th>Quantité</th>
            <th>Montant</th>
             <th colspan='2'>Actions </th>
			</tr>
        </thead>
        <tbody>
        <?php
        $memoire=$_SESSION["mem"];
        	foreach ($_SESSION["panier"] as $id => $quantite) {
        		try{
						$resultat = $bdd->query("select Nom_Prod, prix, id, num_memoire from produit, prix  where prix.id_prod=produit.id and id=$id and num_memoire=$memoire");
		
								
						while($panier= $resultat->fetch(PDO::FETCH_OBJ))
						{
						
							echo "<tr>
										<td>".$panier->Nom_Prod."</td><td>".$panier->prix." € </td>
										<td>".$quantite."</td>
										<td>".number_format($quantite*$panier->prix,2,","," ")." €</td>
										<td><a href='ajout_panier.php?id=$id&amp;page=index&amp;mem=$memoire' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-plus-sign'></span> </a></td>
										<td><a href='retrait_panier.php?id=".$panier->id."' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-minus-sign'></span></a></td>
								</tr>";
							$totalHT=$totalHT+$quantite*$panier->prix;
							$TVA=$totalHT*0.20;
							$totalTTC=$frais+$TVA+$totalHT;
						}
						
						 


					}
					catch(PDOException $e)
					{
						echo "erreur dans la requête ".$e->getMessage();
					}
        	}

        ?>
       
           

        </tbody>
      </table>
      </div>

      <div class="total" >
         <p>
	        <span>TOTAL HT : </span><?php echo $totalHT." €";?><br>
	        <span>TVA (20%): </span><?php echo number_format($TVA,2,","," ");?><br>
	        <span>Faris de port: </span><?php echo $frais." €";?><br>
	        <span>TOTAL TTC: </span><?php echo number_format($totalTTC,2,","," ")." €";?><br>
        </p>
        <a href="produit.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Poursuivre mes achats</a>
        <a href="#"class="btn btn-info">Payer</a>
        <a href="vider.php" class="btn btn-info">Vider le panier</a>
      </div>


        <?php
        
        }
        ?>
  </div>  
<br><br><br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; 
?>