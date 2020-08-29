<?php
$userId = $_SESSION['userId'];
echo "<div class=\"row program-choice\">";

include 'functions/db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt insert query execution
$sql = "SELECT * FROM renfo_program WHERE user_id = ".$userId."";

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

   		echo "<div class=\"card col-12 col-sm-5\">\n
   		  		<div class=\"card-body\">\n
   		    		<h5 class=\"card-title\">".$row['name']."</h5>\n
   		    		<h6 class=\"card-subtitle mb-2 text-muted\">".$row['length']."</h6>\n
   		   			<a id=\"".$row['slug']."\" href=\"#".$row['slug']."\" class=\"program-selected card-link btn btn-primary\">Go</a>\n
   		  		</div>\n
   			</div>";

    	}
    }
    $result->close();
    $mysqli->close();
}
?>

</div>