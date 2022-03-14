<?php

namespace app\controllers;

defined('_magaz') or die;
class ProfileController extends AppController{
    public function indexAction(){
        $this->set($this->getModel());
        $this->getView();
    }
}