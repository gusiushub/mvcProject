<?php

namespace app\controllers;


use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
//        $db = new Db;
//        $params = [
//            'id' => 2,
//        ];
//        $data = $db->column('SELECT name FROM users WHERE id = :id',$params);
//        debug($data);
//        $vars = [
//            'name' => 'Vasia',
//            'age' => '10',
//        ];
        $this->view->render('Home page');
        //echo 'Home page';
    }

    public function contactAction()
    {
        echo 'Contacts';
    }

}