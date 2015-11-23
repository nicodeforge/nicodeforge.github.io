
<?php
echo '<div id="test-list" class="col-sm-10 col-xs-12 col-md-8">
       <input type="text"class="fuzzy-search text-info form-control form-control-lg" placeholder="Trouver un film" id="test-input" />
        <ul class="list list-group container" id="film-list">';
include('db.inc.php');
$query_produit = $bdd -> query("SELECT * FROM produit ORDER BY `titre`");
if ($query_produit -> num_rows >0) {
  while ($datas_produit = $query_produit -> fetch_array()) {
         $id        = $datas_produit['produit_id'];
         $titre     = $datas_produit['titre'];
         $jacquette = $datas_produit['jacquette'];
         $annee     = $datas_produit['annee'];
         $resume    = $datas_produit['resume'];
         $type      = $datas_produit['type'];
         

                  
                  
            echo '  <li class="list-group-item row">
                        <a class="name text-danger col-md-6" data-toggle="modal" data-target="#modal' .$id. '" id="'
                          .$titre
                          .'"  href="#">'
                          . $titre
                        .'</a>
                        <span class="col-md-1 label label-danger"
                        <a href ="#">'
                          .$type
                        .'</a>
                        </span>
                    </li>
                    <div class="modal fade" id="modal'.$id.'">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">'
                            .$titre
                            .' ('
                            .$annee
                            .')'
                            .'</h4>
                          </div>
                          <div class="modal-body">
                            <blockquote>'
                            .$resume
                            .'</blockquote>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a type="button" href="inscription.php" class="btn btn-primary">Louer ce film</a>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    ';
            
            
  }
}else{
	echo "<li class='text-info'>Hmmm... il semble qu'il n'y ait pas de résultats :/</li>";
}
echo "</ul></div>";
?>

