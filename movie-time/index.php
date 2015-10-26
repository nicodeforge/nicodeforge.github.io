<?php
  include('includes/header.php');
?>
  </head>
<body id="pagetop">
  <?php

    include('includes/navbar-login.php');
  ?>
  <header class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
          <!-- Overlay -->
          <div class="overlay"></div>

          <!-- Indicators -->
          <!--<ol class="carousel-indicators">
            <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#bs-carousel" data-slide-to="1"></li>
            <li data-target="#bs-carousel" data-slide-to="2"></li>
          </ol>-->
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item slides active">
              <div class="slide-1"></div>
              <div class="hero text-left">
                <hgroup>
                    <h1>L'instant cinéma</h1>        
                    <!--<h3 class="bg-primary"><span class="glyphicon glyphicon-bookmark"></span>   Affilié à la Fédération Française de Planeur Ultra-Léger Motorisé</h3>-->
                </hgroup>
               <!-- <a class="btn btn-primary btn-lg" href="#content">Connexion <span class="glyphicon glyphicon-triangle-bottom"></span></a>-->
              </div>
            </div>
            <!--
            <div class="item slides">
              <div class="slide-2"></div>
              <div class="hero">        
                <hgroup>
                    <h1>We are smart</h1>        
                    <h3>Get start your next awesome project</h3>
                </hgroup>       
                <button class="btn btn-hero btn-lg" role="button">See all features</button>
              </div>
            </div>

            <div class="item slides">
              <div class="slide-3"></div>
              <div class="hero">        
                <hgroup>
                    <h1>We are amazing</h1>        
                    <h3>Get start your next awesome project</h3>
                </hgroup>
                <button class="btn btn-hero btn-lg" role="button">See all features</button>
              </div>
            </div>
            -->
          </div> 
        </header>
        <div class="container m-50">
          <?php include('includes/register-form.html'); ?>
          <div class="row">
            <div class="col-md-9 col-md-offset-2 col-sm-12">
              <h2 class="text-lg">L'instant cinéma propose une sélection unique de films cultes, disponibles en VHS ou en DVD</h2>
                <div class="text-center m-50">
                  <a href="index2.php" class="btn btn-danger btn-lg align-center">Découvrir</a>
                </div>
            </div>
          </div>
        </div>  
   <?php
    include("includes/footer-default.php");
  ?>  
  
  
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Javascript de Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
  <script src="functions/js.js"></script>
  <!--<script type="text/javascript">
    $('#login').validate();
  </script>-->
</body>
</html>