<?php
defined('_magaz') or die;
session_start();
define('DEBUG', 1);
define('ROOT', dirname(__DIR__));
define('WWW', ROOT.'/public');
define('APP', ROOT.'/app');
define('CORE', ROOT.'/vendor/core');
define('LIBS', ROOT.'/vendor/core/libs');
define('CACHE', ROOT.'/tmp/cache');
define('CONF', ROOT.'/config');
define('LAYOUT', 'default');
define('TABLE', 'pages');//Таблица по умолчанию
define('PATH', 'http'.(empty($_SERVER['HTTPS'])?'://':'s://').$_SERVER['SERVER_NAME'].'/parser');//$_SERVER['HTTPS'] - На сервере может не работать!
define('PUB', PATH.'/public');
define('PREF', 'zr6i_');
require_once LIBS.'/functions.php';
define('LANG', empty($_SESSION['slovo']) ? 'ru' : clearStr($_SESSION['slovo']));
require_once ROOT.'/vendor/autoload.php';
