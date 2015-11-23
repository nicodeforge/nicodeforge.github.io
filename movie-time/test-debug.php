<?php 
session_start();
include('functions/get-session.php');
echo "Ca marche docteur ?";
if (isset($_SESSION['prenom'])) {
	# code...
echo $_SESSION['prenom'];
echo "<br>";
echo $_SESSION['nom'];   
}else{
	echo "<br> NON! FUCK THAT.";
	echo '<br>Mais je sais que tu te prenome '.$prenom .'';
	echo '<a href="functions/close-session.php">TRY AGAIN!</a>';
}
?>