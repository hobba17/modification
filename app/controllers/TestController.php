<?php
namespace app\controllers;


use app\models\Profile;

defined('_magaz') or die;
class TestController extends AppController{
    public function indexAction(){
        include __DIR__.'/../../public/includes/del_profile.php';
        dump($row);
        //dump($_SESSION['user']);
    }
}