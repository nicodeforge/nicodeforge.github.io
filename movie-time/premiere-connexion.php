<?php
	//$usermail = $_GET['k'];
	$userreg = $_GET['t'];
	include('includes/header.php');
?>
<style type="text/css">
	body{
		margin-top: 100px;
	}
</style>
</head>

<body id="pagetop">
	
	<?php 
		include('includes/navbar-default.php');
	?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-md-offset-2">
				<?php
	echo '<form id="login" action="functions/first-login-service.php?t=' . $userreg .'method="POST">';
				?>
				
              <div class="form-group p-5">
                
                <div class="input-group">
                    <span class="input-group-btn" id="basic-addon1">
                      <span class="btn btn-default">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" aria-describedby="email"><br />
                </div><!--Fin de INPUT GROUP-->
                
                <div class="input-group m-10"> 
                    <span class="input-group-btn" id="basic-addon1">
                      <span class="btn btn-default" >
                        <span class="glyphicon glyphicon-lock"></span>
                      </span>
                    </span> 
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Votre mot de passe"><br />
                </div>

                <div class="input-group m-10"> 
                    <span class="input-group-btn" id="basic-addon3">
                      <span class="btn btn-default" >
                        <span class="glyphicon glyphicon-star"></span>
                      </span>
                    </span> 
                    <input type="text" class="form-control" id="pass" name="pass" placeholder="Votre code à 4 chiffres"><br />
                </div>
                
                  <button class="btn btn-sm btn-danger pull-right" type="submit">Se connecter</button>
                
              </div>
            </form>
			</div>
		</div>
	</div>

	<?php 
		include('includes/footer-default.php');
	 ?>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Javascript de Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
  <!-- Custom scripts go there-->
  <!--Script pour le filtrage des résultats-->
  <script src="http://listjs.com/no-cdn/list.js"></script>
  <script src="http://listjs.com/no-cdn/list.fuzzysearch.js"></script>

  <script src="functions/js.js"></script>
  
</html>
</body>