<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Créer une nouvelle séance</title>
	<meta name="charset" content="utf-8" /> 
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
	<link rel="manifest" href="favicon_io/site.webmanifest">
	<style type="text/css">
		.custom-control-input{
			
		}

	</style>
</head>

<?php
if (!isset($_SESSION["user"])) {
	header("Location: ./index.php?q=do-auth");
}
//if ($_ENV['env']==='local'){
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);	
//}
include 'functions/functions.php';
include 'functions/db.inc.local.php';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
// Attempt query execution
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
// Attempt query execution
$mysqli->set_charset("utf8");
$sql = "SELECT u.id,u.firstname from renfo_user u GROUP BY u.id;";
$sql .= "SELECT s.id,s.name from renfo_seance s INNER JOIN renfo_user u ON s.user_id=u.id where s.sharable=1;";


if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

/* Requête "Select" retourne un jeu de résultats */
$query_result = $mysqli->multi_query($sql);
$i = 0;
$users = array();
$seances = array();

if ($query_result) {
    do {
    	
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                if ($i == 0) {
                	//Store result of first query
                	
                	$firstname = $row[1];
                	$user_id = $row[0];
                	array_push($users, array('id' => $row[0] , 'firstname' => $row[1]));

                }elseif ($i == 1) {
                	
                	$firstname = $row[1];
                	$user_id = $row[0];
                	array_push($seances, array('id' => $row[0] , 'name' => $row[1]));
                }
            }
            $i++;
            $result->free();
        }
        
    } while ($mysqli->more_results() && $mysqli->next_result());
}
$mysqli->close();


