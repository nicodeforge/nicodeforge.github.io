<?php
session_start();
if (!isset($_SESSION["user_id"])) {
	header("Location: ./index.php?q=do-auth");
}
include 'functions/functions.php';
?>
<!--Dashboard Spotify : https://developer.spotify.com/dashboard/applications/27d9073503b54f019e6524c72038b3d9-->
<!--Documentation Web Playback SDK : https://developer.spotify.com/documentation/web-playback-sdk/quick-start/#-->
<!--Documentation Auth Flow : https://developer.spotify.com/documentation/general/guides/authorization-guide/#implicit-grant-flow-->

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Mes programmes - Let's get fit</title>
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
		.seance-choice .card{
			margin-right: 30px;
		}
		#timer-beep {
		  position: absolute;
		  top: -100000em;
		}

		.container{
			margin-top: 1em;
			margin-bottom: 1em;
		}
	</style>
</head>
<body>
	<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
		<?php
			include 'includes/nav.php';
		?>
	</div>
	<div class="alert alert-dismissible alert-danger show user-feedback" role="alert">
	  <p class="text-center"><strong>Fais gaffe 😱</strong> Cette page est en cours de contstruction, il y a de grande chances pour qu'elle soit un peu instable</p>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<?php include 'includes/user_feedback.php'; ?> 
	
	
	<div class="container">
		<div class="container seance-choice">
			<div class="row">
				<div class="col">
					<div class="container user-seances">
						<div class="row">
							<div class="col">
								<h2>Voilà les programmes à ta disposition : </h2>
								<?php include "./includes/user_programs.php"; ?> 
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include 'includes/bug-report.php'; ?>
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
		const soundEffect = new Audio();
		var currentExerciseId=0,
			seanceUrl = "";

		// seance_object est définie dans le script php : get_seance_object.php

		$(document).ready(function(){

			listSeanceInProgram();

			function listSeanceInProgram (){
				for (var i = 0; i < program_content.program.length; i++) {
					//console.log(program_content.program[i]);
					getSeanceObject(program_content.program[i].id);
				}
				
			}

			function getSeanceObject(id){
				$.ajax({
				  method: "POST",
				  url: "functions/get_seance_object.php",
				  cache:false,
				  dataType: "json",
				  data: { 
				  	seance_id: id
				  	
				  },
				  success : function(data){
				  	seance_object = data;
				  	console.log("Data: "+data);
				  	showSeance(seance_object);
				  }
				});
			}
			

			//$('#program-title').text(program_content[id].name);
			function showSeance(seance){

				var difficulty = seance_object[0].difficulty;
				var difficulty_indicator = "";
				switch (difficulty) {
				            case "Facile":
				                difficulty_indicator = "<span class='badge badge-success'>"+difficulty+"</span>";
				                break;
				           case "Moyen":
				                difficulty_indicator = "<span class='badge badge-primary'>"+difficulty+"</span>";
				                break;
				                
				            case "Difficile":
				                difficulty_indicator = "<span class='badge badge-danger'>"+difficulty+"</span>";
				                break;

				            case "Hardcore":
				                difficulty_indicator = "<span class='badge badge-dark'>"+difficulty+"</span>";
				                break;
				            
				            default:
				              $difficulty_indicator = "";
				        }

				$('.program-content-items').append("<li class='list-group-item'>"+seance_object[0].name+ " - <span class='text-muted'>"+seance_object[0].length+"</span> - "+difficulty_indicator+"</li>");
				//console.log("Nom : "+seance_object[0].name);
				//console.log("Length : "+seance_object[0].length);
				//console.log("Difficulty : "+seance_object[0].difficulty);
			}
				
			//End Spotify Auth Flow

		});
	</script>
	<script type="text/javascript" src="./user_feedback.js"></script>
	<script type="text/javascript" src="./functions/moment.js"></script>
	<script type="text/javascript" src="./custom.js"></script>

</body>
</html>


