<?php

namespace app\core;


class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'app/views/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start();// Включение буферизации вывода
            require $path;
            $content = ob_get_clean();// Получить содержимое текущего буфера и удалить его
            require $path;
        } else{
            echo 'Вид'.$this->path.' не найден';
        }
    }

    public function redirect($url)
    {
        header('Location: '.$url);
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'app/views/errors/'.$code.'.php';
        if(file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function message($status, $message)
    {
        exit(json_encode(['status'=>$status, 'message'=>$message]));
    }

    //редирект
    public function location($url)
    {
        exit(json_encode(['url'=>$url]));
    }


}
