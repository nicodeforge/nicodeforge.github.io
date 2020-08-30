<?php
session_start();
if (isset($_ENV['env']) && $_ENV['env'] ==='local'){
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);	
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
</head>
<body>
	<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
		<?php
			include 'includes/nav.php';
		?>
	</div>
	<?php include 'includes/user_feedback.php'; ?>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-2"></div>
			<div class="col align-self-center">
				<div class="card text-center">
				  <div class="card-header bg-dark text-light">
				    Login
				  </div>
				  <div class="card-body">
				    <form method="POST" action="functions/log_in_old_school.php">
				      <div class="form-group row">
				        <label for="login" class="col-sm-4 col-form-label">Login</label>
				        <div class="col-sm-8">
				          <input type="text" class="form-control" name="login" id="login-reg">
				        </div>
				      </div>
				      <div class="form-group row">
				        <label for="password" class="col-sm-4 col-form-label">Password</label>
				        <div class="col-sm-8 ">
				          <input type="password" class="form-control" name="password" id="password-reg">
				        </div>
				      </div>
				      <div class=" form-group row">
				      		<div class="col-4 align-self-center">
						      <div class="form-group row">
						      	<div class="col align-self-center" >
						      		<!--<button id="submit" class="btn btn-primary">Log In</button>-->
						      		<input type="submit" class="btn btn-dark" value="Login">
						      	</div>
						      </div>
						     </div>
					  </div>
				    </form>
				  </div>
				  <div class="card-footer text-muted bg-dark text-light">
				    Vous n'avez pas de compte ? <a id="signup" data-toggle="modal" href="#signup-modal" class="text-info">Créez-en un</a> !
				  </div>

				</div>
			</div>
			<div class="col-2"></div>
		</div>
		<div id="signup-modal" class="modal" tabindex="-1">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Créez votre compte</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        
		      
					<form method="POST" action="functions/register_old_school.php">
				      <div class="form-group row">
				        <label for="login" class="col-sm-4 col-form-label">Login</label>
				        <div class="col-sm-8">
				          <input type="text" class="form-control" name="loginreg" id="loginreg">
				        </div>
				      </div>
				      <div class="form-group row">
				        <label for="email" class="col-sm-4 col-form-label">Email</label>
				        <div class="col-sm-8">
				          <input type="text" class="form-control" name="email" id="email">
				        </div>
				      </div>
				      <div class="form-group row">
				        <label for="password" class="col-sm-4 col-form-label">Password</label>
				        <div class="col-sm-8 ">
				          <input type="password" class="form-control" name="password" id="password">
				        </div>
				      </div>
				      <div class="form-group row">
				        <label for="access-key" class="col-sm-4 col-form-label">Clé d'accès</label>
				        <div class="col-sm-8">
				          <input type="text" class="form-control" name="access-key" id="access-key">
				        </div>
				      </div>
				      <div class=" form-group row">
				      		<div class="col-4 align-self-center">
						      <div class="form-group row">
						      	<div class="col align-self-center" >
						      		<!--<button id="submit" class="btn btn-primary">Log In</button>-->
						      		<input type="submit" class="btn btn-dark" value="S'inscrire">
						      	</div>
						      </div>
						     </div>
					  </div>
			    </form>
		</div>
	    
		    </div>
		  </div>
		
		</div>

	</div>
	
	
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
		$('.alert').alert();
			
		$('#signup-modal').modal('hide');				
			/*
			$('#submit').click(function(){
				//e.preventDefault;
				$.ajax({
				  method: "POST",
				  url: "./functions/LogIn.php",
				 
				  data: { 
				  	login: $('#login')[0].value,
				  	password: $('#password')[0].value,
				  	
				  },
				  success : function(data){
				  	if (data === "success") {
				  		$('.alert').alert();	
				  	}
				  	if (data === "failure") {
				  		alert('Oops');	
				  	}
				  	
				  }
				});
			});*/

		});
	</script>
	<script type="text/javascript" src="./user_feedback.js"></script>
</body>
</html>


