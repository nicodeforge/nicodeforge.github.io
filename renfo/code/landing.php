<?php
session_start();
if (isset($_ENV['env']) && $_ENV['env'] ==='local'){
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);	
}
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
		.error{
			color: #dc3545;	
		}

		.text-spacer{
			/*margin-top: 1em;*/
			margin-bottom: 2em;
		}
	</style>

</head>
<body>
	<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
		<?php
			//include 'includes/nav.php';
		?>
	</div>
	<!--Start Only on big screen-->
	<div class="bg-dark d-none d-sm-block text-light container-fluid text-spacer" id="intro" style="overflow: hidden;">
		<div class="row">
			<div class="col col-md-6">
				<img class="img-fluid" src="images/photo-homepage.jpg" width="100%">		
			</div>
			<div class="col col-md-6 m-auto align-middle text-center" >
				<h1 class="text-spacer">On va pas se mentir</h1>
				<h2 class="text-spacer">T'es pas prêt de faire un Iron Man</h2>
				<a href="#" id="cta" class="btn btn-light btn-lg">C'est pas faux</a>
			</div>
		</div>
		
	</div>
	<!--End Only on big screen-->
	<!--Start Only on small screen-->
	<div class="bg-dark d-block d-sm-none text-light container-fluid text-spacer" id="intro">
		<div class="row">
			
			<div class="col col-md-6 m-auto align-middle text-center" >
				<h1 class="text-spacer">On va pas se mentir</h1>
				<p><img class="img-fluid" src="images/photo-homepage.jpg" height="100%" width="100%"></p>
				<h2 class="text-spacer">T'es pas prêt de faire un Iron Man</h2>
				<a href="#" id="cta" class="btn btn-light btn-lg text-spacer">C'est pas faux</a>
			</div>
		</div>
		
	</div>
	<!--End Only on small screen-->
	<div class="container-fluid mt-4 mb-4" id="excuses">
		<div class="row">
			<div class="col m-auto text-center" style="padding: 0px;">
				<div class="row mt-6 mb-6">
					<div class="col m-auto text-center m-6" style="padding: 0px;">
						<h1 class="text-spacer">Tu aimes bien trop la pizza pour y renoncer</h1>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class="col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h2 class="text-spacer">Le gras c'est la vie</h2>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h3 class="text-spacer">T'as pas le time</h3>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h1 class="text-spacer">Mais</h1>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class="col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h2 class="text-spacer">Tu te dis qu'il faudrait t'y mettre</h2>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h3 class="text-spacer">Tu sais que ça te ferait du bien</h3>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h1 class="text-spacer">Mais</h1>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class="col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h2 class="text-spacer">Tu n'as aucune envie de t'inscrire en salle de sport</h2>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h3 class="text-spacer">Tu ne sais même pas par où commencer</h3>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h1 class="text-spacer">Mais</h1>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class="col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h2 class="text-spacer">C'est juste normal</h2>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h3 class="text-spacer"><strong>Bienvenue dans les 99% de la population 👋</strong></h3>
					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h4 class="text-spacer">Tu vas voir, on est pas si mal ici</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid mt-4 mb-4 bg-dark text-light" style="padding: 0px; padding-top: 1em;">
		<div class="row">
			<div class="col m-auto text-center" style="padding: 0px;">
				<div class="row mt-6 mb-6 ">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h1 class="text-spacer">Bravo, tu as fais le premier pas. C'est beau.</h1>
					</div>
				</div>
				<div class="row mt-6 mb-6 ml-3 mr-3" >
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 1em 2em; font-size:1.3em;">
						<p class="text-spacer">Avec [INSERER NOM DE MON APPLI], tu te construis le programme qui te conviens, avec des séances adaptées à TON niveau, que tu suis au rythme que TU veux.</p>
						<p class="text-spacer">Si tu ne connais absolument rien au subtil art de prendre soin de soi, sans faire une croix sur la pizza, on a construit quelques programmes rien que pour toi.</p>
						<p class="text-spacer">Si tu es un peu plus déter', tu auras accès à des programmes élaborés sur-mesure selon tes besoins.</p>
						<p class="text-spacer">Tu n'auras pas à sortir de chez toi.</p>
						<p class="text-spacer"><strong>C'est gratuit. Tes données perso ne sont pas revendues.</strong></p>
					</div>
				</div>
				<div class="row mt-6 mb-6 ">
					<div class=" col m-auto text-center mt-6 mb-6" style="padding: 0px;">
						<h2 class="text-spacer">C'est bon, tu es convaincu ?</h2>
						<a href="inscription.php" class="text-spacer btn btn-lg btn-success">Ouaip, je m'inscris</a></h2>
						<a href="#" id="nope" class="text-spacer btn btn-lg btn-danger">Nope</a></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Bootstrap libraries-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<!--End Bootstrap libraries-->
	<script type="text/javascript" src="./purl.js"></script>
	<!--Spotify SDK-->
	<!--
	<script src="https://sdk.scdn.co/spotify-player.js"></script>
	<script type="text/javascript" src="./spotify-connect.js"></script>
	-->
	<script type="text/javascript">
		$(document).ready(function(){

			var height = $(window).height();

			$("#cta").click(function(e) {
				e.preventDefault();
			    $([document.documentElement, document.body]).animate({
			        scrollTop: $("#excuses").offset().top
			    }, 2000);
			});
			$("#nope").click(function(e) {
				e.preventDefault();
			    $([document.documentElement, document.body]).animate({
			        scrollTop: $("#intro").offset().top
			    }, 2000);
			});

			$("#intro").css({height:height});
			

		});
	</script>
	
	<script type="text/javascript" src="./user_feedback.js"></script>
</body>
</html>