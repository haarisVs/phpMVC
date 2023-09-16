<?php

namespace app\controllers;

use app\base\controller;

class ContactController extends controller
{
    public function index()
    {
        self::redirect('/login');
    }
}