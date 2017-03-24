<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/article/addArticles', 'Article#addArticles', 'article_addArticles'],
		['GET|POST', '/article/listArticles', 'Article#listArticles', 'article_listArticles'],
	);