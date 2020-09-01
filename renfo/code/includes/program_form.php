<?php
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$exercise = array();
$id = isset($_POST['exercise_id']) ? $_POST['exercise_id'] : NULL;
$seance_type = isset($_POST['seance_type']) ? $_POST['seance_type'] : NULL;
include '../functions/db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt insert query execution
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


/* Display result
for ($i=0; $i < count($users); $i++) { 
 echo "Users : ".$users[$i]["firstname"]."<br>" ;
}
for ($i=0; $i < count($seances); $i++) { 
  echo "Seance : ".$seances[$i]["name"]."<br>" ;
}
*/
?>

<div class="exercice-description container bg-light" style="padding: 10px;"> 
  <div class="form-group row">
    <label for="seance<?php echo $id; ?>" class="col-sm-4 col-form-label">Séance #<?php echo $id; ?></label>
    <div class="col-sm-8 ">
      <select class="form-control exerciseType" id="seance<?php echo $id; ?>" name="seance<?php echo $id; ?>">
        <?php
          for ($i=0; $i < count($seances); $i++) { 
            echo "<option value='".$seances[$i]["id"]."' >".$seances[$i]["name"]."</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="date<?php echo $id; ?>" class="col-sm-4 col-form-label">A quelle date ?</label>
    <div class="col-sm-8 ">
      <div class="col-sm-8">
        <input type="date" class="form-control" name="date<?php echo $id; ?>" id="date<?php echo $id; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="time<?php echo $id; ?>" class="col-sm-4 col-form-label">A quelle heure ?</label>
    <div class="col-sm-8 ">
      <div class="col-sm-8">
        <input type="time" class="form-control" name="time<?php echo $id; ?>" id="time<?php echo $id; ?>">
      </div>
    </div>
  </div>
  
</div>
<script type="text/javascript">HtmlDurationPicker.refresh();</script>
<div class="exercise-load">
  <div></div>
</div>