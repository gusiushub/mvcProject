<?php


namespace app\core;

use app\core\View;


class Router {

    protected $routes = [];
    protected $params = [];

    /**
     * Router constructor.
     */
    function __construct(){
        //echo'Это класс Router.php';
        $arr = require 'app/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    /**
     * Ветвление
     * @param $route
     * @param $params
     */
    public function add($route, $params){
        // echo '<p>'.$route.'</p>';
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    /**
     * @return bool
     */
    public function math(){
        $url = trim($_SERVER['REQUEST_URI'], '/');
        //debug($url);
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                //debug($matches);
                //echo '1234';
                $this->params = $params;
                return true;
             }
        }
        return false;
    }

    /**
     * ucfirst() - начало слова с большой буквы
     * */
    public function run()
    {
        if ($this->math()) {
            $path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if(method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}