<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $vars = [
            'name' => 'Vasia',
            'age' => '10',
        ];
        $this->view->render('Home page',$vars);
        //echo 'Home page';
    }

    public function contactAction()
    {
        echo 'Contacts';
    }

}