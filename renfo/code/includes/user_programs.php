<?php
$user = $_SESSION['user_id'];
$program_content_v2 = array();
include 'functions/db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt insert query execution
$mysqli->set_charset("utf8");
$sql = "SELECT p.*,u.firstname FROM renfo_program p INNER JOIN renfo_user u ON p.user_id=u.id WHERE u.id = '".$user."'";

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
    	$program_content = $row["content"];

        array_push($program_content_v2,$program_content);

    	echo "<script>var program_content = ".$program_content.", program_content_v2 = ".json_encode($program_content_v2).";</script>";
        
    //START NEW
    		echo "<div class=\"card mb-5 col- \">
    				<div class=\"card-body\">
    				<h5 class=\"card-title\" id=\"program-title\">".$row["name"]."</h5>
                    <h6 class=\"card-subtitle mb-2 \">".$row["objectif"]."</h6>
    				<p class=\"card-text\"><span id=\"program-nb-seance\">".$row["nb_seance"]."</span> séances - <span id=\"program-nb-weeks\">".$row["duration"]."</span> semaines</p>
    			<p class=\"card-text\" id=\"program-description\">".$row["description"]."</p>
                <p class=\"card-text text-muted mb-2 \">Créé par ".$row["firstname"]."</p>
    			<div class=\"progress\">
    			  <div class=\"progress-bar\" role=\"progressbar\" style=\"width: ".$row["progression"]."%\" aria-valuenow=\"".$row["progression"]."\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
    			</div>
    		</div>
    		<div class=\"card-body\">
    			<ul class=\"list-group list-group-flush program-content-items\">
    			    
    			  </ul>
    		</div>
    		<div class=\"card-body\">
    					<a id=\"id-programme\" href=\"#\" class=\"programme-selected card-link btn btn-success\">Continuer <i class=\"fa fa-rocket\" aria-hidden=\"true\"></i></a>
    					<a id=\"id-programme\" href=\"#\" class=\"programme-selected card-link btn btn-dark\">Abandonner <i class=\"fa fa-times\" aria-hidden=\"true\"></i></a>
    				</div>
    		</div>";
    // END NEW

    	
    	//START OLD		
        /*
   		echo "<div class=\"card col- \">\n
     		  		<div class=\"card-body\">\n
     		    		<h5 class=\"card-title\">".$row['name']." ".$difficulty_indicator."</h5>\n
     		    		<h6 class=\"card-subtitle mb-2 text-muted\">".$row['length']."</h6>\n
                <p class=\"card-text\">Séance créé par tes soins</p>\n
     		   			<a id=\"".$row['slug']."\" href=\"#".$row['slug']."\" data-seance=\"".$row['name']."\" class=\"seance-selected card-link btn btn-link\">Commencer <i class=\"fa fa-rocket\" aria-hidden=\"true\"></i></a>\n
     		  		</div>\n
            </div>";
        */
         //END OLD

        //$_SESSION["userId"]=$row["user_id"];

    	}
    }else echo "Hmmm, c'est un peu vide ! Si ça te dis, tu peux en crééer un ici : <a href=\"./creer-programme.php\">juste ici</a> 🤓";
    $result->close();
    $mysqli->close();
}
?>



