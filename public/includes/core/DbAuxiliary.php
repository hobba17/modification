<?php
defined('_magaz') or die;
define('pref', 'zr6i_');
class DbAuxiliary{
    protected $pdo;
    public function __construct(){
        $db = require __DIR__.'/../../../config/config_db.php';
        $options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'],$options);
    }
    public function execute($sql, $params = []){//Общая функция
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
    public function queryCol($sql, $params = []){//Простой массив (строковое значение) из одной ячейки
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }
    public function queryStr($sql, $params = []){//Простой массив(с одним ключём)
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function query($sql, $params = []){//Сложный (двойной) массив
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        return ($res === false)?[]:$stmt->fetchAll();
    }
}