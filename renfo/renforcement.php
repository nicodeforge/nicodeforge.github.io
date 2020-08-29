<?php
session_start();
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
	
	<style type="text/css">
		.program-choice .card{
			margin-right: 30px;
		}
		#timer-beep {
		  position: absolute;
		  top: -100000em;
		}
	</style>
</head>
<body>
	<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
		<?php
			include 'includes/nav.php';
		?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm text-center">
				
				<p>&nbsp;</p>
			</div>
		</div>
		<?php include "./includes/programs.php" ?> 
		<div class="row">
			<div class="col-sm text-center">
				<p>&nbsp;</p>
			</div>
		</div>
	</div>

	<?php
		include 'includes/ProgramContent.php';
		
	?>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<button id="auth-spotify" class="btn btn-dark "><i class="fa fa-spotify" aria-hidden="true"></i> Autoriser Spotify</button>
			</div>
			<p>&nbsp;</p>
		</div>
		<div class="row">
			<div class="col-12 align-self-center">
				<p>En cours de lecture : <span class="currently-playing">rien du tout 🤷‍♂️</span></p>
				<div class="btn-toolbar align-self-center" role="toolbar">
					<div class="btn-group mr-2" role="group">
						<button id="prev" type="button" class="btn btn-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/><path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg></button>
					</div>
					<div class="btn-group mr-2" role="group">
						<button id="play" type="button" class="btn btn-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-play" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/></svg></button>
					</div>

					<div class="btn-group mr-2" role="group">
						<button id="next" type="button" class="btn btn-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/><path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/></svg></button>
					</div>
					
				</div>
			</div>
		</div>
		</div>
				
		
		
	</div>
	<audio id="timer-beep">
	  <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/41203/beep.mp3"/>
	  <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/41203/beep.ogg" />
	</audio>
	
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

			//$('#program').hide();
			//Functions for program

			//Display the current and next exercise
			$('.program-selected').click(function(){
				
				var programVariant = $.url();
				programVariant = $.url(this.href).attr('fragment');
				//console.log(programVariant);

				//document.cookie = "program="+programVariant; 

				$.ajax({
				  method: "POST",
				  url: "functions/GetProgramContent.php",
				  cache:false,
				  dataType: "json",
				  data: { 
				  	variant: programVariant
				  	
				  },
				  success : function(data){
				  	programContent = data;
				  	console.log("Data: "+data);
				  	displayProgram(currentExerciseId);
				  }
				});
				
				
				

				$('.program-choice').hide();

				//programUrl = "./program-content.json";
				//getProgramContent(programUrl);
				soundEffect.play();
				soundEffect.src = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/41203/beep.mp3';
				
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


			function displayProgram (id){
				$('#program-content').show();
				console.log(programContent.length);
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
				        soundEffect.play();
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

</body>
</html>


