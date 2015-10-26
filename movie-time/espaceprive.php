<?php
    session_start();
    include('functions/get-session.php');
    $urp = htmlspecialchars($_GET["m"]);
    $status = htmlspecialchars($_GET["t"]);
    include('includes/header.php');
?>

      <style type="text/css">
        body{
          margin-top: 75px;
        }
        .glyphicon-filter{
          color: #eee;
          z-index: 100;
        }


      </style>
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    
<body>
  <?php
    //echo $urp;
   // include('functions/get-user.php');
    include('includes/navbar-logged.php');
  ?>
	<div class="container">
		<!--Main content goes here-->
    <!-- Button trigger modal -->
        <!-- Modal -->
    <div class="modal fade backdrop" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Créer une fiche film</h4>
          </div>
          <div class="modal-body">
            <form action="fonctions/enregistre-film.php" method="POST">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du film"></input>
                  <input type="year" class="form-control" id="annee" name="annee" placeholder="Année du film"></input>
                  <input type="text" class="form-control" id="imgUrl" name="imgUrl" placeholder="URL vers la jacquette"></input>
                  <input type="description" class="form-control" id="resume" name="resume" placeholder="Résumé du film"></input>
                </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-success">Créer la fiche</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h2>Mes films préférés</h2>
        <?php
          include('functions/display-star-results.php');
        ?>
        <p>Vous n'avez pas encore enregistré de film.</p>
        <button type="button" class="btn btn-lg btn-danger" id="love" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-heart"></span> Créer une fiche</button>


      </div>

    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h2>Tous les films disponibles :</h2>
        <div class="container-fluid">
        <?php
          include('functions/display-all-results.php');
        ?>
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
  <script type="text/javascript">
    $(function(){
      $("#love").click(function(){

      });
    });
  </script>
</body>
</html>