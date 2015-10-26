<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WIP">
    <title>Work In Progress</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha256-Ay17X/itZzhUFkDfLB9MICE7tbVwtPuFhcwDpABdbEA= sha512-eTtl6Aa3v8DrTCYWH7cAfXt6QW8DpsFn0hdCcYIWe6VDMyPMikXBWd/9bZR5YZNrmHBBu4KGdVgfPs1aEEgVIw==" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body id="pagetop">
  <?php
    include("includes/navbar-muted.php");
    $status = htmlspecialchars($_GET['m']);
  ?>
	<div class="container">
		<!--Main content goes here-->
    <?php
      if (isset($status) AND $status="Connection-has-failed") {
        include("includes/register-member.html");
      }
      include('includes/register-form.html');
    ?>
  
	</div>
  <?php
    include("includes/footer-noreturn.php");
  ?>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Javascript de Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
  <!-- <script src="functions/js.js"></script>-->
</body>
</html>