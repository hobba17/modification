<?php

namespace app\models;

use core\App;

defined('_magaz') or die;
class Profile extends AppModel{
    public function getData(){
        if (empty($_SESSION['user'])){
            throw new \Exception("Вы Не Авторизованы!", 404);
        }
        if ($_POST){
            $langCommon = App::$app->getProperty('langCommon');
            $this->attributes = [
                'name' => '',
                'email' => '',
                'pass' => ''
            ];
            $this->rules = [
                'required' => [
                    ['name'],
                    ['email'],
                    ['pass']
                ],
                'email' => [
                    ['email']
                ],
                'lengthMax' => [
                    ['name', 19],
                    ['pass', 15]
                ],
                'lengthMin' => [
                    ['name', 2],
                    ['pass', 6]
                ]
            ];
            $this->loadAttr($_POST);
            if(!$this->validate($_POST)){
                $error[] = $this->getErrors();
            }
            if(empty($error)){
                $slut = rand() % 11133;
                $true_pass = clearStr($this->attributes['pass']);
                $pass = EncodePassword($slut.$true_pass);
                $sql = "UPDATE `".PREF."users` 
                    SET `name` = ?, `email` = ?, `ip` = '{$_SERVER['REMOTE_ADDR']}', `pass` = '$pass', `true_pass` = '$true_pass', `slut` = '$slut'
                    WHERE `id` = ?";
                $res = $this->execute($sql, [$this->attributes['name'],$this->attributes['email'],$_SESSION['user']['id']]);
                if (empty($_POST['upload_image'])) {
                    include WWW.'/includes/upload-image.php'; unset($_POST['upload_image']);
                }
                if ($res == 1){
                    $_SESSION['user']['name'] = $this->attributes['name'];
                    $_SESSION['success'] = $langCommon[LANG]['data_suc'];
                } else {
                    $_SESSION['error'][] = $langCommon[LANG]['no_work'];
                }
            }else{
                $_SESSION['error'] = $error;
            }
            redirect('/profile');
        }
        $sql = "SELECT `img`, `name`, `true_pass`, `email` FROM `".PREF."users` WHERE `id` = ? AND `dostup` = 1";
        return $this->findAllAssoc($sql, [$_SESSION['user']['id']]);
    }
}