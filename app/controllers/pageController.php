<?php
namespace app\controllers;
class PagesController {
    public function about() {
        return require "app/views/about.view.php";
    }
}