<?php
namespace app\widgets\menu;
use app\models\AppModel;
use core\App;
use core\Cache;

defined('_magaz') or die;
class Menu{
    protected $tpl;
    protected $data;
    protected $menuHtml;
    protected $cacheKey;
    public function __construct(){
        $this->cacheKey = LANG.'menu';
        $this->tpl = __DIR__.'/menu_tpl/menu.php';
        $this->run();
    }
    protected function run(){
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if (!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            $this->menuHtml = $this->catToTemplate($this->data, App::$app->getProperty('controller'));
            $cache->set($this->cacheKey, $this->menuHtml);
        }
        $this->output();
    }
    public static function getMenu(){
        $cache = Cache::instance();
        $cats = $cache->get(LANG.'cats');
        if (!$cats){
            $mod = new AppModel();
            $cats = $mod->findAllSql("SELECT `id`, `page_".LANG."`, `links` FROM `".PREF.TABLE."` WHERE `dostup` = 1");
            $cache->set(LANG.'cats', $cats);
        }
        return $cats;
    }
    protected function output(){
        echo $this->menuHtml;
    }
    protected function catToTemplate($data, $page){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}