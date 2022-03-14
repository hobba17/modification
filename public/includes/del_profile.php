<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    define('_magaz', 1);
    session_start();
    require __DIR__.'/core/DbAuxiliary.php';
    $db = new DbAuxiliary();
    if (($row = $db->queryCol("SELECT `img` FROM `".pref."users` WHERE `id` = ?", [$_SESSION['user']['id']])) > '') {
        $path = __DIR__.'/../img_uploads/'.$row;
        if (file_exists($path)){
            unlink($path);
        }
    }
    $db->execute("UPDATE `".pref."users` SET `name` = 'Покинул форум', `img` = '/img_dop/noimages80x70.png', `pass` = 0, `true_pass` = 0, `slut` = 0, `iling` = 0, `dostup` = 1 WHERE `id` = ?", [$_SESSION['user']['id']]);
    unset($_SESSION['user']);
    echo 'yes';
}