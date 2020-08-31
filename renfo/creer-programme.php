<?php
session_start();
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
$mysqli->set_charset("utf8");
$sql = "select type from renfo_exercise group by type;";
$sql .= "select name,default_time,default_series,default_recup_time from renfo_exercise group by name;";


if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

/* "Create table" ne retournera aucun jeu de résultats */

/*
if ($mysqli->multi_query($sql) === TRUE) {
    printf("Requete succes.\n");
}
*/

/* Requête "Select" retourne un jeu de résultats */
$query_result = $mysqli->multi_query($sql);
$i = 0;
$type = array();
$exercise = array();

if ($query_result) {
    do {
    	
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                //echo "<p>".$row[0]." - ".$i."</p>";
                if ($i == 0) {
                	//Store result of first query
                	array_push($type, $row[0]);

                }elseif ($i == 1) {
                	//$exercise = $row[0];
                	//array_push($exercise, );
                	
                	array_push($exercise, array('name' => $row[0] ,'time' => $row[1],'series' => $row[2],'recup' => $row[3]));
                }

                
                //$i++;
            }
            $i++;
            $result->free();
        }
        
    } while ($mysqli->more_results() && $mysqli->next_result());
}
$mysqli->close();


/*if ($result = $mysqli->query($sql)) {
    if ($result -> num_rows > 0){
    	while ($row = mysqli_fetch_assoc($result)) {
    		echo "<p>".$row["type"]."</p>";
      		  
    	}
    }
    $result->close();
    $mysqli->close();
}*/

