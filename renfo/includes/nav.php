<?php
if ($_ENV['env']=='local'){
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);
}

//$username = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
?>
<nav style="width:100%;" class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Let's get fit 💪</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <?php
    
    //  if (isset $username) {
       
     echo "
     <ul class=\"navbar-nav mr-auto\">\n
       <li class=\"nav-item\">\n
         <a class=\"nav-link\" href=\"renforcement.php\">Mes programmes <span class=\"sr-only\">(current)</span></a>\n
       </li>\n
       <li class=\"nav-item\">\n
         <a class=\"nav-link\" href=\"creer-programme.php\">Créer</a>\n
       </li>\n
       <li class=\"nav-item\">\n
         <a class=\"nav-link\" href=\"./deconnexion.php\">Déconnexion</a>\n
       </li>\n
     </ul>\n
     ";
    //}

     
   ?>
    <span class="navbar-text">
      <?php 
        /*
        if ($username]) {
          echo $username;
        }else{
          echo "Howdy";
        }
        */
      ?>
    </span>
  </div>
</nav>
