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
$mysqli->set_charset("utf8");
$sql = "SELECT r.name,r.default_time,r.default_series,r.default_recup_time FROM renfo_exercise r INNER JOIN renfo_exercise_type t WHERE t.name = '".$seance_type."' group by r.name";

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
    	array_push($exercise, array('name' => $row["name"] ,'time' => $row["default_time"],'series' => $row["default_series"],'recup' => $row["default_series"]));
//    	echo $row["name"];

    	}
    }
    $result->close();
    $mysqli->close();
}
?>

<div class="exercice-description container bg-light" style="padding: 10px;"> 
  <div class="form-group row">
    <label for="exercice<?php echo $id; ?>" class="col-sm-4 col-form-label">Exercice #<?php echo $id; ?></label>
    <div class="col-sm-8 ">
      <select class="form-control exerciseType" id="exercice<?php echo $id; ?>" name="exercice<?php echo $id; ?>">
        <?php
          for ($i=0; $i < count($exercise); $i++) { 
            echo "<option>".$exercise[$i]["name"]."</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="series<?php echo $id; ?>" class="col-sm-4 col-form-label">Combien de séries ?</label>
    <div class="col-sm-8 ">
      <div class="col-sm-8">
        <input type="number" class="form-control" name="series<?php echo $id; ?>" id="series<?php echo $id; ?>" value="1">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="time<?php echo $id; ?>" class="col-sm-4 col-form-label">Combien de temps par série ?</label>
    <div class="col-sm-4 ">
      <div class="col-sm-8">
        
        <input type="text" style="text-align: right; padding-right: 20px; box-sizing: border-box; width: 100%; margin: 0px; cursor: text;" class="form-control html-duration-picker" data-duration="00:00:45" name="time<?php echo $id; ?>" id="time<?php echo $id; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="recup<?php echo $id; ?>" class="col-sm-4 col-form-label">Combien de temps de récup ?</label>
    <div class="col-sm-4 ">
      <div class="col-sm-8">
        <input type="text" class="form-control html-duration-picker" data-duration="00:00:45" name="recup<?php echo $id; ?>" id="recup<?php echo $id; ?>">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">HtmlDurationPicker.refresh();</script>
<div class="exercise-load">
  <div></div>
</div>