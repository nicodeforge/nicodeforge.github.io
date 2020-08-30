<?php
$user = $_SESSION['user'];

include 'functions/db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt insert query execution
$mysqli->set_charset("utf8");
$sql = "SELECT p.* FROM renfo_program p INNER JOIN renfo_user u ON p.user_id=u.id WHERE u.login = '".$user."'";

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

   		echo "<div class=\"card col- \">\n
   		  		<div class=\"card-body\">\n
   		    		<h5 class=\"card-title\">".$row['name']."</h5>\n
   		    		<h6 class=\"card-subtitle mb-2 text-muted\">".$row['length']."</h6>\n
   		   			<a id=\"".$row['slug']."\" href=\"#".$row['slug']."\" class=\"program-selected card-link btn btn-primary\">Commencer</a>\n
   		  		</div></div>";

        //$_SESSION["userId"]=$row["user_id"];

    	}
    }
    $result->close();
    $mysqli->close();
}
?>

</div>