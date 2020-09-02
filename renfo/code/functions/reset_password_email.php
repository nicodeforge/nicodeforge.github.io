<?php
	session_start();
	if (isset($_ENV['env'])){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);	
	}
	
	$email = isset($_POST['email']) ? $_POST['email'] : NULL;
	
	include 'db.inc.local.php';
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

	// Check connection
	if($mysqli === false){
	    die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
	
	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM renfo_user WHERE email = \"".$email."\"";
	//echo $sql;
	if ($result = $mysqli->query($sql)) {
		if ($result -> num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				if ($email === $row['email']) {
						$activation = $row['token'];
						$firstname =  $row['firstname'];

						$to  = $email; // notez la virgule
						// Sujet
						$subject = 'Réinitialisation de ton mot de passe Let\'s get fit 💪';
						// message
						$message = '
						<html>
						 <head>
						  <title>Réinitialise ton mot de passe Let\'s get fit 💪</title>
						 </head>
						 <body>
						  <p>Bonjour '.$firstname.'!</p>
						  <p>Pour réinitialiser ton mot de passe et recommencer à transpirer, dans la joie, et la bonne humeur, clic sur ce lien : https://carnets-de-route-moto.fr/renforcement/reset_password.php?token='.$activation.'</p>
						  <p>Cette fois-ci... notes le bien !</p>
						  <p>Nico</p>
						 </body>
						</html>
						';

						// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
						$headers[] = 'MIME-Version: 1.0';
						$headers[] = 'Content-type: text/html; charset=utf-8';

						// En-têtes additionnels
						$headers[] = 'To: '.$email.;
						$headers[] = 'From: Let\'s get fit 💪 <admin@carnets-de-route-moto.fr>';
						$headers[] = 'Reply-To: nicodeforge@gmail.com';

						// Envoi
						mail($to, $subject, $message, implode("\r\n", $headers));

						header("Location: ../mot-de-passe-oublie.php?q=reset-email-sent");
						$result->close();
						$mysqli->close();	
						exit;
					} else {
						$result->close();
						$mysqli->close();
						header("Location: ../mot-de-passe-oublie.php?q=unknown-email");
						exit;
					}
			}
		}
		if ($result -> num_rows == 0){
			$result->close();
			$mysqli->close();
			header("Location: ../mot-de-passe-oublie.php?q=unknown-user");
			exit;
		}			    
	/* Libération du jeu de résultats */
				            
	}
		
?>
