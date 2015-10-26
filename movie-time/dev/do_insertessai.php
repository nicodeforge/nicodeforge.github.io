<?
session_start();
// On affiche une phrase résumant les infos sur l'utilisateur courant
$droitdoda=$_SESSION['DROIT'];
$LOGIN    =$_SESSION['LOGIN'];
$couleur=0;
$coul_ligne1 ="#CCCCBB";
$coul_ligne2 ="#CCCCCC";  
$couleur="#FFFFCC";
if ($droitdoda <= 0) 
{
echo "<b>DENIED!</b>";
exit;
}
echo $LOGIN;
include('connexion.php');
$marque   =$_POST['marque'];
$cylindree=$_POST['cylindree'];
$modele   =$_POST['modele'];
$doc	   =$_POST['doc'];
$classement=$_POST['classement'];
$annee=$_POST['annee'];


$marque=strtoupper($marque);
$cylindree=strtoupper($cylindree);
$modele=strtoupper($modele);


$lien=mysql_connect(HOTE,USER,PASS)  or die($php_errormsg);
mysql_select_db(BASE,$lien); 
		
			
$query =" INSERT INTO ".$table_essais." ( `marque`,  `modele`, `cylindree`,`doc`, `annee`, `classement`)  VALUES ( '$marque', '$modele', '$cylindree', '$doc', '$annee', '$classement')";
		// echo $query ;
		$req = mysql_query($query);
		if (!$req)
			{ echo "Failed";
			} else echo $marque."=>Ok";

		mysql_close();
   
	
	   
?>


