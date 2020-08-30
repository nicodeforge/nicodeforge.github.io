<?php
$userId = $_SESSION['userId'];
$exercise = array();
$id = isset($_POST['exercise_id']) ? $_POST['exercise_id'] : NULL;
include '../functions/db.inc.local.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt insert query execution
$mysqli->set_charset("utf8");
$sql = "SELECT name,default_time,default_series,default_recup_time FROM renfo_exercise WHERE type = 'Renforcement & Cardio' group by name";

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
        <input type="number" class="form-control" name="series<?php echo $id; ?>" id="series<?php echo $id; ?>" value="">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="time<?php echo $id; ?>" class="col-sm-4 col-form-label">Combien de temps par série ?</label>
    <div class="col-sm-8 ">
      <div class="col-sm-8">
        <input type="time" class="form-control" name="time<?php echo $id; ?>" id="time<?php echo $id; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="recup<?php echo $id; ?>" class="col-sm-4 col-form-label">Combien de temps de récup ?</label>
    <div class="col-sm-8 ">
      <div class="col-sm-8">
        <input type="time" class="form-control" name="recup<?php echo $id; ?>" id="recup<?php echo $id; ?>">
      </div>
    </div>
  </div>
</div>
<div class="exercise-load">
  <div></div>
</div>