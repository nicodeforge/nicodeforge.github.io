<?php
// On démarre la session
session_start();
$dbhost = "cl1-sql10";
$dbname = "deforge5";		// Database Name
$dbuser = "deforge5";		// Database User
$dbpwd  = "ch2tz=5";		// Database Password

$table_user="xuserappli";

$loginOK = false;  // 

// On n'effectue les traitement qu'à la condition que
// les informations aient été effectivement postées
if ( isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['password'])) ) {

  extract($_POST);  // 

  // On va chercher le mot de passe afférent à ce login
  $sql = "SELECT ID, LOGIN, PASS, APPLI, DROIT , CHEF, DIRECTEUR FROM ".$table_user." WHERE APPLI='REBUT' and LOGIN = '".addslashes($login)."'";


try
{
  $dbh = new PDO("$dbhost;$dbname;$dbuser;$dbpwd");
  echo "Connected<p>";
}
catch (Exception $e)
{
  echo "Unable to connect: " . $e->getMessage() ."<p>";
}


  $req = mysql_query($sql) or die('Erreur SQL : <br />'.$sql);
 
  // On vérifie que l'utilisateur existe bien
  if (mysql_num_rows($req) > 0) {
     $data = mysql_fetch_assoc($req);
   
    // On vérifie que son mot de passe est correct
    if ($password == $data['PASS']) {
      $loginOK = true;
    }
  }
}

// Si le login a été validé on met les données en sessions
if ($loginOK) {
  $_SESSION['LOGIN'] = $data['LOGIN'];
  $_SESSION['DROIT'] = $data['DROIT'];

  $_SESSION['CHEF'] = $data['CHEF'];
  $_SESSION['DIRECTEUR'] = $data['DIRECTEUR'];


  header ("Location: indexessais.php");
 }
else {
  echo 'Une erreur est survenue, veuillez réessayer !';
}
?>