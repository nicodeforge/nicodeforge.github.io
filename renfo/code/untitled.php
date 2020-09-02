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
	</style>

</head>
<body>
	<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
		<?php
			//include 'includes/nav.php';
		?>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-md-6" style="padding: 0px;">
				<img class="img-fluid" src="images/photo-homepage.jpg" height="100%" width="100%">		
			</div>
			<div class="col col-md-6 m-auto text-center" style="padding: 0px;">
				<h1>On va pas se mentir</h1>
				<h2>T'es pas prêt de faire un Iron Man</h2>
			</div>
		</div>
		
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-md-6" style="padding: 0px;">
				<img class="img-fluid" src="images/photo-homepage.jpg" height="100%" width="100%">		
			</div>
			<div class="col col-md-6 m-auto text-center" style="padding: 0px;">
				<h1>On va pas se mentir</h1>
				<h2>T'es pas prêt de faire un Iron Man</h2>
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
	
	<script type="text/javascript" src="./user_feedback.js"></script>
</body>
</html>