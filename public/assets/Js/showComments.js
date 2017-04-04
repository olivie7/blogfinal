 //On place dans une fonction qu'on peut appeler autant de fois qu'on le souhaite, 
// AVANT que le DOM soit chargé
function loadUsers(){
	// $url = $this->url('comment_showComments');
	// Permet de récupérer des données au format JSON
	$.getJSON("../../../Controller/CommentController.php", function(resultat){
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