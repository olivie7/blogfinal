<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/article/ajaxArticles', 'Article#ajaxArticles', 'article_ajaxArticles'],
		['GET|POST', '/article/listArticles', 'Article#listArticles', 'article_listArticles'],
		['GET|POST', '/article/viewArticle/[i:id]', 'Article#ViewArticle', 'article_viewArticle'],
	);