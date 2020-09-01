<?php
	session_start();
	include './functions.php';
	if (isset($_ENV['env'])){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);	
	}

//	if (isset($accessKey) && $accessKey === "duff") {
		# code...
			$user = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0;
			$seance_name = isset($_POST['seance_name']) ? $_POST['seance_name'] : NULL;
			$slug = slugify($seance_name);
			$type = isset($_POST['type']) ? $_POST['type'] : NULL;
			$count = isset($_POST['count']) ? $_POST['count'] : NULL;
			$difficulty = isset($_POST['difficulty']) ? $_POST['difficulty'] : "Facile";


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

					if ($count > 3) {
					$exercice4 = isset($_POST['exercice4']) ? $_POST['exercice4'] : NULL;
					$series4 = isset($_POST['series4']) ? $_POST['series4'] : NULL;
					$time4 = isset($_POST['time4']) ? $_POST['time4'] : NULL;
					$recup4 = isset($_POST['recup4']) ? $_POST['recup4'] : NULL;

						if ($count > 4) {
						$exercice5 = isset($_POST['exercice5']) ? $_POST['exercice5'] : NULL;
						$series5 = isset($_POST['series5']) ? $_POST['series5'] : NULL;
						$time5 = isset($_POST['time5']) ? $_POST['time5'] : NULL;
						$recup5 = isset($_POST['recup5']) ? $_POST['recup5'] : NULL;

							if ($count > 5) {
							$exercice6 = isset($_POST['exercice6']) ? $_POST['exercice6'] : NULL;
							$series6 = isset($_POST['series6']) ? $_POST['series6'] : NULL;
							$time6 = isset($_POST['time6']) ? $_POST['time6'] : NULL;
							$recup6 = isset($_POST['recup6']) ? $_POST['recup6'] : NULL;

								if ($count > 6) {
								$exercice7 = isset($_POST['exercice7']) ? $_POST['exercice7'] : NULL;
								$series7 = isset($_POST['series7']) ? $_POST['series7'] : NULL;
								$time7 = isset($_POST['time7']) ? $_POST['time7'] : NULL;
								$recup7 = isset($_POST['recup7']) ? $_POST['recup7'] : NULL;

									if ($count > 7) {
									$exercice8 = isset($_POST['exercice8']) ? $_POST['exercice8'] : NULL;
									$series8 = isset($_POST['series8']) ? $_POST['series8'] : NULL;
									$time8 = isset($_POST['time8']) ? $_POST['time8'] : NULL;
									$recup8 = isset($_POST['recup8']) ? $_POST['recup8'] : NULL;

										if ($count > 8) {
										$exercice9 = isset($_POST['exercice9']) ? $_POST['exercice9'] : NULL;
										$series9 = isset($_POST['series9']) ? $_POST['series9'] : NULL;
										$time9 = isset($_POST['time9']) ? $_POST['time9'] : NULL;
										$recup9 = isset($_POST['recup9']) ? $_POST['recup9'] : NULL;

											if ($count > 9) {
											$exercice10 = isset($_POST['exercice10']) ? $_POST['exercice10'] : NULL;
											$series10 = isset($_POST['series10']) ? $_POST['series10'] : NULL;
											$time10 = isset($_POST['time10']) ? $_POST['time10'] : NULL;
											$recup10 = isset($_POST['recup10']) ? $_POST['recup10'] : NULL;
											}
										}
									}
								}
							}

						}
					}
				}
			}
			
			//Time conversion : we input mm:ss and output ss 
			
			sscanf($time1, "%d:%d:%d",$hours, $minutes, $seconds);
			$time1 = isset($hours) ? $hours * 3600 + $minutes * 60 + $seconds : $minutes * 60 + $seconds;

			sscanf($recup1, "%d:%d", $minutes, $seconds);
			$recup1 =  isset($hours) ? $hours * 3600 + $minutes * 60 + $seconds : $minutes * 60 + $seconds;

			$seanceContent = array();

			if (isset($_ENV['env'])) {
				//echo "<p>Nombre d'exercices : ".$count."</p>";
			}	
			for ($i = 1; $i < 2*$series1; $i++) {
				array_push($seanceContent,array("id" => $i, "name" => $exercice1,"length" => $time1));
				array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup1));
				$i++;
				
			}

			if ($count > 1) {
				for ($i = 2*$series1; $i < (2*$series1)+(2*$series2); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice2,"length" => $time2));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup2));
					$i++;
				
				}
			}

			if ($count > 2) {
				for ($i = (2*$series1)+(2*$series2); $i < (2*$series1)+(2*$series2)+(2*$series3); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice3,"length" => $time3));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup3));
					$i++;
				
				}
			}

			if ($count > 3) {
				for ($i = (2*$series1)+(2*$series2)+(2*$series3); $i < (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice4,"length" => $time4));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup4));
					$i++;
				
				}
			}

			if ($count > 4) {
				for ($i = (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4); $i < (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice5,"length" => $time5));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup5));
					$i++;
				
				}
			}

			if ($count > 5) {
				for ($i = (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5); $i < (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice6,"length" => $time6));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup6));
					$i++;
				
				}
			}

			if ($count > 6) {
				for ($i = (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6); $i < (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6)+(2*$series7); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice7,"length" => $time7));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup7));
					$i++;
				
				}
			}

			if ($count > 7) {
				for ($i = (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6)+(2*$series7); $i < (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6)+(2*$series7)+(2*$series8); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice8,"length" => $time8));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup8));
					$i++;
				
				}
			}

			if ($count > 8) {
				for ($i = (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6)+(2*$series7)+(2*$series8); $i < (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6)+(2*$series7)+(2*$series8)+(2*$series9); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice9,"length" => $time9));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup9));
					$i++;
				
				}
			}

			if ($count > 9) {
				for ($i = (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6)+(2*$series7)+(2*$series8)+(2*$series9); $i < (2*$series1)+(2*$series2)+(2*$series3)+(2*$series4)+(2*$series5)+(2*$series6)+(2*$series7)+(2*$series8)+(2*$series9)+(2*$series10); $i++) {
					array_push($seanceContent,array("id" => $i, "name" => $exercice10,"length" => $time10));
					array_push($seanceContent,array("id" => $i+1, "name" => "Pause","length" => $recup10));
					$i++;
				
				}
			}

			//Convert seanceContent to be a json object, ready for inserting in db
			$seanceContent = json_encode($seanceContent,JSON_UNESCAPED_UNICODE);
			if (isset($_ENV['env'])) {
				//echo "<p>JSON: ".$seanceContent."</p>";
				//exit;	
				# code...
			}
			
			
			
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
	// }else{
	// 	header("Location: ./creer-programme.php?q=ooops");
	// }
	
		
?>
