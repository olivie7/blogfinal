$(function(){ // équivalent $(document).ready(function(){

	function addform(){
// Pour l'ajout d'un utilisateur
$('#submitForm').click(function(el){
		el.preventDefault(); // On bloque l'action par défaut
		var form_article = $('#add'); // On récupère le formulaire
		$.ajax({
			method: 'post',
			url:  form_article.attr('action'),
			data: form_article.serialize(), // On récupère les données à envoyer
			success: function(resultat){
				$('#result').html(resultat);
				form_article.find('input').val(''); // Permet de vider les champs du formulaire.. 
			}
		});
	});
}

});
function modal() {
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
};
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
};

