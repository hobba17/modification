<?php
namespace config;
defined('_magaz') or die;
class Routes{
    protected static $routes = [
        '^$' => ['controller' => 'Main', 'action' => 'index'],
        '^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$' => [],
    ];
}