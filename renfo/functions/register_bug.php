<?php
	session_start();
	if (isset($_ENV['env'])){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);	
	}
	include 'functions.php';
		
	
		$navigator = isset($_POST["navigator"]) ? $_POST["navigator"] : "unknown navigator";
		$page = isset($_POST["page"]) ? $_POST["page"] : "unknown page";
		$description = isset($_POST["description"]) ? $_POST["description"] : "unset";
		
		$protocol = isset($_ENV['env']) ? "http://" : "https://";

		$user = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 1;
		
		include 'db.inc.local.php';
		$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

		// Check connection
		if($mysqli === false){
		    die("ERROR: Could not connect. " . $mysqli->connect_error);
		}
		if (isset($description) && $description != "" && isset($user) && $user != "" && $user != "unset") {
		 	# code...
		  
			// Attempt insert query execution
			$mysqli->set_charset("utf8");
			$sql = "INSERT INTO renfo_bug_reports (navigator,page,description,user_id) VALUES ('".$navigator."', '".$page."', '".$description."','".$user."')";
			if($mysqli->query($sql) === true){
				//header('Location: http://www.daisylab.fr/dev/timekeeper/?q=success');
				    $to  = 'nicodeforge@gmail.com'; // notez la virgule
				     // Sujet
				     $subject = 'Nouveau bug repport sur Let\'s get fit 💪';
				     // message
				     $message = '
				     <html>
				      <head>
				       <title>Nouveau bug repport sur Let\'s get fit 💪</title>
				      </head>
				      <body>
				       <p>Bonjour !</p>
				       <p>Nouveau bug rapporté par l\'utilisateur '.$user.' sur la page '.$page.' avec le navigateur '.$navigator.'. Voilà sa description : <br/>"'.$description.'"
				       </p>
				       <p>Bisou</p>
				      </body>
				     </html>
				     ';

				     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
				     $headers[] = 'MIME-Version: 1.0';
				     $headers[] = 'Content-type: text/html; charset=utf-8';

				     // En-têtes additionnels
				     $headers[] = 'To: Nicolas <nicodeforge@gmail.com>';
				     $headers[] = 'From: Bug report de l\'app Renfo <admin@carnets-de-route-moto.fr>';
				     $headers[] = 'Reply-To: nicodeforge@gmail.com';

				     // Envoi
				     mail($to, $subject, $message, implode("\r\n", $headers));
						
				

				

				$pos = strpos($page, '?');
				if ($pos === false) {
					$param = "?m=register-bug-success";
				}else{
					$param = "&m=register-bug-success";
				}
				



				$_REQUEST['page'] = $protocol.$page.$param;
				$redirect = $_REQUEST["page"];
				header("Location: $redirect");
				exit;
			} else{
			    //echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
			    //$mysqli->close();
			    //header('Location: $page?q=register-bug-failure-upon-request');
				$pos = strpos($page, '?');
				if ($pos === false) {
					$param = "?m=register-bug-failure-upon-request";
				}else{
					$param = "&m=register-bug-failure-upon-request";
				}
			    
			   	$_REQUEST['page'] = $protocol.$page.$param;
				$redirect = $_REQUEST["page"];
				header("Location: $redirect");
				exit;
			}
		}
		// Close connection
		$mysqli->close();
		//echo "register-bug-failure";
		//header("Location: ".$page."?q=register-bug-failure");
		//exit;
	
?>
