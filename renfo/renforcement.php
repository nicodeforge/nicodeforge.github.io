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
	<title>Renforcement musculaire</title>
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
		.program-choice .card{
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
	<?php include 'includes/user_feedback.php'; ?> 
	
	<div class="container">
		<div class="container program-choice">
			<div class="row">
				<div class="col">
					<div class="container user-programs">
						<div class="row">
							<div class="col-">
								<h2>Voilà les programmes que tu as créé : </h2>
								<?php include "./includes/user_programs.php"; ?> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="container community-programs">
						<div class="row">
							<div class="col-">
								<h2>Voilà d'autres programmes créés par la communauté : </h2>
								<?php include "./includes/community_programs.php"; ?> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="audio-preference-container">
		<div class="row">
			<div class="col text-right">
				<form>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="audio-preference" value="disabled">
						  <label class="form-check-label align-middle" for="audio-preference" id="audio-preference-status">Audio désactivé</label>
						</div>
				</form>
				
			</div>
		</div>
	</div>
	<?php
		include 'includes/program_content.php';
		
	?>

	<div id="audio">
		
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
		var programContent = null,
			currentExerciseId=0,
			programUrl = "";

		$(document).ready(function(){
			$("#audio-preference-container").hide();
			$('#audio-preference-status').html("<i class='fa fa-volume-off fa-2x align-middle' aria-hidden='true'></i> Bips sonores désactivés");
			$('#audio-preference').change(function(){
				if ($('#audio-preference')[0].checked) {
					//Audio is on
					$('#audio-preference-status').html("<i class='fa fa-volume-up fa-2x align-middle' aria-hidden='true'></i> Bips sonores activés");
					soundEffect.play();
					soundEffect.src = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/41203/beep.mp3';	
					$('#audio').html(
						"<audio id='timer-beep'><source src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/41203/beep.mp3'/><source src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/41203/beep.ogg' /></audio>"
						);

				}else{
					//Audio is off
					$('#audio-preference-status').html("<i class='fa fa-volume-off fa-2x align-middle' aria-hidden='true'></i> Bips sonores désactivés");
					$('#audio').html("");
					soundEffect.src="";
				}

			});

			//$('#program').hide();
			//Functions for program

			//Display the current and next exercise
			$('.program-selected').click(function(){
				$("#audio-preference-container").show();
				var programVariant = $.url();
				programVariant = $.url(this.href).attr('fragment');
				var programName = $(this)[0].dataset.program;

				//document.cookie = "program="+programVariant; 

				$.ajax({
				  method: "POST",
				  url: "functions/get_program_content.php",
				  cache:false,
				  dataType: "json",
				  data: { 
				  	variant: programVariant
				  	
				  },
				  success : function(data){
				  	programContent = data;
				  	//console.log("Data: "+data);
				  	displayProgram(currentExerciseId,programName);
				  }
				});
				
				
				

				$('.user-programs').hide();
				$('.community-programs').hide();

				//programUrl = "./program-content.json";
				//getProgramContent(programUrl);
				if ($('#audio-preference')[0].checked) {
					soundEffect.play();
					soundEffect.src = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/41203/beep.mp3';	
				}
				
				
				/*
				if (programContent.length>0) {
					displayProgram(currentExerciseId);
					$('#program-content').show('fade');
				}*/
				
				//console.log('program selected');
			});

			function debugProgram(id,program){
				//console.log("id: "+id+" program:"+program);
			}


			function displayProgram (id,name){
				$('#program-content').show();
				//console.log(name);
				$('#program-name').text(name);
				var duration = 0;
				for (var i = programContent.length - 1; i >= 0; i--) {
					
					if (programContent[i]["name"]!="Pause") {
						
						duration += parseInt(programContent[i]["length"],10);

					}
				}
				
				var display_duration = new Date(duration * 1000).toISOString().substr(11, 8);
				$('#program-duration').text("Durée du programme sans pause : "+display_duration);
				//console.log(display_duration);
				//console.log(programContent.length);
				if (id < programContent.length){
					$('.program-content .exercise-name').text(programContent[id].name);
					$('.program-content .exercise-length').text(programContent[id].length);
					//$('.progress-bar').attr('aria-valuemax',program[id].length);
					//$('.progress-bar').attr('aria-valuemax',(100-(100/program[id].length)));
					//$('.progress-bar').css('width',(100-(100/program[id].length))+"%");
				}else{
					$('.program-content .exercise-name').text("Bien joué 💪 🎉");

					$('.program-content .exercise-timing').hide();
					$('.next').hide();
					$('#start').removeClass("disabled");
					$('.program-choice').show();

				}
				if (id < programContent.length-1) {
					$('.program-content .exercise-next').text(programContent[(programContent[id].id+1)].name);
					$('.program-content .exercise-next-length').text(programContent[(programContent[id].id+1)].length);
				}else{
					$('.program-content .exercise-next').text("FIN");
					$('.program-content .exercise-next-timing').hide();
				} 
				
			}
			//Display time elased
			$('#start').click(function(){
				timerShort();
				$('#start').addClass("disabled");
			});

			function loadNextExercise(){
				if (currentExerciseId < programContent.length){
					timerShort(currentExerciseId);
					$('.progress-bar').css('width',"100%");
				}
			};



			function timerShort () {
				var counter = $('.exercise-length').text()				
				var interval = setInterval(function() {
				    counter--;
				    // Display 'counter' wherever you want to display it.
				    $('.exercise-length').text(counter);
				    //$('.progress-bar').attr('aria-valuenow',counter);
				    var progress = counter*(100/(programContent[currentExerciseId].length)) + "%";
				    $('.progress-bar').css('width',progress);

				    if (counter == 0) {
				        // Display a login box
				        if ($('#audio-preference')[0].checked) {
				        	soundEffect.play();
				        }
				        clearInterval(interval);
				        currentExerciseId++;
				        displayProgram(currentExerciseId);
				        loadNextExercise();
				    }
				}, 1000);
			};


			//Start Spotify Auth FLow 
				
			$('#auth-spotify').click(function(){
				window.location = "https://accounts.spotify.com/authorize?client_id=27d9073503b54f019e6524c72038b3d9&response_type=token&redirect_uri=https://carnets-de-route-moto.fr/renforcement/index.htm&scope=streaming";
			});
				
			//End Spotify Auth Flow

		});
	</script>
	<script type="text/javascript" src="./user_feedback.js"></script>
	<script type="text/javascript" src="./functions/moment.js"></script>
	<script type="text/javascript" src="./custom.js"></script>

</body>
</html>


