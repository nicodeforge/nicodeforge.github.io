//User feedback
var message = $.url(window.location.href).param("q");
var bug_message = $.url(window.location.href).param("m");
	//console.log(message);
switch (message){
	case 'unknown-user' :

		$('#message').html("<strong>Oooops...</strong> On ne se connait pas encore ! <a data-toggle=\"modal\" href=\"#signup-modal\" class=\"alert-link\">Commence par créer ton compte ;)</a>");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'login-wpass' :

		$('#message').html("<strong>Oooops...</strong> Il semblerait que tu te sois trompé de mot de passe :/ Si tu l'as oublié <a href=\"mot-de-passe-oublie.php\" class=\"alert-link\">tu peux le recréer ici ;)</a>");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'register-failure-on-request' :

		$('#message').html("<strong>Hooouula...</strong> Ça, ça n'arrive pas souvent. Il va falloir que tu recommence :/ <a data-toggle=\"modal\" href=\"#signup-modal\" class=\"alert-link\">Créer mon compte</a>");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'register-seance-failure-on-request' :

		$('#message').html("<strong>Hooouula...</strong> Ça, ça n'arrive pas souvent. Il va falloir que tu recommence :/ Si tu vois ce message plusieurs fois, essaye de te déconnecter et de te reconnecter.");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'wrong-access-key' :

		$('#message').html("<strong>Ah.</strong> Il va falloir avoir la clé si tu veux entrer 🤷‍♂️");
		$(".user-feedback").addClass("alert-warning show");
		break;				

	case 'register-success' :

		$('#message').html("<strong>Oh yeah...</strong> Prépare toi à transpirer fort. Check ta boite mail pour activer ton compte 👊");
		$(".user-feedback").addClass("alert-success show");
		break;
	case 'add-success' :

		$('#message').html("<strong>Champion 👊</strong> Ta séance a été ajoutée, tu la retrouve juste en dessous :");
		$(".user-feedback").addClass("alert-success show");
		break;

	case 'confirmation-success' : 
		$('#message').html("<strong>On est bon 👊</strong> Ton compte est confirmé. Plus qu'à transpirer.");
		$(".user-feedback").addClass("alert-success show");
		break;

	case 'confirmation-failed' : 
		$('#message').html("<strong>Ooooops 😬</strong> Ton lien d'activation n'a pas fonctionné. Rééssaye. Si ça continue de bugger, appel au secours.");
		$(".user-feedback").addClass("alert-warning show");
		break;


	case 'do-auth' : 
		$('#message').html("<strong>Ooooops 🤓</strong>Ta session a expiré, il faut te reconnecter.");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'reset-email-sent' : 
		$('#message').html("<strong>Check ta boite email 📬</strong> Toutes les infos pour recréer ton mot de passe sont dans le mail.");
		$(".user-feedback").addClass("alert-success show");
		break;

	case 'reset-success' : 
		$('#message').html("<strong>On est bon 👌</strong> Ton mot de passe a été réinitialisé.");
		$(".user-feedback").addClass("alert-success show");
		break;

	case null:
		break;

	default : break;		
		
}

	switch (bug_message) {
	case 'register-bug-success' : 
		$('#message').html("<strong>Merci 😘</strong> Grâce à toi, je vais pouvoir améliorer cette app. C'est vraiment sympa.");
		$(".user-feedback").addClass("alert-success show");
		break;	

	case 'register-bug-failure-upon-request' : 
		$('#message').html("<strong>Ooooops 🤦‍♂️</strong> Le signalement de ton bug a... créé un bug. C'est moche. Merci quand même d'avoir essayé.");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'register-bug-failure' : 
		$('#message').html("<strong>Ooooops 🤦‍♂️</strong> Le signalement de ton bug a... créé un bug. C'est moche. Merci quand même d'avoir essayé.");
		$(".user-feedback").addClass("alert-warning show");
		break;
	default : break;
	}