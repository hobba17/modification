<?php
namespace core\base;
use core\Db;
use Valitron\Validator;

defined('_magaz') or die;
abstract class Model{
    protected $pdo;
    public $table = TABLE;
    public $attributes = [];
    public $errors = [];
    public $rules = [];
    public static $countSql = 0;
    public static $queries = [];
    public function __construct(){
        $this->pdo = Db::instance();
    }
    public function execute($sql, $id = []){//Общая функция
        self::$countSql++;
        self::$queries[] = $sql;
        return $this->pdo->execute($sql, $id);
    }
    public function findAll($param = '', $id = []){
        $sql = "SELECT * FROM ".PREF."{$this->table} $param";
        self::$countSql++;
        self::$queries[] = $sql;
        return $this->pdo->query($sql, $id);
    }
    public function findAllSql($sql, $id = []){
        self::$countSql++;
        self::$queries[] = $sql;
        return $this->pdo->query($sql, $id);
    }
    public function findUnique($sql, $id = []){//Массив с ключами по первой записанной в запрос ячейки
        self::$countSql++;
        self::$queries[] = $sql;
        return $this->pdo->findUnique($sql, $id);
    }
    public function findAllAssoc($sql, $id = []){//Простой массив только из первого ключа
        self::$countSql++;
        self::$queries[] = $sql;
        return $this->pdo->queryStr($sql, $id);
    }
    public function findOne($sql, $id = []){//Простой массив (переменная) из одной ячейки
        self::$countSql++;
        self::$queries[] = $sql;
        return $this->pdo->queryCol($sql, $id);
    }
    public function funInsertId($sql, $id){
        self::$countSql++;
        self::$queries[] = $sql;
        return $this->pdo->executeInId($sql, $id);
    }
    public function loadAttr($data){
        foreach ($this->attributes as $n => $v) {
            if(isset($data[$n])) $this->attributes[$n] = $data[$n];
        }
    }
    public function validate($data){
        Validator::lang(LANG);
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }
    public function getErrors(){
        $errors = '';
        foreach ($this->errors as $error) {
            foreach ($error as $item) $errors .= $item;
        }
        return $errors;
    }
}