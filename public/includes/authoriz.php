<?php
define('_magaz', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	require dirname(__FILE__).'/core/DbAuxiliary.php';//require __DIR__.'/core/db.php';
	require __DIR__.'/../../vendor/core/libs/functions.php';
	$db = new DbAuxiliary;
	if (($row = $db->queryCol("SELECT `slut` FROM `".pref."users` WHERE `name` = ? OR `email` = ?", [$_POST['login'],$_POST['login']])) > 0) {
		if (($row = $db->queryStr("SELECT `id`, `name`, `dostup` FROM `".pref."users` WHERE (`name` = ? OR `email` = ?) AND `pass` = '".EncodePassword($row.clearStr($_POST['pass']))."'", [$_POST['login'],$_POST['login']])) > 0) {
			if ($row['dostup'] == '0') {
				echo 'ban';
			}elseif ($row['name'] == 'Товарищ'){
				$db->execute("UPDATE `".pref."pages` SET `dostup` = 1 WHERE `links` = 'admin'");
				$_SESSION['user']['auth'] = 'budet';
				$_SESSION['user']['name'] = 'Admin';
				$_SESSION['user']['adminy_role'] = 'Главный';
				$_SESSION['user']['id'] = $row['id'];
				echo 'yes_auth';
			}else{
				$_SESSION['user']['auth'] = 'budet';
				$_SESSION['user']['name'] = $row['name'];
				$_SESSION['user']['id'] = $row['id'];
				echo 'yes_auth'; }
		}
	} else echo 'no_auth';
}
