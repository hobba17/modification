<?php
define('_magaz', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	$_SESSION['slovo'] = $_POST['lang'];
}
