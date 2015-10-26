<?php
  include('includes/header.php');
?>
    </head>
<body id="pagetop">
  <?php
    include('includes/navbar-login.php');
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
    echo '<div class="row">';
      include('includes/register-form.html');
    echo "</div>";
    echo '<div class="row">';
      include('functions/sort-query.php');
    echo "</div>";
    echo '<div class="row">';
      include("includes/footer-default.php");
    echo "</div>";
  
       ?>
	</div>
      
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Javascript de Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
  <!-- Custom scripts go there-->
  <!--Script pour le filtrage des résultats-->
  <script src="http://listjs.com/no-cdn/list.js"></script>
  <script src="http://listjs.com/no-cdn/list.fuzzysearch.js"></script>

  <script src="functions/js.js"></script>
  
</body>
</html>