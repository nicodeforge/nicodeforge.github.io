<!DOCTYPE html>
<html>
<head>
	<?php //header('Content-Type: text/html; charset=utf-8');?>
	<meta charset="utf-8"/>

	<title>Check</title>
</head>
<body>
<?php
include 'functions/db.inc.local.php';

echo 'Version PHP courante : ' . phpversion().'<br>';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
printf("Version du serveur MySQL : %s\n", $mysqli->server_info);
echo '<br>';
printf("---------------------------", $mysqli->server_info);
echo '<br>';

include 'functions/functions.php';
include 'functions/db.inc.local.php';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8");

// Attempt query execution
$sql = "select type from renfo_exercise group by type;";
$sql .= "select name,default_time,default_series,default_recup_time from renfo_exercise group by name;";


if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

/* "Create table" ne retournera aucun jeu de résultats */

/*
if ($mysqli->multi_query($sql) === TRUE) {
    printf("Requete succes.\n");
}
*/

/* Requête "Select" retourne un jeu de résultats */
$query_result = $mysqli->multi_query($sql);
$i = 0;
$type = array();
$exercise = array();

if ($query_result) {
    do {
    	
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                //echo "<p>".$row[0]." - ".$i."</p>";
                if ($i == 0) {
                	//Store result of first query
                	array_push($type, $row[0]);

                }elseif ($i == 1) {
                	//$exercise = $row[0];
                	//array_push($exercise, );
                	
                	array_push($exercise, array('name' => $row[0] ,'time' => $row[1],'series' => $row[2],'recup' => $row[3]));
                }

                
                //$i++;
            }
            $i++;
            $result->free();
        }
        
    } while ($mysqli->more_results() && $mysqli->next_result());
}
$mysqli->close();


/*if ($result = $mysqli->query($sql)) {
    if ($result -> num_rows > 0){
    	while ($row = mysqli_fetch_assoc($result)) {
    		echo "<p>".$row["type"]."</p>";
      		  
    	}
    }
    $result->close();
    $mysqli->close();
}*/

/*

echo "Type will output : <br>";
for ($i=0; $i < count($type); $i++) { 
	echo "<option>".$type[$i]."</option>";
}
echo '<br>';
echo "Exercises will output : <br>";
for ($i=0; $i < count($exercise); $i++) { 
	echo "<option>".$exercise[$i]["name"]."</option><br>";
}

echo 'Exercise definition is set as follow : <br>';

$exerciseDefinition = json_encode($exercise,JSON_UNESCAPED_UNICODE);
echo $exerciseDefinition;
*/
echo "<br>---------------------------<br>";
echo "Php exercise Array :<br>";

echo "<br>---------------------------<br>";
echo sha1("nico");


print_r($exercise);


?>
</body>
</html>