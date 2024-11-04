<?php

use core\App;
use core\database\Connection;
use core\database\QueryBuilder;

App::bind('config',require "config.php");
App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));

//$app['config'] = require "config.php";
//$app['database'] = new QueryBuilder(Connection::make($app['config']['database']));

///1- insert
//$app['database']->insert(
//    'articles',
//[
//    'name'=>'article2',
//    'body'=>'body2'
//]
//);

///2- read
//var_dump($app['database']->selectAll('articles'));
//var_dump($app['database']->select('articles', 1));
//var_dump($app['database']->select('articles','id= ?',[1]));
// Correct usage for read
//var_dump(App::get('database')->selectAll('articles'));
//var_dump(App::get('database')->select('articles', 1));
//var_dump(App::get('database')->select('articles', 'id= ?', [1]));

///3- update
//var_dump(
//    $app['database']->update(
//        'articles',
//        'name=?,body=?',
//        'id=?',
//        [
//            "article33",
//            "body33",
//            2
//        ]
//    )
//);

///4- delete
//var_dump($app['database']->delete('articles', 1));
//var_dump($app['database']->delete('articles', 'id = ?',[4]));

// Correct usage for delete
//var_dump(App::get('database')->delete('articles', 1));
//var_dump(App::get('database')->delete('articles', 'id = ?', [3]));


function view($file, $data=[]) {
    extract($data);
    return require "app/views/$file.view.php";
}