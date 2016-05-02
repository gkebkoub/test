<?php
session_start();
$id=$_GET["id"];

if ($_SESSION["panier"] [$id]==1) {
	unset($_SESSION["panier"] [$id]);
}
else{
	$_SESSION["panier"] [$id]--;

}

$_SESSION["succes"]="le produit a été retiré au panier";

header("location:panier.php");
?>