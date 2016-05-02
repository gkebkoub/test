<?php

include("header.php");


?>
<?php
	if (utilisateurFactory::estLog()==1) {
		# code...
	
echo "<h2>Bienvenue ".$_SESSION['Auth']['login']." sur la page administrateur</h2>";

?>
<p><a  class="btn btn-info" href="index.php">Retour</a></p>
<br>
<br>
<?php }
else
{
	header("location:index.php");
}
?>
<?php
include("footer.php");
?>
<script type="http://code.jquery.com/jquery.js"></script>
<script type="js/bootstrap.min.js"></script>
</body>
</html>