?>
<!--Dashboard Spotify : https://developer.spotify.com/dashboard/applications/27d9073503b54f019e6524c72038b3d9-->
<!--Documentation Web Playback SDK : https://developer.spotify.com/documentation/web-playback-sdk/quick-start/#-->
<!--Documentation Auth Flow : https://developer.spotify.com/documentation/general/guides/authorization-guide/#implicit-grant-flow-->

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Créer un nouveau programme</title>
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
				    Remplis ce formulaire pour créer ton programme ! Tu trouveras quelques conseils <a class="text-info" href="#conseils">juste ici</a> 👊
				  </div>
				  <div class="card-body">
				    <form method="POST" action="functions/program_builder.php" class="form">
				      <div class="form-group row">
				        <label for="progname" class="col-sm-4 col-form-label">Donnes lui un nom</label>
				        <div class="col-sm-8">
				          <input type="text" class="form-control" name="progname" id="progname">
				        </div>
				      </div>
				      <div class="form-group row">
				        <label for="type" class="col-sm-4 col-form-label">Quel types d'exercices ?</label>
				        <div class="col-sm-8 ">
				        	<select class="form-control" id="type" name="type">
				        		<?php
				        			for ($i=0; $i < count($type); $i++) { 
				        				echo "<option>".$type[$i]."</option>";
				        			}
				        		?>
				    		</select>
				        </div>
				      </div>
				        <div class="form-group row">
				          <label for="type" class="col-sm-4 col-form-label">Quelle difficultée pour ce programme ?</label>
				          <div class="col-sm-8 ">
				          	<select class="form-control" id="difficulty">
				          		<option>Facile</option>
				          		<option>Moyen</option>
				          		<option>Difficile</option>
				          		<option>Hardcore</option>
				          		
				      		</select>
				          </div>
				        </div>
				      <div class="exercice-description container bg-light" style="padding: 10px;"> 
						      <div class="form-group row">
						        <label for="exercice1" class="col-sm-4 col-form-label">Exercice #1</label>
						        <div class="col-sm-8 ">
						          <select class="form-control exerciseType" id="exercice1" name="exercice1">
						               <?php
						               	for ($i=0; $i < count($exercise); $i++) { 
						               		echo "<option>".$exercise[$i]["name"]."</option>";
						               	}
						               ?>
						          </select>
						        </div>
						      </div>
						      <div class="form-group row">
						        <label for="series1" class="col-sm-4 col-form-label">Combien de séries ?</label>
						        <div class="col-sm-8 ">
						          <div class="col-sm-8">
						          	<input type="number" class="form-control" name="series1" id="series1" value="">
						          </div>
						        </div>
						      </div>
						      <div class="form-group row">
						        <label for="time1" class="col-sm-4 col-form-label">Combien de temps par série ?</label>
						        <div class="col-sm-4 ">
						          <div class="col-sm-8">
						          	<input type="text" class="form-control html-duration-picker"  data-duration="00:00:45" name="time1" id="time1">
						          </div>
						        </div>
						      </div>
						      <div class="form-group row">
						        <label for="recup1" class="col-sm-4 col-form-label">Combien de temps de récup ?</label>
						        <div class="col-sm-4 ">
						          <div class="col-sm-8">
						          	<input type="text" class="form-control html-duration-picker"  data-duration="00:00:45" name="recup1" id="recup1">
						          </div>
						        </div>
						      </div>
					  </div>
				      <div class="exercise-load">
				      	<div></div>
				      </div>
					  <div class="container bg-light" style="padding: 10px;"> 
					  	<p><a class="add-exercise"  href="#">Ajouter un exercice</a></p>		   
					  </div>
					  <div class="row"><p>&nbsp;</p></div>
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
		echo "<script>\n
				var exerciseDefinition =";
		$exerciseDefinition = json_encode($exercise,JSON_UNESCAPED_UNICODE);
		echo $exerciseDefinition;
		echo ";";
		echo "</script>";
		?>
	    
		    </div>
		  </div>
		
		</div>

	</div>
	<div class="container" id="conseils">
		<div class="row">
			<div class="col">
				<h2>Conseils pour créer ton programme</h2>
				<div class="alert show alert-warning user-feedback" role="alert">
				  <p> <strong>Cette appli n'a pas pour vocation de remplacer un vrai coach sportif.</strong></p>
				  <p>Si tu n'as aucune idée de ce que tu fais, c'est peut être mieux de te renseigner un peu avant ! Voilà quelques ressources qui pourrait t'aider</p>
				  <ul>
				  	<li><a href="https://www.google.com/aclk?sa=l&ai=DChcSEwiu2PW6iMXrAhUyGgYAHfQ6CwcYABAEGgJ3cw&sig=AOD64_004t5t8aPyffOjuK-bggkWaJdbQQ&ctype=5&q=&ved=2ahUKEwiW5O-6iMXrAhUFCRoKHcY6CK4Q9aACegQIDRBC&adurl=">Programme Lafay </a></li>
				  	<li><a href="https://www.sport-passion.fr/conseils/comment-construire-un-programme-entrainement-musculation.php">Programme de musculation </a></li>
				  </ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h3>Comment ça marche ?</h3>
				<p>Le formulaire va t'aider à construire ton programme, exercice par exercice. Commence par choisir un exercice, puis indiques le nombre de séries que tu souhaites faire.</p>
				<p>Indiques ensuite la durée de l'exercice pour chaque série : combien de temps tu vas faire cet exercice.</p>
				<p>Entre chaque série, tu auras un temps de récupération. Tu peux fixer la durée de cette pause dans le champ "Temps de récup".</p>
				<p>Tu peux ensuite ajouter un exercice en cliquant sur "Ajouter un exercice".</p>
				<p><strong>N'oublie pas de finir ton programme avec des étirements. C'est important les étirements.</strong></p>
				<p>Tu peux choisir de rendre ton programme disponible pour les autres utilisateurs de l'appli en cochant la case "Partager avec la communauté"</p>
				<p>Dès que tu as enregistré tous les exercices que tu souhaites, clic sur le bouton "Créer".</p>
				<p>Tu seras alors redirigé vers la page de tes programmes, et celui que tu viens de créer s'affichera à l'écran.</p>
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
		var exerciseId=1;
		$('#bug-report-modal').modal('hide');

		$('.add-exercise').click(function(e){
			e.preventDefault();
			if (exerciseId > 9) {
				$('.add-exercise').hide();
				alert("Nombre max d'exercices atteint pour ce programme");
			}else{
				exerciseId++;
				$('#count')[0].value = exerciseId;
				console.log("Exo ajouté");
				$('.exercise-load:last').load("./includes/exercise_form.php",{"exercise_id":exerciseId});
				updateDefaults();
				updateDefaults2();
			}
			
		});

		

		var exercice1Value = $('#exercice1')[0].value;
		
		updateDefaults();


		var exercisesValues = "";
		var exercisesList = $(".exerciseType");
			

		$('#exercice1').change(function(){
			updateDefaults();
		});	



		function updateDefaults ()	{

			exercice1Value = $('#exercice1')[0].value;

			$('#time1').attr("value",exerciseDefinition.find(getExo).time);
			$('#series1').attr("value",exerciseDefinition.find(getExo).series);
			$('#recup1').attr("value",exerciseDefinition.find(getExo).recup);

			
		}

		function updateDefaults2 ()	{

			for (var i = 0; i<exercisesList.length;i++){
				var time   =   "#time"+i,
					series   =   "#series"+i,
					recup   =   "#recup"+i;
				//exercice1Value = $('#exercice1')[0].value;
				exercisesValues = exercisesList[i].value;
				$(time).attr("value",exerciseDefinition.find(getExo2).time);
				$(series).attr("value",exerciseDefinition.find(getExo2).series);
				$(recup1).attr("value",exerciseDefinition.find(getExo2).recup);
			}

			
		}

		

		function getExo(exo) { 
		  return exo.name === exercice1Value;
		}
		function getExo2(exo) { 
			    return exo.name === exercisesValues;
			    console.log(i+"-"+exercisesList[i].value);
		}			
		

		

		});
	</script>
	<script type="text/javascript" src="./user_feedback.js"></script>
	<script src="html-duration-picker.min.js"></script>
	<script type="text/javascript" src="custom.js"></script>
</body>
</html>


