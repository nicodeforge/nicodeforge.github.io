<?php
$keyword = $_GET['q'];
echo $keyword;

include('db.inc.php');
echo '<table class="table table-stripped">';
$query_search = $bdd -> query('SELECT produit_id, type, titre, annee FROM produit WHERE (
    annee LIKE "'. $keyword .'")
');
if ($query_search -> num_rows >0) {
  while ($datas_search = $query_search -> fetch_array()) {
         $id     = $datas_search['id'];
         $titre	 = $datas_search['titre'];
         $type = $datas_search['type'];
         $annee     = $datas_search['annee'];
         

                  
            echo '<tr>
                    <td>'
                      	.
                      	'</td>
                        <td class="text-primary">'
                        . $titre
                        .' ('
                        . $annee
                        .')</td>
                        <td>
                        <a class="btn btn-link" id="en-details">#</a></td>

                    </tr>';
            
  }
}else{
	echo "<tr><td>Hmmm... il semble qu'il n'y ait pas de résultats :(</td></tr>";
}
echo "</table>";
$nb = num_rows;
echo "J'ai trouvé".$nb."résultats";
?>

