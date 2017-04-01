<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		
		['GET|POST', '/article/ajaxArticles', 'Article#ajaxArticles', 'article_ajaxArticles'],
		
		['GET', '/article/listArticles', 'Article#listArticles', 'article_listArticles'],
		
		['GET|POST', '/article/ViewArticle/[i:id]', 'Article#ViewArticle', 'article_viewArticle'],
		
		['GET|POST', '/VeuillezVousConnecter', 'User#loginUser', 'login'],

		['GET|POST', '/users/connexion', 'User#authUser1', 'user_authUser'],		
		
		['GET|POST', '/article/ViewArticle', 'Comment#addComment', 'comment_addcomment'],		
		
		['GET|POST', '/article/ViewArticle', 'Comment#listAllCommentsOfArticle', 'comment_listAllCommentsOfArticle'],		
		
		['GET|POST', '/mailsend', 'Email#sendmail', 'email_sendmail'],		
		
		['GET|POST', '/retrouverMotDePasse', 'Psw#returnPsw', 'psw_returnPsw'],		
		
		['GET|POST', '/VeuillezTapezVotreMDP', 'Psw#newpsw', 'psw_newpsw'],		

	);