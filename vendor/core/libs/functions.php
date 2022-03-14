<?php
defined('_magaz') or die;
function generStr($length = 7){
    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
function varError(){
    if (!empty($_SESSION['error'])){
        $pacifier = is_array($_SESSION['error']) ? implode('<br>', $_SESSION['error']) : $_SESSION['error'];
        unset($_SESSION['error']);
        return '<p id="form-error" align="center">'.$pacifier.'</p>';
    }
    return null;
}
function varSuccess(){
    $success = empty($_SESSION['success']) ? '' : '<p id="form-success" align="center">'.$_SESSION['success'].'</p>';
    unset($_SESSION['success']);
    return $success;
}
function EncodePassword($pass){
    return hash('sha256', $pass);
}
function writFile($msg){
    file_put_contents(ROOT.'/tmp/log_mail.log', $msg . ' - ' . date('Y-m-d H:i') . "\n", FILE_APPEND | LOCK_EX);
}
function redirect($http = ''){
    header('Location: '.PATH.$http);
    exit;
}
function clearStr($str){
    $str = strip_tags($str);
    $str = htmlspecialchars($str, ENT_QUOTES);
    return trim($str);
}