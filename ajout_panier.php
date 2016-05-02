<?php
session_start();
$id=$_GET["id"];
$page=$_POST["page"];
$mem=$_GET["mem"];
$_SESSION["mem"]=$mem;

if (!isset($_SESSION["panier"])) {
	$_SESSION["panier"] = array();
}

if (isset($_SESSION["panier"] [$id])) {
	$_SESSION["panier"] [$id]++;
}
else{
	$_SESSION["panier"] [$id]=1;
}
$_SESSION["succes"]="le produit a été ajouté au panier";
if ($_POST["page"]=="index") {
	header("location:produit.php");
}
else{
	header("location:panier.php");
}

?>