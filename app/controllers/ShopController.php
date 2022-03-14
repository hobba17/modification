<?php

namespace app\controllers;

defined('_magaz') or die;
class ShopController extends AppController{
    public function indexAction(){
        $this->getView();
    }
}