<?php
namespace core;
defined('_magaz') or die;
class Db{
    use TSingletone;
    protected $pdo;
    protected function __construct(){
        $db = require_once CONF.'/config_db.php';
        $options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'],$options);
    }
    public function execute($sql, $params = []){//Общая функция
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
    public function findUnique($sql, $params = []){//Массив с ключами по первой записанной в запрос ячейки
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        return ($res === false)?[]:$stmt->fetchAll(\PDO::FETCH_UNIQUE);
    }
    public function executeInId($sql, $params = []){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $this->pdo->lastInsertId();
    }
    public function query($sql, $params = []){//Сложный (двойной) массив
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        return ($res === false)?[]:$stmt->fetchAll();
    }
    public function queryCol($sql, $params = []){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();//Простой массив из одной ячейки
    }
    public function queryNum($sql, $params = []){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_NUM);//Нумерованный массив
    }
    public function queryStr($sql, $params = []){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);//Простой массив(с одним ключём) 
    }
}