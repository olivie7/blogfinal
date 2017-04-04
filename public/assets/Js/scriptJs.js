$(function(){ // équivalent $(document).ready(function(){

	
// Pour l'ajout d'un article

$('#submitForm').click(function(el){
		el.preventDefault(); // On bloque l'action par défaut
		
		var form_article = $('#add'); // On récupère le formulaire
		var pseudo = $('#pseudo'); // On récupère le formulaire
		var message = $('#message'); // On récupère le formulaire
		$.ajax({
			method: 'post',
			url: '',
			data: form_article.serialize(), // On récupère les données à envoyer
			success: function(resultat){
			 $('#result').html(resultat);
				form_article.find('input').val(''); // Permet de vider les champs du formulaire.. 
			}
		});
	});


});

