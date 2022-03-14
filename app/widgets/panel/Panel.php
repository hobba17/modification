<?php

namespace app\widgets\panel;

use app\models\AppModel;
use core\App;

defined('_magaz') or die;
class Panel{
    protected $data;
    protected $panel;
    public function __construct(){
        $this->run();
    }
    protected function run(){
        $this->getData();
        $langCommon = App::$app->getProperty('langCommon');
        if (isset($_SESSION['user']['auth']) && $_SESSION['user']['auth'] == 'budet') {
            $this->panel = '<p id="p6" align="right"><a class="nick">' . $_SESSION['user']['name'] . '</a>';
        }elseif (App::$app->getProperty('controller') == 'Registration') {
            $this->panel = '<p id="p4" align="right"><a id="p1" href="'.($_SERVER['HTTP_REFERER'] ? : PATH).'">'.$langCommon[LANG]['back'].'</a> <span>|</span> <a id="p2" href="' . PATH . '/registration">'.$langCommon[LANG]['reg'].'</a></p>';
        }elseif ($this->data) {
            $this->panel = '';
        }else{
            $this->panel = '<p id="p5" align="right"><a class="okno-vipad">'.$langCommon[LANG]['ent'].'</a> <span>|</span> <a id="p3" href="'.PATH.'/registration">'.$langCommon[LANG]['reg'].'</a></p>';
        }
        $this->output();
    }
    protected function output(){
        echo $this->panel;
    }
    protected function getData(){
        $mod = new AppModel();
        $this->data = $mod->findOne("SELECT `name` FROM `".PREF."users` WHERE `ip` = ? AND `dostup` = 0", [$_SERVER['REMOTE_ADDR']]);
    }
}