<?php

$router->get('about',"PagesController@about");

$router->get('articles/create',"ArticleController@create");
$router->post('articles/store',"ArticleController@store");

$router->get('articles',"ArticleController@index");
$router->get('article',"ArticleController@show");

$router->get('articles/edit',"ArticleController@edit");
$router->get('article/update',"ArticleController@update");

$router->post('article/delete',"ArticleController@delete");