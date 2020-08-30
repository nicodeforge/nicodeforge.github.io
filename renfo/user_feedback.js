//User feedback
var message = $.url(window.location.href).param("q");
	//console.log(message);
switch (message){
	case 'unknown-user' :

		$('#message').html("<strong>Oooops...</strong> On ne se connait pas encore ! <a data-toggle=\"modal\" href=\"#signup-modal\" class=\"alert-link\">Commence par créer ton compte ;)</a>");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'login-wpass' :

		$('#message').html("<strong>Oooops...</strong> Il semblerait que tu te sois trompé de mot de passe :/ Si tu as laissé ton mail à l'inscription <a href=\"#\" class=\"alert-link\">tu peux le recréer ici ;)</a>");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'register-failure-on-request' :

		$('#message').html("<strong>Hooouula...</strong> Ça, ça n'arrive pas souvent. Il va falloir que tu recommence :/ <a data-toggle=\"modal\" href=\"#signup-modal\" class=\"alert-link\">Créer mon compte</a>");
		$(".user-feedback").addClass("alert-warning show");
		break;

	case 'register-program-failure-on-request' :

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

		$('#message').html("<strong>Champion 👊</strong> Ton programme a été ajouté, tu le retrouve juste en dessous :");
		$(".user-feedback").addClass("alert-success show");
		break;

	case null:
		break;

	default : break;	
	
	
	
		
}