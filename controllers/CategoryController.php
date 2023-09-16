<?php

namespace app\controllers;

use app\base\controller;

class CategoryController extends controller
{
    public function index()
    {
        $this->setLayout('app');
        return $this->view('category');
    }
}