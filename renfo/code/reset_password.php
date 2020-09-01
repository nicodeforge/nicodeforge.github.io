<?php
session_start();
$token = $_GET["token"];

include 'functions/db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}


?>

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
			include 'includes/nav.php';
		?>
	</div>
	<?php include 'includes/user_feedback.php'; ?>
	<div class="container">
		<div class="row align-items-center">
			
			<div class="col align-self-center">
				<div class="card text-center">
				  <div class="card-header bg-dark text-light">
				    Pour recréer ton mot de passe, indiques ton email
				  </div>
				  <div class="card-body">
				    <form method="POST" action="functions/update_password.php">
				      <div class="form-group row">
				        <label for="password" class="col-sm-4 col-form-label">Nouveau mot de passe</label>
				        <div class="col-sm-8">
				          <input type="text" class="form-control" name="password" id="password">
				        </div>
				      </div>
				      <div class="form-group row">
				        <div class="col-sm-8">
				          <input type="text" hidden class="form-control" name="token" id="token" value="<?php echo $token; ?>">
				        </div>
				      </div>
			            <div class=" form-group row">
			            		<div class="col-12 align-self-center">
			      		      <div class="form-group row">
			      		      	<div class="col align-self-center" >
			      		      		<!--<button id="submit" class="btn btn-primary">Log In</button>-->
			      		      		<input type="submit" class="btn btn-dark" value="Valider le nouveau mot de passe">
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
			
			$('.alert').alert();

		});
	</script>
	<script type="text/javascript" src="./user_feedback.js"></script>
</body>
</html>


