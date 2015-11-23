<?php
session_start();
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-film"></span> L'instant cinéma</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Bonjour</b>  <?php echo $_SESSION['prenom']; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php echo '<li><a href="myprofile.php?i=' . $urp . '" ><span class="glyphicon glyphicon-user"></span>  Voir mon profil</a></li> '; ?>
              <li><a href="mydraws.php"><span class="glyphicon glyphicon-briefcase"></span>  Mes emprunt</a></li>
              <li><a href="espaceprive.php"><span class="glyphicon glyphicon-gift"></span>  Mes envies</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="functions/close-session.php"><span class="glyphicon glyphicon-off"></span>  Deconnexion</a></li>
            </ul>
          </li>
        </ul>
        <!--
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Titre, année, genre...">
              <span class="input-group-btn">
                <a class="btn btn-primary" type="button" href="#"><span class="glyphicon glyphicon-equalizer"></a>
              </span>
            </div>
          </div>
        </form>-->

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>