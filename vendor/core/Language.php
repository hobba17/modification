<?php

namespace core;


defined('_magaz') or die;
class Language{
    public static function getLang(){
        $path = WWW.'/lang/'.LANG.'/'.App::$app->getProperty('controller').'.ini';
        if (!file_exists($path)) die("В $path отсутствует нужный язык!");
        return parse_ini_file($path, false, INI_SCANNER_RAW);
    }
    public static function getLangCommon(){
        $pathCommon = WWW.'/lang/common.ini';
        if (!file_exists($pathCommon)) die("В $pathCommon отсутствует нужный язык!");
        return parse_ini_file($pathCommon, true, INI_SCANNER_RAW);
    }
}
