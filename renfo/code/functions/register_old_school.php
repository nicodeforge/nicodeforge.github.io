<?php
	session_start();
	if (isset($_ENV['env'])){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);	
	}
	include 'functions.php';
	$accessKey = isset($_POST['access-key']) ? $_POST['access-key'] : NULL;

	if (isset($accessKey) && $accessKey === "olana") {
		# code...
	
			$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : NULL;
			$email = isset($_POST['email']) ? $_POST['email'] : NULL;
			$pass = isset($_POST['password']) ? $_POST['password'] : "unset";
			
			
			$username = slugify($firstname);
			$pwd = sha1($pass);
			$activation = sha1($email);
			
			include 'db.inc.local.php';
			$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

			// Check connection
			if($mysqli === false){
			    die("ERROR: Could not connect. " . $mysqli->connect_error);
			}
			if (isset($firstname) && $firstname != "" && isset($pass) && $pass != "" && $pass != "unset") {
			 	# code...
			  
				// Attempt insert query execution
				$mysqli->set_charset("utf8");
				$sql = "INSERT INTO renfo_user (firstname,password,email,token,permission_level,active) VALUES ('".$firstname."', '".$pwd."', '".$email."','".$activation."','standard',0)";
				if($mysqli->query($sql) === true){
					//header('Location: http://www.daisylab.fr/dev/timekeeper/?q=success');
					$_SESSION["user"] = $firstname;
					//$_SESSION["userId"] = $firstname;
					//session_destroy();
					//$_SESSION = array();
					//$_SESSION["user"] = "Logout";

					// Plusieurs destinataires
					     $to  = $email; // notez la virgule
					     // Sujet
					     $subject = 'Actives ton compte Let\'s get fit 💪';
					     // message
					     $message = '
					     <html>
					      <head>
					       <title>Actives ton compte Let\'s get fit 💪</title>
					      </head>
					      <body>
					       <p>Bonjour '.$firstname.'!</p>
					       <p>Pour activer ton compte et commencer à transpirer, dans la joie, et la bonne humeur, clic sur ce lien d\'activation juste en dessous : https://carnets-de-route-moto.fr/renforcement/functions/confirm_account.php?token='.$activation.'</p>
					       <p>On va bien se marrer, t\'en fais pas ;)</p>
					       <p>Nico</p>
					      </body>
					     </html>
					     ';

					     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
					     $headers[] = 'MIME-Version: 1.0';
					     $headers[] = 'Content-type: text/html; charset=utf-8';

					     // En-têtes additionnels
					     $headers[] = 'To: '.$firstname.' <'.$email.'>';
					     $headers[] = 'From: Admin de l\'app Renfo <admin@carnets-de-route-moto.fr>';
					     $headers[] = 'Reply-To: nicodeforge@gmail.com';

					     // Envoi
					     mail($to, $subject, $message, implode("\r\n", $headers));


					//mail($to, $subject, $message, $headers);
					header("Location: ../index.php?q=register-success");
					exit;
				} else{
				    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
				    header("Location: ../index.php?q=register-failure-on-request");
				    exit;
				}
			}
			// Close connection
			$mysqli->close();
	}else{
		header("Location: ../index.php?q=wrong-access-key");
		exit;
	}
		
?>
