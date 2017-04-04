// On place dans une fonction qu'on peut appeler autant de fois qu'on le souhaite, 
// AVANT que le DOM soit chargé
function loadUsers(){
	// Permet de récupérer des données au format JSON
	$.getJSON('inc/ajax_load_users.php', function(result){
		//console.log(result); // équivalent à un var_dump()

		var resHTML = '';

		$.each(result, function(key, value){
			resHTML+= '<tr>';
			resHTML+= '<td>'+value.id+'</td>';
			resHTML+= '<td>'+value.firstname+'</td>';
			resHTML+= '<td>'+value.lastname+'</td>';
			resHTML+= '<td>'+value.email+'</td>';
			resHTML+= '<td><a href="#" class="deleteUser" data-id="'+value.id+'">Supprimer</td>';
			resHTML+= '</tr>';
		});

		$('#usersAjax').html(resHTML);
	});
}

$(function(){


	// Pour l'ajout d'un utilisateur
	$('#submitForm').click(function(el){
		el.preventDefault(); 

		var form_user = $('#addUser');
		$.ajax({
			method: 'post',
			url: 'inc/ajax_add_recipe.php',
			data: form_user.serialize(), 
			success: function(resultat){
				$('#result').html(resultat);
				form_user.find('input').val('');
			}
		});
	});

	$('body').on('click', 'a.deleteUser', function(element){
		element.preventDefault();

		$.ajax({
			method: 'get',
			url: 'inc/ajax_del_user.php',
			data: {id_user: $(this).data('id')}, 
			success: function(resultat){
				$('#mon_resultat').html(resultat);
				loadUsers();
			}
		});
	});


});