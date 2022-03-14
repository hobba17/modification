<?php

namespace app\controllers;

defined('_magaz') or die;
class ForumController extends AppController{
    public function indexAction(){
        $this->set($this->getModel());
        $this->getView();
    }
}