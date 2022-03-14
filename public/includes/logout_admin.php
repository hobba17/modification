<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	define('_magaz', 1);
	session_start();
	unset($_SESSION['dobro']);
	echo 'logout';
}
