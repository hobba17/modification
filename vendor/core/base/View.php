<?php
namespace core\base;
defined('_magaz') or die;
class View{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data =[];//Не присутствует
    public function __construct($route, $layout = '', $view = ''){
        $this->route = $route;
        $this->model = $route['controller'];
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
        if ($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
    }
    public function render($data){
        $viewFile = APP."/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if (file_exists($viewFile)){
            ob_start();
            require $viewFile;
            $content = ob_get_clean();
        }else{
            throw new \Exception("Не найден вид $viewFile", 500);
        }
        if (false !== $this->layout){
            $layoutFile = APP."/views/layouts/{$this->layout}.php";
            if (file_exists($layoutFile)){
                require $layoutFile;
            }else{
                throw new \Exception("Не найден шаблон $layoutFile", 500);
            }
        }
    }
}