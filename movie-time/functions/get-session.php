<?php
session_start();
	include('db.inc.php');
	$query_user = $bdd -> query("SELECT * FROM membres WHERE urp='$urp'");
	if ($query_user -> num_rows >0) {
  	while ($datas_user 	= $query_user -> fetch_array()) {
  		 $id 			=	$datas_user['membre_id'];
       $email = $datas_email['email'];
         $prenom     	= $datas_user['prenom'];
         $nom 			= $datas_user['nom'];
         $localisation = $datas_user['localisation'];
         $pasta        = $datas_user['pasta'];
         $urp			= $datas_urp['urp'];
    	}
	}
		$_SESSION['id']				= $id;
	    $_SESSION['email'] 			= $email;
	    $_SESSION['prenom']			= $prenom;
	    $_SESSION['nom']			= $nom;
	    $_SESSION['localisation']	= $localisation;
	    $_SESSION['pasta']			= $pasta;
?>