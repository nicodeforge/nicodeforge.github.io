<?php
	session_start();
	include './functions.php';
	if (isset($_ENV['env'])){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);	
	}


	$user = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0;
	$program_name = isset($_POST['program_name']) ? $_POST['program_name'] : NULL;
	$slug = slugify($program_name);
	$program_description = isset($_POST['program_description']) ? $_POST['program_description'] : NULL;
	$objectif = isset($_POST['objectif']) ? $_POST['objectif'] : NULL;
	$count = isset($_POST['count']) ? $_POST['count'] : 1;
	$difficulty = isset($_POST['difficulty']) ? $_POST['difficulty'] : "Facile";
	$sharable = isset($_POST['sharable']) ? $_POST['sharable'] : 0;

	if ($sharable == "on") {
		$sharable = 1;
	}else{
		$sharable = 0;
	}

	$program_content = array();

	$entries = 0;
	//$overall_timing_seconds=0;

	for ($i=1; $i <= $count; $i++) { 

		
		
		

		$seance = "seance".$i;
		$date = "date".$i;
		$time = "time".$i;
		//$recup = "recup".$i;
		
		$seance = isset($_POST[$seance]) ? $_POST[$seance] : NULL;
		$date = isset($_POST[$date]) ? $_POST[$date] : "not-set";
		$time = isset($_POST[$time]) ? $_POST[$time] : "not-set";
		//$recup = isset($_POST[$recup]) ? $_POST[$recup] : NULL;

		//sscanf($time, "%d:%d:%d",$hours, $minutes, $seconds);
		//$time_formated = isset($hours) ? $hours * 3600 + $minutes * 60 + $seconds : $minutes * 60 + $seconds;

		//sscanf($recup, "%d:%d:%d",$hours, $minutes, $seconds);
		//$recup_formated =  isset($hours) ? $hours * 3600 + $minutes * 60 + $seconds : $minutes * 60 + $seconds;
		
		//for ($k = 1; $k <= $count; $k++) {
			
			//$entries++;
			array_push($program_content,array("id" => $seance,"status" => "not started","date" => $date,"time" => $time));
			//array_push($program_content,array("id" => ($entries+1), "name" => "Récupération","length" => $time));
		//	$entries++;

			//$overall_timing_seconds += $time_formated+$recup_formated;
			
		//}
	}

	$program_content = "{\"program\":".json_encode($program_content,JSON_UNESCAPED_UNICODE)."}";

	//{"program":[{"id": 18,"status": "finished"},{"id": 19,"status": "not started"},{"id": 20,"status": "not started"}]}

	//$overall_timing_seconds = round($overall_timing_seconds);
	//$overal_timing_formated =   sprintf('%02d:%02d:%02d', ($overall_timing_seconds/ 3600),($overall_timing_seconds/ 60 % 60), $overall_timing_seconds% 60);


	//echo $program_content;
	
	include './db.inc.local.php';
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

	// Check connection
	if($mysqli === false){
	    die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
	if (isset($program_name) && $program_name != "" && isset($program_content) && $program_content != "" && $program_content != "unset") {
	 	# code...
	  
		// Attempt insert query execution
		$mysqli->set_charset("utf8");


		$sql = "INSERT INTO renfo_program (user_id,name,slug,objectif,nb_seance,progression,description,difficulty,content,sharable) VALUES ('".$user."', '".$program_name."','".$slug."','".$objectif."','".$count."', 0, '".$program_description."','".$difficulty."', '".$program_content."' , ".$sharable.");";
		if($mysqli->query($sql) === true){
			//header('Location: http://www.daisylab.fr/dev/timekeeper/?q=success');
			//$_SESSION["user"] = $login;
			//session_destroy();
			//$_SESSION = array();
			//$_SESSION["user"] = "Logout";
			header("Location: ../programme.php?q=add-program-success");
			exit;
		} else{
		    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
		    header("Location: ../creer-programme.php?q=register-program-failure-on-request");
		    exit;
		}
	}

	header("Location: ../creer-programme.php?q=register-program-empty-request");
	// Close connection
	$mysqli->close();
	exit;
	
			
?>
