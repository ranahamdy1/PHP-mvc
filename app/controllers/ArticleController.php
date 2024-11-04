<?php

namespace app\controllers;

use core\App;

class ArticleController
{
    ///create
    public function create() {
        return view('articles/create');
    }
    public function store() {
        var_dump($_POST);
        App::get('database')->insert(
            'articles',
            [
                'name' => $_POST['name'],
                'body' => $_POST['body'],
            ]
        );
    }

    ///read
    public function index() {
        $articles = App::get('database')->sellectAll('articles');
        return view('articles/index', compact('articles'));
    }
    public function show() {
        $article = App::get('database')->sellect('articles',"id= ?",[$_GET['id']]);
        return view('articles/show', compact('article'));
    }

    ///edit
    public function edit() {
        $article = App::get('database')->sellect('articles',"id= ?",[$_GET['id']]);
        return view('articles/edit', compact('article'));
    }

    ///update
    public function update() {
        App::get('database')->update('articles', 'name=?','body=?','id=?',
        [
            $_POST['name'],
            $_POST['body'],
            $_POST['id']
        ]
        );
    }

    ///delete
    public function delete() {
        App::get('database')->delete('articles', 'id=?', [$_GET['id']]);
        header('location: /articles');
    }
}