<?php
	session_start();
	if ($_ENV['env']=='local'){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);	
	}

	$accessKey = isset($_POST['access-key']) ? $_POST['access-key'] : NULL;

	if (isset($accessKey) && $accessKey === "duff") {
		# code...
	
			$login = isset($_POST['loginreg']) ? $_POST['loginreg'] : NULL;
			$email = isset($_POST['email']) ? $_POST['email'] : NULL;
			$pass = isset($_POST['password']) ? $_POST['password'] : "unset";
			
			
			$username = strtolower($login);
			$pwd = sha1($pass);
			$activation = sha1($email);
			
			include 'db.inc.local.php';
			$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

			// Check connection
			if($mysqli === false){
			    die("ERROR: Could not connect. " . $mysqli->connect_error);
			}
			if (isset($login) && $login != "" && isset($pass) && $pass != "" && $pass != "unset") {
			 	# code...
			  
				// Attempt insert query execution
				$mysqli->set_charset("utf8");
				$sql = "INSERT INTO renfo_user (login,password,email,permission_level) VALUES ('".$login."', '".$pwd."', '".$email."','standard')";
				if($mysqli->query($sql) === true){
					//header('Location: http://www.daisylab.fr/dev/timekeeper/?q=success');
					$_SESSION["user"] = $login;
					//$_SESSION["userId"] = $login;
					//session_destroy();
					//$_SESSION = array();
					//$_SESSION["user"] = "Logout";
					$to      = $email;
					$subject = 'Activez votre compte';
					$message = 'Bonjour ! Cliquez ici pour activer : LIEN';
					$headers = 'From: admin@carnets-de-route-moto.fr' . "\r\n" .
					'Reply-To: nicodeforge@gmail.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);
					header("Location: ../index.php?q=register-success");
					exit;
				} else{
				    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
				    header("Location: ../index.php?q=register-failure-on-request");
				}
			}
			// Close connection
			$mysqli->close();
	}else{
		header("Location: ./index.php?q=wrong-access-key");
	}
		
?>
