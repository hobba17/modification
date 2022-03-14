<?php
namespace app\controllers;
defined('_magaz') or die;
class MainController extends AppController{
    public function indexAction(){
        $this->getView();
    }
}