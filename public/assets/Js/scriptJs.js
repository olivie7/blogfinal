$(function(){ // équivalent $(document).ready(function(){

	function addform(){
// Pour l'ajout d'un utilisateur
$('#submitForm').click(function(el){
		el.preventDefault(); // On bloque l'action par défaut
		var form_article = $('#add'); // On récupère le formulaire
		var pseudo = $('#pseudo'); // On récupère le formulaire
		var message = $('#message'); // On récupère le formulaire
		$.ajax({
			method: 'post',
			url:  form_article.attr('action'),
			data: form_article.serialize(), // On récupère les données à envoyer
			success: function(resultat){
				$('#result').html(resultat);
				form_article.find('input').val(''); // Permet de vider les champs du formulaire.. 
				//pseudo.find('input').val(''); // Permet de vider les champs du formulaire.. 
				//message.find('input').val(''); // Permet de vider les champs du formulaire.. 
				$('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
			}
		});
	});
}

});

