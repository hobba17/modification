<?php
namespace core;
use config\Params;
defined('_magaz') or die;
class Registry extends Params{
    use TSingletone;
    public function setProperty($name, $value){
        self::$properties[$name] = $value;
    }
    public function getProperty($name){
        if(self::$properties[$name]){
            return self::$properties[$name];
        }
        return null;
    }
    public function getProperties(){//На production не нужен
        return self::$properties;
    }
}