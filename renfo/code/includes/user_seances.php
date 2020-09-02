<?php
$user = $_SESSION['user_id'];

include 'functions/db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt insert query execution
$mysqli->set_charset("utf8");
$sql = "SELECT p.* FROM renfo_seance p INNER JOIN renfo_user u ON p.user_id=u.id WHERE u.id = '".$user."'";

if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

/* "Create table" ne retournera aucun jeu de résultats */
if ($mysqli->query($sql) === TRUE) {
    printf("Requete succes.\n");
}

/* Requête "Select" retourne un jeu de résultats */
if ($result = $mysqli->query($sql)) {
    if ($result -> num_rows > 0){
    	while ($row = mysqli_fetch_assoc($result)) {
   		
   		//echo "Programme :".$row['name'];
   		//$programName = $row['name'];
   		//$programContent = $row['content'];
   		//$programLength = $row['length'];
   		//$programType = $row['type'];
        
        switch ($row['difficulty']) {
            case "Facile":
                $difficulty_indicator = "<span class=\"badge badge-success\">".$row['difficulty']."</span>";
                break;
           case "Moyen":
                $difficulty_indicator = "<span class=\"badge badge-primary\">".$row['difficulty']."</span>";
                break;
                
            case "Difficile":
                $difficulty_indicator = "<span class=\"badge badge-danger\">".$row['difficulty']."</span>";
                break;

            case "Hardcore":
                $difficulty_indicator = "<span class=\"badge badge-dark\">".$row['difficulty']."</span>";
                break;
            
            default:
              $difficulty_indicator = "";
        }

   		echo "<div class=\"card mb-4 col-md-4 col-sm-12\">\n
     		  		<div class=\"card-body\">\n
     		    		<h5 class=\"card-title\">".$row['name']." ".$difficulty_indicator."</h5>\n
     		    		<h6 class=\"card-subtitle mb-2 text-muted\">Durée de la séance > ".$row['length']."</h6>\n
                <p class=\"card-text\">Séance créé par tes soins</p>\n
     		   			<a id=\"".$row['slug']."\" href=\"#".$row['slug']."\" data-seance=\"".$row['name']."\" class=\"seance-selected card-link btn btn-link\">Commencer <i class=\"fa fa-rocket\" aria-hidden=\"true\"></i></a>\n
     		  		</div>\n
              <div class=\"card-body\">\n
                <p class=\"card-text text-muted\">ID : ".$row['id']."</p>\n
              </div>\n
            </div>";

        //$_SESSION["userId"]=$row["user_id"];

    	}
          echo "<div class=\"card mb-4 col-md-4 col-sm-12 bg-light\">\n
                  <div class=\"card-body\">\n
                    <p class=\"text-center m-5 p-5 align-middle m-auto\" ><a href=\"./creer-seance.php\"><i class=\"fa fa-3x text-muted fa-plus\" aria-hidden=\"true\"></i></a></p>\n
                 </div>\n
               </div>";
    }else {echo "<p>Hmmm, c'est un peu vide ! Si ça te dis, tu peux contribuer en cliquant sur le + juste en dessous : 🤓</p>";
   echo "<div class=\"card mb-4 col-md-4 col-sm-12 bg-light\">\n
                  <div class=\"card-body\">\n
                    <p class=\"text-center m-5 p-5 align-middle m-auto\" ><a href=\"./creer-seance.php\"><i class=\"fa fa-3x text-muted fa-plus\" aria-hidden=\"true\"></i></a></p>\n
                 </div>\n
               </div>";
    $result->close();
    $mysqli->close();
  }
}
?>