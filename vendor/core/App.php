<?php
namespace core;
defined('_magaz') or die;
class App{
    public static $app;
    public function __construct(){
        self::$app = Registry::instance();
        new ErrorHandler;
        Router::dispatch(trim($_SERVER['QUERY_STRING'], '/'));
    }
    /*protected function getParams(){
        $params = include CONF.'/params.php';
        if (!empty($params)){
            foreach ($params as $k => $v){
                self::$app->setProperty($k, $v);
            }
        }
    }*/
}