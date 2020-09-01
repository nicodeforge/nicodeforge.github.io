<div class="bug-report" style="position: fixed;bottom: 1em;right: 1em;border-radius: 5em;">
	<a type="button" class="btn btn-danger btn-lg" data-toggle="modal" href="#bug-report-modal"><i class="fa fa-bug" aria-hidden="true"></i></a>
</div>

<div id="bug-report-modal" class="modal" tabindex="-1">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Signales un bug</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        
		      
					<form method="POST" name="register_bug_form" id="register_bug_form" action="functions/register_bug.php">
				      <div class="form-group row">
				        <label for="navigator" class="col-sm-4 col-form-label">Info système</label>
				        <div class="col-sm-8">
				          <input type="text" readonly class="form-control"  name="navigator" id="navigator" value="<?php
				          echo $_SERVER['HTTP_USER_AGENT'];
				          ?>">
				        </div>
				      </div>
				      <div class="form-group row">
				        <label for="page"  class="col-sm-4 col-form-label">Page où se produit le bug</label>
				        <div class="col-sm-8">
				          <input type="text" readonly class="form-control"  name="page" id="page" value="<?php 
				          echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

				           ?>">
				        </div>
				      </div>
				      <div class="form-group row">
				        <label for="description" class="col-sm-4 col-form-label">Déscris ce qui s'est passé</label>
				        <div class="col-sm-8 ">
				          <textarea type="textarea" required  placeholder="J'ai voulu... et il s'est passé... Il y avait ce message d'erreur à l'écran" class="form-control" name="description" id="description"></textarea>
				        </div>
				      </div>
				      <div class=" form-group row">
				      		<div class="col-4 align-self-center">
						      <div class="form-group row">
						      	<div class="col align-self-center" >
						      		<!--<button id="register_bug_submit_button" class="btn btn-primary">Envoyer</button>-->
						      		<input type="submit"  class="btn btn-dark" value="Envoyer">
						      	</div>
						      </div>
						     </div>
					  </div>
			    </form>
		</div>
	    
	</div>
</div>
		
</div>