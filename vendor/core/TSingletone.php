<?php
namespace core;
defined('_magaz') or die;
trait TSingletone{
    private static $instance;
    public static function instance(){
        if (self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}