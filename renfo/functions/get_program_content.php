<?php 

include './db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database,);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
$mysqli->set_charset("utf8");
// Attempt insert query execution
$sql = "SELECT content FROM renfo_program WHERE slug = '".$_POST['variant']."'  ";

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

   		echo $row['content'];

    	}
    }
    $result->close();
    $mysqli->close();
}
?>