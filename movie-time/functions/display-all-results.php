<?php
echo '<table class="table table-stripped">';
include('db.inc.php');
$query_produit = $bdd -> query("SELECT * FROM produit ORDER BY `titre`");

if ($query_produit -> num_rows >0) {
  while ($datas_produit = $query_produit -> fetch_array()) {
         $titre     = $datas_produit['titre'];
         $jacquette = $datas_produit['jacquette'];
         $annee     = $datas_produit['annee'];
         $genre     = $datas_genre['genre_id'];
         $resume    = $datas_produit['resume'];
         $id        = $datas_produit['produit_id'];
        $query_genre  = $bdd ->query('SELECT genre_nom FROM genre WHERE genre_id='.$genre.'');

        if ($query_genre -> num_rows >0) {
          if ($data_genre = $query_genre ->fetch_array()){
            $genre  = $data_genre['genre_nom'];
          }
        }
            echo '<tr>
                    <td>
                      <img src="images/jacquettes/xs_'
                        . $jacquette
                        . '" alt="Jacquette du film'
                        .$titre
                        .'" /></td>
                          <td>
                            <a class="text-danger" role="button" data-toggle="collapse" href="#'
                            .$id
                            .'" aria-expanded="false" aria-controls="collapseExample"><h3>'
                            . $titre
                            .' ('
                            . $annee
                            .')</h3></a>
                              <br/><span class="label label-default">'
                            .$genre
                            .'</span><div class="collapse" id="'
                            .$id
                            .'"><blockquote><strong>Résumé : </strong>'
                            .$resume
                            .'</blockquote></div></td>
                            <td>
                              <a class="btn btn-link" id="en-details">#</a></td>

                    </tr>';
            
  }
}
echo '</table>';


?>