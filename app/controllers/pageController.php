<?php
namespace app\controllers;
class PagesController {
    public function about() {
        $articles = [
            [
                'title' => 'About',
                'description' => 'This is the about page.',
                'url' => 'about'
            ],
            [
                'title' => 'About2',
                'description' => 'This is the about page2.',
                'url' => 'about2'
            ],
        ];
        return view('about',compact('articles'));
        //return require "app/views/about.view.php";
    }
}