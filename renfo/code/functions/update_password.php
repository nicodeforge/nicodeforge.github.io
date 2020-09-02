<?php
session_start();

  $token = isset($_POST['token']) ? $_POST['token'] : NULL;
  $password = isset($_POST['password']) ? $_POST['password'] : NULL;
  $pass = sha1($password);

include './db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt insert query execution
$mysqli->set_charset("utf8");
$sql = "UPDATE renfo_user SET password = '".$pass."' WHERE token = '".$token."';";
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
                  $firstname = $row[1];

                  //print_r("User id :".$user_id." - Login : ".$login." - Display name :".$display_name);

                  $_SESSION["user"] = $firstname;
                  $_SESSION["user_id"] = $user_id;
                  

                  header("Location: ../seance.php?q=reset-success");
                  exit;  

                }
               
                $result->free();
            }
            
        } while ($mysqli->more_results() && $mysqli->next_result());
    }

    $mysqli->close();
    //echo "Failure";
    header("Location: ../index.php?q=reset-failed");
    exit;

 ?>