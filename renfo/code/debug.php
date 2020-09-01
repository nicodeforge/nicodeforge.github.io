<?php
session_start();
echo "Debug Page<br>";

if (!isset($_SESSION["user"])) {
	header("Location: ./index.php?q=do-auth");
}
//if ($_ENV['env']==='local'){
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);	
//}
include 'functions/functions.php';
include 'functions/db.inc.local.php';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
// Attempt query execution
$mysqli->set_charset("utf8");
$sql = "SELECT u.id,u.firstname from renfo_user u GROUP BY u.id;";
$sql .= "SELECT s.id,s.name from renfo_seance s INNER JOIN renfo_user u ON s.user_id=u.id where s.sharable=1;";


if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

/* Requête "Select" retourne un jeu de résultats */
$query_result = $mysqli->multi_query($sql);
$i = 0;
$users = array();
$seances = array();

if ($query_result) {
    do {
    	
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                if ($i == 0) {
                	//Store result of first query
                	
                	$firstname = $row[1];
                	$user_id = $row[0];
                	array_push($users, array('id' => $row[0] , 'firstname' => $row[1]));

                }elseif ($i == 1) {
                	
                	$firstname = $row[1];
                	$user_id = $row[0];
                	array_push($seances, array('id' => $row[0] , 'name' => $row[1]));
                }
            }
            $i++;
            $result->free();
        }
        
    } while ($mysqli->more_results() && $mysqli->next_result());
}
$mysqli->close();

for ($i=0; $i < count($users); $i++) { 
 echo "Users : ".$users[$i]["firstname"]."<br>" ;
}
for ($i=0; $i < count($seances); $i++) { 
  echo "Seance : ".$seances[$i]["name"]."<br>" ;
}
/*if ($result = $mysqli->query($sql)) {
    if ($result -> num_rows > 0){
    	while ($row = mysqli_fetch_assoc($result)) {
    		echo "<p>".$row["type"]."</p>";
      		  
    	}
    }
    $result->close();
    $mysqli->close();
}*/

?>