/* Display result
for ($i=0; $i < count($users); $i++) { 
 echo "Users : ".$users[$i]["firstname"]."<br>" ;
}
for ($i=0; $i < count($seances); $i++) { 
  echo "Seance : ".$seances[$i]["name"]."<br>" ;
}
*/
?>
<!--Dashboard Spotify : https://developer.spotify.com/dashboard/applications/27d9073503b54f019e6524c72038b3d9-->
<!--Documentation Web Playback SDK : https://developer.spotify.com/documentation/web-playback-sdk/quick-start/#-->
<!--Documentation Auth Flow : https://developer.spotify.com/documentation/general/guides/authorization-guide/#implicit-grant-flow-->
<body>
	<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
		<?php
			include './includes/nav.php';
		?>
	</div>
	<?php include 'includes/user_feedback.php'; ?>
	<div class="container" style="margin-bottom: 1em;">
		<div class="row align-items-center">
			
			<div class="col align-self-center">
				<div class="card text-center">
				  <div class="card-header bg-dark text-light">
				    Remplis ce formulaire pour créer un nouveau programme ! Tu trouveras quelques conseils <a class="text-info" href="#conseils">juste ici</a> 👊
				  </div>
				  <div class="card-body">
				    <form method="POST" action="functions/program_builder.php" class="form">
				      <div class="form-group row">
				        <label for="program_name" class="col-sm-4 col-form-label">Donnes un nom à ce programme</label>
				        <div class="col-sm-8">
				          <input type="text" class="form-control" name="program_name" id="program_name">
				        </div>
				      </div>
				      <div class="form-group row">
				        <label for="program_description" class="col-sm-4 col-form-label">Décris le en quelques mots</label>
				        <div class="col-sm-8">
				          <textarea class="form-control" name="program_description" id="program_description"></textarea>
				        </div>
				      </div>
				      <!--
				      <div class="form-group row">
				        <label for="type" class="col-sm-4 col-form-label">A qui destines tu ce programme</label>
				        <div class="col-sm-8 ">
				        	<select class="form-control" id="type" name="type">
				        		<option>C'est pour moi</option>
				        		<?php
				        			for ($i=0; $i < count($users); $i++) { 
 										//echo "<option>".$users[$i]["firstname"]." - (".$users[$i]["id"].")</option>" ;
									}
				        		?>

				    		</select>
				        </div>
				      </div>
				  -->
				      <div class="form-group row">
				          <label for="objectif" class="col-sm-4 col-form-label">Quel est l'objectif principal ?</label>
				          <div class="col-sm-8 ">
				          	<select class="form-control" id="objectif" name="objectif">
				          		<option>Rester en forme</option>
				          		<option>Se muscler</option>
				          		<option>Gagner en force</option>
				          		<option>S'assouplir</option>
				          		
				      		</select>
				          </div>
				        </div>
				        <div class="form-group row">
				          <label for="type" class="col-sm-4 col-form-label">Quelle difficultée pour ce programme ?</label>
				          <div class="col-sm-8 ">
				          	<select class="form-control" id="difficulty" name="difficulty">
				          		<option>Facile</option>
				          		<option>Moyen</option>
				          		<option>Difficile</option>
				          		<option>Hardcore</option>
				          		
				      		</select>
				          </div>
				        </div>
				      <div class="exercise-load">
				      	<div></div>
				      </div>
					  <div class="container bg-light" style="padding: 10px;"> 
					  	<p><a class="add-exercise"  href="#">Ajouter une séance</a></p>		   
					  </div>
					  <div class="row"><p>&nbsp;</p></div>
					 <!--
					  <div class="form-group row ">

					  	<div class="col-sm-5 text-right">
					  	<input class="form-check-input" type="checkbox" id="notify" name="notify" value="disabled">
					  	</div>

					    <div class="col-sm-6 text-left">
					      <label class="form-check-label " for="notify">Alerter l'heureux destinataire</label>
					    </div>
					  </div>
					-->
					  <div class="form-group row ">

					  	<div class="col-sm-5 text-right">
					  	<input class="form-check-input" type="checkbox" id="sharable" name="sharable" value="disabled">
					  	</div>

					    <div class="col-sm-6 text-left">
					      <label class="form-check-label " for="sharable">Partager avec la communauté</label>
					    </div>
					  </div>
							  		
							  		
								  
				      <div class=" form-group row">
				      		<div class="col-12 align-self-center">
						      <div class="form-group row">
						      	<div class="col align-self-center" >
						      		<input type="number" class="form-control" style="visibility: hidden;" name="count" id="count" value="1">
						      		<input type="submit" class="btn btn-dark" value="Créer">
						      	</div>
						      </div>
						     </div>
					  </div>
				    </form>
				  </div>
				</div>
			</div>
			
		</div>

		<?php
		//In order to display some default values, we're creating a JS object to output the content of exercise query
		//echo "<script>\n
		//		var exerciseDefinition =";
		//$exerciseDefinition = json_encode($exercise,JSON_UNESCAPED_UNICODE);
		//echo $exerciseDefinition;
		//echo ";";
		//echo "</script>";
		?>
	    
		    </div>
		  </div>
		
		</div>

	</div>

	<?php include 'includes/bug-report.php' ?>

	<!--Bootstrap libraries-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<!--End Bootstrap libraries-->
	<script type="text/javascript" src="./purl.js"></script>
	<!--Spotify SDK-->
	<!--
	<script src="https://sdk.scdn.co/spotify-player.js"></script>
	<script type="text/javascript" src="./spotify-connect.js"></script>
	-->
	
	<script type="text/javascript">
		$(document).ready(function(){
		var exerciseId=0;
			//programme_type=$('#type')[0].value;
		$('#bug-report-modal').modal('hide');

		$('.add-exercise').click(function(e){
			e.preventDefault();
			exerciseId++;
			$('#count')[0].value = exerciseId;
			console.log("Exo ajouté");
			$('.exercise-load:last').load("./includes/program_form.php",{"exercise_id":exerciseId});
			
			

		});


		//var exercisesValues = "";
		//var exercisesList = $(".exerciseType");


		function getExo(exo) { 
		 // return exo.name === exercice1Value;
		}
		function getExo2(exo) { 
			    //return exo.name === exercisesValues;
			   // console.log(i+"-"+exercisesList[i].value);
		}			
		

		

		});
	</script>
	<script type="text/javascript" src="./user_feedback.js"></script>
	<script src="html-duration-picker.min.js"></script>
	<script type="text/javascript" src="custom.js"></script>
</body>
</html>


