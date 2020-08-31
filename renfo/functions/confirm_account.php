<?php
session_start();
$token = $_GET["token"];

include './db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt insert query execution
$mysqli->set_charset("utf8");
$sql = "UPDATE renfo_user SET active = 1 WHERE token = '".$token."';";
$sql .= "SELECT * FROM renfo_user WHERE token ='".$token."';";


if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

/* "Create table" ne retournera aucun jeu de résultats */
$query_result = $mysqli->multi_query($sql);   
    
    if ($query_result) {
        do {
          
            if ($result = $mysqli->store_result()) {
                while ($row = $result->fetch_row()) {
                  
                  $user_id = $row[0];
                  $login = $row[1];
                  $display_name = $row[2];

                  //print_r("User id :".$user_id." - Login : ".$login." - Display name :".$display_name);

                  $_SESSION["user"] = $login;
                  $_SESSION["user_id"] = $user_id;
                  $_SESSION["username"] = $display_name;

                  header("Location: ../renforcement.php?q=confirmation-success");
                  exit;  

                }
               
                $result->free();
            }
            
        } while ($mysqli->more_results() && $mysqli->next_result());
    }

    $mysqli->close();
    //echo "Failure";
    header("Location: ../index.php?q=confirmation-failed");
    exit;

 ?>