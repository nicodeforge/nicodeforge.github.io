<?php
	session_start();
	include './functions.php';
	if (isset($_ENV['env'])){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);	
	}

	$user = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0;
	$seance_name = isset($_POST['seance_name']) ? $_POST['seance_name'] : NULL;
	$slug = slugify($seance_name);
	$type = isset($_POST['type']) ? $_POST['type'] : NULL;
	$count = isset($_POST['count']) ? $_POST['count'] : 1;
	$difficulty = isset($_POST['difficulty']) ? $_POST['difficulty'] : "Facile";
	$seanceContent = array();

	$entries = 0;

	for ($i=1; $i <= $count; $i++) { 

		$exercice = "exercice".$i;
		$series = "series".$i;
		$time = "time".$i;
		$recup = "recup".$i;
		
		$exercice = isset($_POST[$exercice]) ? $_POST[$exercice] : NULL;
		$series = isset($_POST[$series]) ? $_POST[$series] : NULL;
		$time = isset($_POST[$time]) ? $_POST[$time] : NULL;
		$recup = isset($_POST[$recup]) ? $_POST[$recup] : NULL;

		sscanf($time, "%d:%d:%d",$hours, $minutes, $seconds);
		$time = isset($hours) ? $hours * 3600 + $minutes * 60 + $seconds : $minutes * 60 + $seconds;

		sscanf($recup, "%d:%d:%d",$hours, $minutes, $seconds);
		$recup =  isset($hours) ? $hours * 3600 + $minutes * 60 + $seconds : $minutes * 60 + $seconds;
		
		for ($k = 1; $k <= $series; $k++) {
			
			$entries++;
			array_push($seanceContent,array("id" => ($entries), "name" => $exercice,"length" => $time));
			array_push($seanceContent,array("id" => ($entries+1), "name" => "Récupération","length" => $recup));
			$entries++;
			
		}
	}

	$seanceContent = json_encode($seanceContent,JSON_UNESCAPED_UNICODE);

	//echo $seanceContent;

	include './db.inc.local.php';
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

	// Check connection
	if($mysqli === false){
	    die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
	if (isset($seance_name) && $seance_name != "" && isset($seanceContent) && $seanceContent != "" && $seanceContent != "unset") {
	 	# code...
	  
		// Attempt insert query execution
		$mysqli->set_charset("utf8");
		$sql = "INSERT INTO renfo_seance (user_id,name,slug,type,content,difficulty) VALUES ('".$user."', '".$seance_name."', '".$slug."', '".$type."', '".$seanceContent."','".$difficulty."')";
		if($mysqli->query($sql) === true){
			//header('Location: http://www.daisylab.fr/dev/timekeeper/?q=success');
			//$_SESSION["user"] = $login;
			//session_destroy();
			//$_SESSION = array();
			//$_SESSION["user"] = "Logout";
			header("Location: ../renforcement.php?q=add-success");
			exit;
		} else{
		    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
		    header("Location: ../creer-programme.php?q=register-program-failure-on-request");
		}
	}
	// Close connection
	$mysqli->close();
			
?>
