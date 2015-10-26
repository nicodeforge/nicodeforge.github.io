<?php
  $urp  = $_GET['i'];
  include('includes/header.php');
?>

    </head>
<body>
  <?php
   
    include('functions/get-user.php');
    include('includes/navbar-logged.php');
  ?>
	<div class="container">
		<!--Main content goes here-->
    <?php 
    //include('functions/db.inc.php');
    /*$query_all = $bdd -> query("SELECT * FROM client ORDER BY `nom`");
    if($query_all -> num_rows > 0){
      while($datas_all = $query_all -> fetch_array()){
        $nom = $datas_all ['nom'];
        $prenom = $datas_all ['prenom'];
        $age = $datas_all ['age'];
        if ($age ==1){
          $age = $age . 'an';
        }else{
          $age = $age . 'ans';
        }
        $description  = $datas_all['description'];
        echo '
        <hr />
        <ul>
          <li> Nom : ' . $nom . '</li>
          <li> Prénom :' . $prenom . '</li>
          <li> Age : ' . $age . ' </li>
          <li> Description : <br/> '. nl2br($description) . '</li>
        </ul>
        ';
      } *//* END OF WHILE ($data_all = $query_all -> fetch_array())) */
   // } /* END OF if($query_all -> num_rows > 0) */
    ?>

    
	</div>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Javascript de Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
  
</body>
</html>