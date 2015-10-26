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
        <a class="navbar-brand" href="#"> IDRAC Movie Time</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Connexion</a>
            <form class="dropdown-menu" id="login" action="functions/login-service.php" method="POST">
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
                
                  <button class="btn btn-sm btn-default pull-right" type="submit">Se connecter</button>
                  <button role="button" class="btn btn-sm btn-danger pull-right" type="button" id="register">S'inscrire</button>
                
              </div>
            </form>
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