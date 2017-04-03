// On place dans une fonction qu'on peut appeler autant de fois qu'on le souhaite, 
// AVANT que le DOM soit chargé
function loadUsers(){
	// Permet de récupérer des données au format JSON
	$.getJSON("<?=$this->url('comment_showComments') ?>", function(resultat){
		//console.log(result); // équivalent à un var_dump()

		var resHTML = '';

		$.each(resultat, function(key, value){
			resHTML+= '<tr>';
			// resHTML+= '<td>'+value.id+'</td>';
			resHTML+= '<td>'+value.pseudo+'</td>';
			resHTML+= '<td>'+value.content+'</td>';
			// resHTML+= '<td><a href="#" class="deleteUser" data-id="'+value.id+'">Supprimer</td>';
			resHTML+= '</tr>';
		});

		$('#result').html(resHTML);
	});
}







$(function(){ // équivalent $(document).ready(function(){

	function addform(){
// Pour l'ajout d'un article

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
				// $('#result').html(resultat);
				form_article.find('input').val(''); // Permet de vider les champs du formulaire.. 
				loadUsers();
				//pseudo.find('input').val(''); // Permet de vider les champs du formulaire.. 
				//message.find('input').val(''); // Permet de vider les champs du formulaire.. 
				// $('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
			}
		});
	});
}

});

