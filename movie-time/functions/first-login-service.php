<?php
	//Traitement des variable email et pass

	$email = htmlspecialchars($_POST['email']);
	$pwd = htmlspecialchars($_POST['pwd']);
	$userreg = htmlspecialchars($_POST['pass']);

	//Renvoi le SHA du pwd
		$pass = sha1 ($pass);

	//Vérifier dans la table client si l'adresse email existe
	include('db.inc.php');
	if(!empty($email) && !empty($pwd) AND $pass == $urp) {
	  
	  // on recupère le password de la table qui correspond au login du visiteur
	  $query_member = $bdd -> query("SELECT pwd FROM membres WHERE email ='".$email."'") ;
	  if (isset($query_member)) {
			if($datas_member = $query_member -> fetch_array()) {
				$pwd     = $datas_member['pwd'];
			}
	  	# code...
	  }
	  
	  if($pwd != $pwd) {
	    echo '<p>Mauvais login / password / code. Merci de recommencer</p>';
	    header("Location : ../inscription.php?m=Connection-has-failed"); // On redirige vers la page d'inscription
	    exit;
	  }
	  else {
	    session_start();
	    include('functions/get-user.php');

	    $_SESSION['email'] = sha1($email);
	    
	    header("Location : ../espaceprive.php?m=" . $_SESSION['email']);
	    // ici vous pouvez afficher un lien pour renvoyer
	    // vers la page d'accueil de votre espace membres 
	  }    
	}
	else {
	  echo '<p>Vous avez oublié de remplir un champ.</p>';
	   header("Location : ../index.php"); // On redirige vers la page d'accueil
	   exit;
	}

		//Si l'adresse email est trouvée :
			//Ajouter du poivre au mot de passe ;) et envoyer le sha
			//Comparer le SHA au SHA(pwd+poivre) de la table clients
			//Assigner true à la variable AUTH
		
		//Si l'adresse email n'est pas trouvée
			//Assigner false à la variable AUTH
			// Renvoyer un message et proposer un formulaire d'inscription

		//Si AUTH est vraie
			//Démarrer une session
			//Rediriger vers la page espaceprivée en passant les données de session et l'ID client
		//Si AUTH est fausse
			//Rediriger vers la page inscription.php
	//Script de vérification emprunté à phpdebutant.org :
	
// pensez a ouvrir une connexion vers mysql ici
// voir les exercices dans le menu de droite pour cela.

?>