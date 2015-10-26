<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
   		<meta name="description" content="WIP">
   		<title>Work In Progress</title>

    	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-GHW2S7IZAQe8+YkyL99LyDj1zdWXSPOG+JZafCtKiSc= sha512-vxM32w6T7zJ83xOQ6FT4CEFnlasqmkcB0+ojgbI0N6ZtSxYvHmT7sX2icN07TqEqr5wdKwoLkmB8sAsGAjCJHg==" crossorigin="anonymous">

    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
<body>
  <?php
    include('includes/navbar-logged.php')
  ?>
	<div class="container">
		<!--Main content goes here-->
     <div class="jumbotron">
      <div class="header">
        <h1>Bienvenue dans la plus grande librairie de films cultes.</h1>
      </div>
      <div class="body">
        <p>Nous avons créé pour vous la plus grande librairie de films cultes disponibles sur le web.</p>
      </div>
      
    </div>
    <?php
          //include('functions/search-products.php');
      include('functions/sort-query.php');
  
    include("includes/footer-default.php");
  
       ?>
	</div>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Javascript de Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js" integrity="sha256-+h0g0j7qusP72OZaLPCSZ5wjZLnoUUicoxbvrl14WxM= sha512-0z9zJIjxQaDVzlysxlaqkZ8L9jh8jZ2d54F3Dn36Y0a8C6eI/RFOME/tLCFJ42hfOxdclfa29lPSNCmX5ekxnw==" crossorigin="anonymous"></script>
</body>
</html>