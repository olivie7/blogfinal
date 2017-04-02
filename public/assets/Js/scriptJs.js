$(function(){ // équivalent $(document).ready(function(){

	function addform(){
// Pour l'ajout d'un utilisateur
$('#submitForm').click(function(el){
		el.preventDefault(); // On bloque l'action par défaut
		var form_article = $('#add'); // On récupère le formulaire
		var pseudo = $('#apseudo'); // On récupère le formulaire
		var message = $('#message'); // On récupère le formulaire
		$.ajax({
			method: 'post',
			url:  form_article.attr('action'),
			data: form_article.serialize(), // On récupère les données à envoyer
			success: function(resultat){
				$('#result').html(resultat);
				form_article.find('input').val(''); // Permet de vider les champs du formulaire.. 
				$('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
			}
		});
	});
}


function charger() {

    setTimeout( function(){
        // on lance une requête AJAX
        var premierID = $('#messages p:first').attr('id'); // on récupère l'id le plus récent

        $.ajax({
            url : "charger.php?id=" + premierID, // on passe l'id le plus récent au fichier de chargement",
            type : GET,
            success : function(html){
                $('#messages').prepend(html); // on veut ajouter les nouveaux messages au début du bloc #messages
            }
        });

        charger(); // on relance la fonction

    }, 5000); // on exécute le chargement toutes les 5 secondes

}

charger();


});

