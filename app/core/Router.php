<?php
/**
 * Created by PhpStorm.
 * User: zolow
 * Date: 02.04.2018
 * Time: 2:47
 */

namespace app\core;

class Router {

    protected $routes = [];
    protected $params = [];

    function __construct(){
        //echo'Это класс Router.php';
        $arr = require 'app/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    // Ветвление
    public function add($route, $params){
        // echo '<p>'.$route.'</p>';
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

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
                    echo 'Не найден action: '.$action;
                }
            } else {
                echo 'Не найден controller: '.$path;
            }
        } else {
            echo  'Маршрут не найден';
        }
    }
}