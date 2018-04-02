<?php

namespace app\controllers;


use app\core\Controller;
use app\lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {
        $db = new Db;
        $params = [
            'id' => 2,
        ];
        $data = $db->column('SELECT name FROM users WHERE id = :id',$params);
        debug($data);
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