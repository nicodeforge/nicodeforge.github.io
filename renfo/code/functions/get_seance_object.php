<?php 
session_start();
$seance_details = array();
$seance_id = $_POST["seance_id"];
include './db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database,);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
$mysqli->set_charset("utf8");
// Attempt  query execution
$sql = "SELECT * FROM renfo_seance WHERE id = '".$seance_id."' AND user_id = '".$_SESSION["user_id"]."' ;";

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

    		//for ($i=0; $i < count($row); $i++) { 
    			array_push($seance_details,array("id" => $row["id"], "name" => $row["name"],"slug" => $row["slug"], "length" => $row["length"], "type" => $row["type"], "content" => $row["content"],"difficulty" => $row["difficulty"]));
    		//}

   		$seance_object = json_encode($seance_details);
      echo $seance_object;
   		//echo $seance_object;
   		//echo "<script>var seance_object = ".$seance_object."</script>";

    	}
    }
    $result->close();
    $mysqli->close();
}
?>