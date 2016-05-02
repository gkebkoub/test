<?php

 require ("config.php");

function connect()
{
try
{
$conec= new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PW,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conec;
}
catch (PDOException $e)
{
	echo "Probleme de connexion <br>".$e->getmessage();
	return false;
}

}
?>