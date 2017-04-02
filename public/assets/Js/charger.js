$(function(){ // équivalent $(document).ready(function(){
function charger(){

    setTimeout( function(){
    	var url = "/article/ViewArticle/[i:id]";
        // on lance une requête AJAX
        $.ajax({
            url : $url,
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

