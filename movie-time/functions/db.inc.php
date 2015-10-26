<?php
//Defining global variables
define("HOST", "mecommertfele.mysql.db");
define("BDD", "mecommertfele");
define("LOGIN", "mecommertfele");
define("PASS","ME78JitRsmvM");

global $bdd;
$bdd  = @new mysqli(HOST,LOGIN,PASS,BDD) ;
if ($bdd -> connect_errno) {
	die("Connexion à la base de données impossible!");
}

$bdd->set_charset("utf8");

?>