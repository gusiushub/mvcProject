<?php

namespace app\controllers;


use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Home page');
    }

    public function contactAction()
    {
        echo 'Contacts';
    }

}