<?php
/**
 * Created by PhpStorm.
 * User: zolow
 * Date: 02.04.2018
 * Time: 2:39
 */
 ini_set('display_errors', 1);
 error_reporting(E_ALL);

 function debug($str){
     echo '<pre>';
     var_dump($str);
     echo '</pre>';
     exit;
 }