<?php
namespace core;
defined('_magaz') or die;
class Cache{
    use TSingletone;
    public function set($key, $data){
        file_put_contents(CACHE.'/'.md5($key).'.ndf', serialize($data));
    }
    public function get($key){
        $file = CACHE.'/'.md5($key).'.ndf';
        if (file_exists($file) && time() - 3600 < filemtime($file)){
            return unserialize(file_get_contents($file));
        }
        return false;
    }
}