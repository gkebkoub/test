<?php 

include("fonction.php");
class utilisateurFactory
{

static function sauvegardeUtilisateur($login, $mdp, $type, $email)
{
$bdd= connect();
$type="membre";
$sql="insert into utilisateur (login, mdp, type, email)values (?,?,?,?)";
$stt=$bdd->prepare($sql);
$stt-> execute( 
	array($login,$mdp,$type,$email));
}

static function userExiste($login)
{
	$bdd=connect();
	$sql="select id from utilisateur where login=?";
	$stt=$bdd->prepare($sql);
	$stt->execute(array($login));
	$nb=$stt->rowcount();
	if ($nb!=0)
	 {
		return true;
	}
	else
	{
		return false;
	}
	$stt->close();
	$bdd->close();

 }

 static function emailExiste($email)
{
	$bdd=connect();
	$sql="select id from utilisateur where email=?";
	$stt=$bdd->prepare($sql);
	$stt->execute(array($email));
	$nb=$stt->rowcount();
	if ($nb!=0)
	 {
		return true;
	}
	else
	{
		return false;
	}
	$stt->close();
	$bdd->close();

 }


static function logUtilisateur($log,$pass)

{

	$bdd=connect();
	$sql="select * from utilisateur where login=?";
	$stt=$bdd->prepare($sql);
	$stt->execute(array($log));
	$nb=$stt->rowcount();

	if ($nb!=0)
	{
		while ($ligne=$stt->fetch(PDO::FETCH_OBJ)) 
		{
			if ($ligne->mdp==sha1($pass))
			{
				$_SESSION['Auth']=array(
					'id'=>$ligne->id,
					'login'=>$ligne->login,
					'mdp'=>$ligne->mdp,
					'type'=>$ligne->type);
			}
			else
			{
				return $result="erreur mot de passe";
			}
		}
	}
	else
	{
		return $result="erreur login";
	}
}



static function estLog()

{
	if (isset($_SESSION['Auth']) && isset($_SESSION['Auth']['login']) && isset($_SESSION['Auth']['mdp']))
	{
			$bdd=connect();
			$sql="select login,mdp from utilisateur where login=:login";
			$stt=$bdd->prepare($sql);
			$stt->bindParam('login',$_SESSION['Auth']['login'], PDO::PARAM_STR);
			$stt->execute();
			$nb=$stt->rowcount();

			if ($nb!=0)
			{
				while ($ligne=$stt->fetch(PDO::FETCH_OBJ))
				{
					if ($ligne->mdp==$_SESSION['Auth']['mdp'])
					{
						return true;
					}
					else
					{
						return false;

					}
				}
			}
			else
			{
				return false;
			}
	}


}
}

 ?>