<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        echo 'Home page';
    }

    public function contactAction()
    {
        echo 'Contacts';
    }

}