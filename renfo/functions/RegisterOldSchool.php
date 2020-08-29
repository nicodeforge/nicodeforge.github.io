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
			
			include 'db.inc.local.php';
			$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

			// Check connection
			if($mysqli === false){
			    die("ERROR: Could not connect. " . $mysqli->connect_error);
			}
			if (isset($login) && $login != "" && isset($pass) && $pass != "" && $pass != "unset") {
			 	# code...
			  
				// Attempt insert query execution
				$sql = "INSERT INTO renfo_user (login,password,email,permission_level) VALUES ('".$login."', '".$pwd."', '".$email."','standard')";
				if($mysqli->query($sql) === true){
					//header('Location: http://www.daisylab.fr/dev/timekeeper/?q=success');
					$_SESSION["user"] = $login;
					session_destroy();
					$_SESSION = array();
					//$_SESSION["user"] = "Logout";
					header("Location: ../renforcement.php?q=register-success");
					exit;
				} else{
				    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
				    header("Location: ../index.php?q=register-failure-mysql-request");
				}
			}
			// Close connection
			$mysqli->close();
	}else{
		header("Location: ./index.php?q=wrong-access-key");
	}
		
?>
