<?php
	$name = htmlspecialchars($_POST['name']);
	$surname = htmlspecialchars($_POST['surname']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$pwd = sha1($password);
	$localisation = htmlspecialchars($_POST['localisation']);
	$pasta = htmlspecialchars($_POST['pasta']);
	$validatePass = rand(1000,9999);
	$urp	=	sha1($validatePass);
	$isvalid = 0;

	include("db.inc.php");	

	$sql = "INSERT INTO membres (prenom, nom, email, pwd, localisation, pasta, urp, isvalid)
	VALUES ('$name', '$surname', '$email','$pwd','$localisation','$pasta','$urp','$isvalid')";

	    //Vérifier que l'uitlisateur n'est pas déjà connu
	    	//SI l'utilisateur n'est pas connu, lancer procédure de création avec validation par emaiL.
			/*
				#Créer dans table membre, un champ booléen "valide" (0/1) et un champ "validpass" qui génère 50caractères aléatoires
				#Si à l'insertion, valide vaut 0 (toujours vrai dans le cas de l'insertion), on envoi à l'adresse mail renseignée
				#un mail contenant url+var où var = sha1(validpass)
				#sur la page de récupération, vérifier que var vaut sha du validpass. 
					#Si vrai => on passe valide à 1 et on redirige sur espaceprivé.
					#Si faux => on affiche un message d'erreur
				Si à l'insertion, valide vaut 1, on affiche un message d'erreur
			//Si l'utilisateur est connu, lui dire et proposer une procédure de mot de passe oublié :
				#Récupérer le mail proposé par l'utilisateur
					#Si il existe, demander quel est son plat préféré
						#Si sa réponse est bonne, demander quel doit être son nouveau pass e rentrer
						le sha de son entrée dans la table membres -> pwd
						#Si la réponse est fausse : message d'erreur
					#Si il n'existe pas, lui dire et proposer de s'inscrire ou de contacter l'administrateur



			*/
		//Je vérifie que l'utilisateur n'existe pas déjà :
		$query_existingMember = $bdd -> query('SELECT * FROM membres WHERE email="'.$email.'"');
		if ($query_existingMember -> num_rows >0) {

			$bdd->close();
			header("Location: ../index.php?c=unregistered");
		         
		 }

		 else{

		 	if ($bdd->query($sql) === TRUE) {

			    //$query_validity = $bdd -> query('SELECT isvalid FROM membres WHERE email="'.$email.'"');
			    $lien = 'http://m2-ecommerce-grenoble.com/Nicolas345/validation-membre.php?k='.$urp;

			    $mailValidation = '
			    <html>
			    	<head>
			    		<title>Inscription IDRAC Movie Time</title>
			    	</head>
			    	<body>
			    		<table>
			    			<tr>
			    				<td>
			    Bonjour, vous avez créé un compte sur IDRAC Movie Time. Pour le moment, votre compte est inactif. Pour l\'activer, retenez ce code à 4 chiffres qui vous sera demandé lors de votre première connexion : '
			    .$validatePass. '.</td>
			    			</tr>

			    			<tr>
			    				<td>
  							    Bonne scéance, avec <a href="http://wwww.m2-ecommerce-grenoble.com/Nicolas345/premiere-connexion.php">IDRAC Movie Time </a>!

			    				</td>
			    			</tr>				
			    
			    		</table>
			    	</body>
			    </html>';
			   	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			   	mail ( $email , "Votre inscription sur IDRAC MOVIE TIME" , $mailValidation,$headers);
			    
			    header('Location : ../premiere-connexion.php?t='.$urp.'');

			    	//Si l'utilisateur est connu, rediriger vers page dédiée

			} else {
			    echo "Error: " . $sql . "<br>" . $bdd->error;
			}

		 }
		
		

	

	/*
	if (!($mysqli_stmt = $bdd -> prepare("INSERT INTO membres VALUES (?)"))) {
    echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
	}

	if (!$mysqli_stmt->bind_param(array(
		'prenom' 			=> $prenom,
		'nom' 				=> $nom,
		'email' 			=> $email,
		'pwd'				=> $pwd,
		'localisation'		=> $localisation,
		'pasta'				=> $pasta
		))) {
	    echo "Echec lors du liage des paramètres : (" . $stmt->errno . ") " . $stmt->error;
	}

	if (!$mysqli_stmt->execute()) {
	    echo "Echec lors de l'exécution : (" . $stmt->errno . ") " . $stmt->error;
	}*/

	/*
	$req = $mysqli -> prepare('INSERT INTO membres
		SET 	prenom 				= :prenom,
				nom 				= :nom,
				email 				= :email,
				pwd 				= :pwd,
				localisation 		= :localisation,
				pasta 				= :pasta;'

		
	);

	$req-> execute(array(
		'prenom' 			=> $prenom,
		'nom' 				=> $nom,
		'email' 			=> $email,
		'pwd'				=> $pwd,
		'localisation'		=> $localisation,
		'pasta'				=> $pasta
		));
	*/
	
	  




	//Requete pour insérer le nouveau membre à la table.

?>