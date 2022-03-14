<?php

namespace core\base;

use app\widgets\menu\Menu;
use core\App;
use core\Language;

defined('_magaz') or die;
abstract class Controller{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public function __construct($route){
        $this->route = $route;
        $this->model = $route['controller'];
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
        App::$app->setProperty('controller', $this->controller);
        App::$app->setProperty('cats', Menu::getMenu());
        App::$app->setProperty('lang', Language::getLang());
        App::$app->setProperty('langCommon', Language::getLangCommon());
        //dump(App::$app->getProperties());
    }
    public function set($data){//На хрен не нужен!
        $this->data = $data;
    }
    public function getModel(){
        $model = 'app\models\\'.$this->model;
        if (class_exists($model)) {
            $modelObject = new $model;
            return $modelObject->getData();
        }else{
            throw new \Exception("Не найден класс $model", 500);
        }
    }
    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view);
        $viewObject->render($this->data);
    }
}