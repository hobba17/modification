<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	define('_magaz', 1);
	session_start();
	/*if($_SESSION['user']['name'] == 'Admin') {
		require dirname(__FILE__).'/core/db.php';
		$db = new DateBase;
		$db->insertDb("UPDATE `".pref."pages` SET `dostup` = 0 WHERE `links` = 'admin'");
	}*/
	unset($_SESSION['user']);
	echo 'logout';
}
