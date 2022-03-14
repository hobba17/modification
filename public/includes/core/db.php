<?php
defined('_magaz') or die;
define('pref', 'zr6i_');
class DateBase {
	private $elem = '{?}';
	public $row_assoc = [];
	private $mysqli;
	function __construct() {
		$config = require __DIR__.'/../../../config/config_db.php';
		//$this->mysqli = new mysqli('localhost', 'admin', '12345', 'zelena');
		$this->mysqli = new mysqli($config['host'], $config['user'], $config['pass'], $config['name']);
		if ($this->mysqli->connect_errno) {
			printf("Связи с базой нет: %s\n", $this->mysqli->connect_error);
			exit;
		}
		$this->mysqli->set_charset("utf8");
		$this->mysqli->query("SET NAMES UTF8");
	}
	function metClear($zap, $par = false) {
		if ($par) {
			for ($i = 0; $i < count($par); $i++) {
				$pos = strpos($zap, $this->elem);
				$par[$i] = strip_tags($par[$i]);
				$par[$i] = $this->mysqli->real_escape_string($par[$i]);
				$arg = "'".trim($par[$i])."'";
				$zap = substr_replace($zap, $arg, $pos, strlen($this->elem));
			}
		}
		return $zap;
	}
	function selectDb($zap, $par = false) {
		$res = $this->mysqli->query($this->metClear($zap, $par));
		while ($row = $res->fetch_assoc()){
			$row_assoc[] = $row;
		}
		return (empty($row_assoc))?0:$row_assoc;
	}
	function selectOneDb($zap, $par = false) {
		$res = $this->mysqli->query($this->metClear($zap, $par));
		return $res->fetch_assoc();
	}
	function arrayDb($zap) {
		$res = $this->mysqli->query($zap);
		return $res->fetch_array(MYSQLI_NUM);
	}
	function insertDb($zap, $par = false) {
		$res = $this->mysqli->query($this->metClear($zap, $par));
		return ($res)?true:false;
	}
	function insert_id($zap, $par = false) {
		$res = $this->mysqli->query($this->metClear($zap, $par));
		if ($res) {
			return ($this->mysqli->insert_id == 0)?true:$this->mysqli->insert_id;
		} else return false;
	}
	function numRowsTrue($zap, $par = false) {
		$res = $this->mysqli->query($this->metClear($zap, $par));
		return ($res->num_rows > 0)?true:false;
	}
	function numRows($zap) {
		$res = $this->mysqli->query($zap);
		$this->row_assoc = $res->num_rows;
		return $this->row_assoc;
	}
	function clearStr($res) {
		$res = strip_tags($res);
		$res = $this->mysqli->real_escape_string($res);
		$res = trim($res);
		return $res;
	}
	function fungenpass($number = 7) {
		$pass = '';
		$arr = ['a','b','c','d','e','f','g','h',
			'i','j','k','l','m','n','o','p',
			'r','s','t','u','v','x','y','z',
			'1','2','3','4','5','6','7','8','9','0'];
		for ($i = 0; $i < $number; $i++) {
			$index = rand(0, count($arr) - 1);
			$pass .= $arr[$index];
		}
		return $pass;
	}
	function __destruct() {
		if ($this->mysqli) $this->mysqli->close();
	}
}
