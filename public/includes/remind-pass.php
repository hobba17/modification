<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	define('_magaz', 1);
	session_start();
	require __DIR__.'/../../conf/config.inc.php';
	require 'core/db.php';
	require __DIR__.'/../../vendor/libs/functions.php';
	$db = new DateBase;
	$email = $db->clearStr($_POST['email']);
	if ($db->numRowsTrue("SELECT `email` FROM `".pref."users` WHERE `email` = '$email'")) {
		$true_pass = $db->fungenpass();
		$true_pass = $db->clearStr($true_pass);
		$slut = rand() % 11133;
		$db->insertDb("UPDATE `".pref."users` SET `pass` = '".EncodePassword($slut.$true_pass)."', `true_pass` = '$true_pass', `slut` = '$slut' WHERE `email` = '$email'");
		echo sendMailReming($email, $_SESSION['arr_com'][$_SESSION['lang']]['new_pass'].$true_pass) ? 'yes' : $_SESSION['arr_com'][$_SESSION['lang']]['no_send_mail'];
	} else echo $_SESSION['arr_com'][$_SESSION['lang']]['no_mail'];
}
