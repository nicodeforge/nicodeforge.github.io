<?php
if (isset($_ENV['env']) && $_ENV['env'] =='local'){
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);
}

//$username = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
?>
<nav style="width:100%;" class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <a class="navbar-brand" href="#">Let's get fit <sup><span style="font-size:0.8em;" class="text-info">bêta</span></sup> 💪</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php
    if (isset($_ENV['env']) && $_ENV['env']==='local') {
      echo  "<a href=\"debug.php\">go to debug</a>";
    }
  ?>
  
  
  <div class="collapse navbar-collapse"  id="navbarText">
    
    <?php
    if (isset($_SESSION["user"])) {
    echo "\n
    <ul class=\"navbar-nav\">\n
      <li class=\"nav-item dropdown\">\n
        <a class=\"nav-link text-white dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>&nbsp; \n".
                      
                      
                        $_SESSION["user"]
                      
                      
                      
                      
        ."</a>\n
        <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">\n
          <a class=\"dropdown-item\" href=\"programme.php\">Mes programmes</a>\n
          <a class=\"dropdown-item\" href=\"creer-programme.php\">Créer un nouveau programme</a>\n
          <div class=\"dropdown-divider\"></div>\n
          <a class=\"dropdown-item\" href=\"seance.php\">Mes séances</a>\n
          <a class=\"dropdown-item\" href=\"creer-seance.php\">Créer une nouvelle séance</a>\n
          <div class=\"dropdown-divider\"></div>\n
            <a class=\"dropdown-item\" href=\"./deconnexion.php\">Déconnexion</a>\n
        </div>\n
      </li>\n
    </ul>\n
    ";
  }
  
   
  
  ?>
  </div>
</nav>
