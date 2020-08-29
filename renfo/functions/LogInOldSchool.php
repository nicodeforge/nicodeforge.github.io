<?php
	session_start();
	if ($_ENV['env']=='local'){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
	}
		
		$login = isset($_POST['login']) ? $_POST['login'] : NULL;
		$pass = isset($_POST['password']) ? $_POST['password'] : "unset";
		$pwd = sha1($pass);
		//echo "Pass ";
		include "db.inc.local.php";
		$sql = "SELECT * FROM renfo_user WHERE login = \"".$login."\"";

		if ($mysqli->connect_errno) {
		    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
		    exit();
		}

		/* Requête "Select" retourne un jeu de résultats */
		if ($result = $mysqli->query($sql)) {
		    if ($result -> num_rows == 1){
		    	while ($row = mysqli_fetch_assoc($result)) {
		   			if ($pwd == $row['password']) {
		   				$_SESSION["user"] = $row['display_name'];
		   				$_SESSION["userId"] = $row['id'];
		   				header("Location: ../renforcement.php?q=login-success");
		   			} else {
		   				header("Location: ../index.php?q=login-wpass");
		   			}
		   		
		    	//	echo "Username : ".$row['username'];
		    	}
		    }
		    if ($result -> num_rows == 0){
		    	header("Location: ../index.php?q=login-zero");
		    }
	            
			
		    /* Libération du jeu de résultats */
		    $result->close();
		    $mysqli->close();
		    
		}

		
		
	

?>