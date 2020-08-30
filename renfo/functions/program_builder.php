<?php
	session_start();
	include './functions.php';
	if ($_ENV['env']=='local'){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);	
	}

//	if (isset($accessKey) && $accessKey === "duff") {
		# code...
			$user = isset($_SESSION["userId"]) ? $_SESSION["userId"] : 0;
			$progname = isset($_POST['progname']) ? $_POST['progname'] : NULL;
			$slug = slugify($progname);
			$type = isset($_POST['type']) ? $_POST['type'] : NULL;
			$count = isset($_POST['count']) ? $_POST['count'] : NULL;

			$exercice1 = isset($_POST['exercice1']) ? $_POST['exercice1'] : NULL;
			$series1 = isset($_POST['series1']) ? $_POST['series1'] : NULL;
			$time1 = isset($_POST['time1']) ? $_POST['time1'] : NULL;
			$recup1 = isset($_POST['recup1']) ? $_POST['recup1'] : NULL;

			if ($count > 1) {
				$exercice2 = isset($_POST['exercice2']) ? $_POST['exercice2'] : NULL;
				$series2 = isset($_POST['series2']) ? $_POST['series2'] : NULL;
				$time2 = isset($_POST['time2']) ? $_POST['time2'] : NULL;
				$recup2 = isset($_POST['recup2']) ? $_POST['recup2'] : NULL;

				if ($count > 2) {
					$exercice3 = isset($_POST['exercice3']) ? $_POST['exercice3'] : NULL;
					$series3 = isset($_POST['series3']) ? $_POST['series3'] : NULL;
					$time3 = isset($_POST['time3']) ? $_POST['time3'] : NULL;
					$recup3 = isset($_POST['recup3']) ? $_POST['recup3'] : NULL;
				}
			}
			
			//Time conversion : we input mm:ss and output ss 
			
			sscanf($time1, "%d:%d", $minutes, $seconds);
			$time1 = isset($minutes) ? $minutes * 60 + $seconds : $minutes * 60 + $seconds;

			sscanf($recup1, "%d:%d", $minutes, $seconds);
			$recup1 = isset($minutes) ? $minutes * 60 + $seconds : $minutes * 60 + $seconds;

			$programContent = array();

			//echo "<p>Nombre d'exercices : ".$count."</p>";

			for ($i = 1; $i <= $series1; $i++) {
				array_push($programContent,array("id" => $i, "name" => $exercice1,"length" => $time1));
				array_push($programContent,array("id" => $i+1, "name" => "Pause","length" => $recup1));
				
			}

			if ($count > 1) {
				for ($i = 1; $i <= $series2; $i++) {
				array_push($programContent,array("id" => $i, "name" => $exercice2,"length" => $time2));
				array_push($programContent,array("id" => $i+1, "name" => "Pause","length" => $recup2));
				
			}
			}

			//Convert programContent to be a json object, ready for inserting in db
			$programContent = json_encode($programContent,JSON_UNESCAPED_UNICODE);
			//echo "<p>JSON: ".$programContent."</p>";
			
			
			include './db.inc.local.php';
			$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

			// Check connection
			if($mysqli === false){
			    die("ERROR: Could not connect. " . $mysqli->connect_error);
			}
			if (isset($progname) && $progname != "" && isset($programContent) && $programContent != "" && $programContent != "unset") {
			 	# code...
			  
				// Attempt insert query execution
				$mysqli->set_charset("utf8");
				$sql = "INSERT INTO renfo_program (user_id,name,slug,type,content) VALUES ('".$user."', '".$progname."', '".$slug."', '".$type."', '".$programContent."')";
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
	// }else{
	// 	header("Location: ./creer-programme.php?q=ooops");
	// }
	
		
?>
