<?php
//define('_magaz', 1);

//session_start();
require __DIR__.'/core/DbAuxiliary.php';
//require __DIR__.'/../../vendor/core/libs/functions.php';
$db = new DbAuxiliary();
echo $db->queryCol("SELECT `slut` FROM `".PREF."users` WHERE `name` = 'Товарищ'");