<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WIP">
    <title>Work In Progress</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
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
	<div class="container">
		<!--Main content goes here-->
    <form class="dropdown-menu" id="login" action="functions/login-service.php" method="POST">
      <div class="form-group m-10">

        <div class="input-group">
            <span class="input-group-btn" id="basic-addon1">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-user"></span>
              </button>
            </span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Votre prénom" aria-describedby="name"><br />
        </div><!--Fin de INPUT GROUP-->

        <div class="input-group m-10">
            <span class="input-group-btn" id="basic-addon1">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-user"></span>
              </button>
            </span>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Votre nom" aria-describedby="surname"><br />
        </div><!--Fin de INPUT GROUP-->

        <div class="input-group m-10"> 
            <span class="input-group-btn" id="basic-addon1">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-envelope"></span>
              </button>
            </span> 
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email"><br />
        </div>

        <div class="input-group m-10"> 
            <span class="input-group-btn" id="basic-addon1">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-lock"></span>
              </button>
            </span> 
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe"><br />
        </div>

         <div class="input-group m-10"> 
            <span class="input-group-btn" id="basic-addon1">
              <button class="btn btn-info" type="button">
                <span class="glyphicon glyphicon-lock"></span>
              </button>
            </span> 
            <input type="password" class="form-control" id="rwpassword" name="rwpassword" placeholder="Répétez votre mot de passe"><br />
        </div>


        <div class="input-group m-10"> 
            <span class="input-group-btn" id="basic-addon1">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-local"></span>
              </button>
            </span> 
            <input type="text" class="form-control" id="localisation" name="localisation" placeholder="Où habitez-vous ?"><br />
        </div>

        <div class="input-group m-10"> 
            <span class="input-group-btn" id="basic-addon1">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-star"></span>
              </button>
            </span> 
            <input type="text" class="form-control" id="pasta" name="pasta" placeholder="Quel est votre plat préféré ?"><br />
        </div>

        
          <button class="btn btn-sm btn-default
           pull-right" type="submit"><span class="glyphicon glyphicon-play"></span></button>
        
      </div>
    </form>
	</div>
  <?php
    include("includes/footer-default.php");
  ?>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Javascript de Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
</body>
</html>