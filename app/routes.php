<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/article/ajaxArticles', 'Article#ajaxArticles', 'article_ajaxArticles'],
		['GET', '/article/listArticles', 'Article#listArticles', 'article_listArticles'],
		['GET', '/votre_article/[i:id]', 'Article#ViewArticle', 'article_viewArticle'],
		['GET|POST', '/users/loginUser', 'User#loginUser', 'user_loginUser'],
		['GET|POST', '/users/connexion', 'User#authUser1', 'user_authUser'],		
	);