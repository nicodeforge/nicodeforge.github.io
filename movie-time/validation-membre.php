<?php
	$usermail = $_GET['k'];
	$userreg = $_GET['t'];
	include('includes/header.php');
?>
</head>

<body id="pagetop">
	
	<?php 
		include('includes/navbar-default.php');
	?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-md-offset-2">
				<?php 

					if ($t=$k) {
						# code...
						$urp = $t;
						session_start();
						include('functions/get-user.php');

						$_SESSION['email'] = sha1($email);
						
						header("Location : ../espaceprive.php?m=" . $_SESSION['email']);
					}else{
						echo '<p class="aler alert-danger">Un problème est survenu lors de la création de votre compte! :/</p>';
					}
					
				?>
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