<?php

namespace app\widgets\visitor;

use app\models\AppModel;

defined('_magaz') or die;
class Visitor{
    protected $tpl;
    protected $visitorData;
    public function __construct(){
        $this->tpl = __DIR__.'/visitor_tpl/visitor.php';
        $this->run();
    }
    protected function run(){
        $this->getVisitor();
        echo $this->getVisitorHtml($this->visitorData);
    }
    protected function getVisitor(){
        $mod = new AppModel();
        $id = session_id();
        $name = empty($_SESSION['user']['name']) ? 0 : $_SESSION['user']['name'];
        $var = $mod->findAllSql("SELECT * FROM `".PREF."guests` WHERE `id_guest` = ?", [$id]);
        if (empty($var)){
            $mod->execute("INSERT INTO `".PREF."guests` (`id_guest`, `guest`) VALUES (?, ?)", [$id,$name]);
        }else{
            $mod->execute("UPDATE `".PREF."guests` SET `put_date` = NOW(), `guest` = ? WHERE `id_guest` = ?", [$name,$id]);
        }
        $mod->execute("DELETE FROM `".PREF."guests` WHERE `put_date` < NOW() - INTERVAL '20' MINUTE");
        $mod->execute("DELETE FROM `".PREF."users` WHERE `check_reg` = 0 AND (`time_reg` < NOW() - INTERVAL '30' MINUTE)");
        $anon = 0;
        $ne_anon = 0;
        $res = $mod->findAllSql("SELECT `guest` FROM `".PREF."guests`");
        if ($res > 0){
            foreach ($res as $row) {
                if ($row['guest'] == '0'){
                    $anon++;
                }else{
                    $ne_anon++;
                }
            }
        }
        $this->visitorData = [$anon,$ne_anon];
    }
    protected function getVisitorHtml($visitorData){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}