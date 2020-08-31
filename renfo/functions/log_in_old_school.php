<?php
	session_start();
	if (isset($_ENV['env'])){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
	}
		
		$email_login = isset($_POST['email_login']) ? $_POST['email_login'] : NULL;
		$pass = isset($_POST['password']) ? $_POST['password'] : "unset";
		$pwd = sha1($pass);
		//echo "Pass ";
		include "db.inc.local.php";
		$mysqli->set_charset("utf8");
		$sql = "SELECT * FROM renfo_user WHERE email = \"".$email_login."\"";

		if ($mysqli->connect_errno) {
		    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
		    exit();
		}

		/* Requête "Select" retourne un jeu de résultats */
		if ($result = $mysqli->query($sql)) {
		    if ($result -> num_rows == 1){
		    	while ($row = mysqli_fetch_assoc($result)) {
		   			if ($pwd == $row['password']) {
		   				$_SESSION["user"] = $row['firstname'];
		   				$_SESSION["user_id"] = $row['id'];
		   				header("Location: ../renforcement.php?q=login-success");
		   			} else {
		   				header("Location: ../index.php?q=login-wpass");
		   			}
		   		
		    	//	echo "Username : ".$row['username'];
		    	}
		    }
		    if ($result -> num_rows == 0){
		    	header("Location: ../index.php?q=unknown-user");
		    }
	            
			
		    /* Libération du jeu de résultats */
		    $result->close();
		    $mysqli->close();
		    
		}

		
		
	

?>