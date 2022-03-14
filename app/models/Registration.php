<?php

namespace app\models;

use core\App;

defined('_magaz') or die;
class Registration extends AppModel{
    public function getData(){
        if ($_POST){
            $_SESSION['post'] = $_POST;
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
                'lengthMin' => [
                    ['pass', 6],
                    ['name', 2]
                ],
                'lengthMax' => [
                    ['pass', 15],
                    ['name', 19]
                ]
            ];
            $this->loadAttr($_POST);
            if(!$this->validate($_POST)){
                $_SESSION['error'][] = $this->getErrors();
            }
            if (($row = $this->findOne("SELECT `name` FROM `".PREF."users` WHERE `ip` = ?", [$_SERVER['REMOTE_ADDR']])) > '') {
                $_SESSION['error'][] = $langCommon[LANG]['uje_reg'].' - '.$row;
            } else {
                if ($this->findOne("SELECT `name` FROM `".PREF."users` WHERE `name` = ?", [$this->attributes['name']]) > ''){
                    $_SESSION['error'][] = $langCommon[LANG]['log_zan'];
                }
                if ($this->findOne("SELECT `email` FROM `".PREF."users` WHERE `email` = ?", [$this->attributes['email']]) > ''){
                    $_SESSION['error'][] = $langCommon[LANG]['mail_zan'];
                }
                if (strtolower($_POST['captcha']) != $_SESSION['captcha']){
                    $_SESSION['error'][] = $langCommon[LANG]['no_capcha'];
                }
            }
            if (empty($_SESSION['error'])) {
                $true_pass = clearStr($this->attributes['pass']);
                $slut = rand() % 11133;
                $pass = EncodePassword($slut.$true_pass);
                $sql = "INSERT INTO `".PREF."users` (`name`, `img`, `email`, `ip`, `pass`, `true_pass`, `slut`)
                        VALUES (?, '/img_dop/noimages80x70.png', ?, '{$_SERVER['REMOTE_ADDR']}', ?, ?, ?)";
                $id_img = $this->funInsertId($sql, [$this->attributes['name'], $this->attributes['email'], $pass, $true_pass, $slut]);
                if (empty($_POST['upload_image'])) { include WWW.'/includes/upload-image.php'; unset($_POST['upload_image']); }
                if ($id_img) {
                    $_SESSION['success'] = $langCommon[LANG]['send_mail'];
                }
                /*if ($id_img) {
                    $this->attributes['subject'] = $langCommon[LANG]['msg_forum'].' planeta-zelenyi. ru';
                    $mail = MailInc::instance($this->attributes);
                    $posl  = $langCommon[LANG]['login'].': '.$this->attributes['name'].'<br>';
                    $posl .= $langCommon[LANG]['forum'].': planeta-zelenyi. ru/forum/'.'<br>'.$langCommon[LANG]['del_mail'].'<br>';
                    $posl .= $langCommon[LANG]['reg_pod']." http://planeta-zelenyi.ru/confirm/?atak=4&zatak=".$id_img."&cart=".$this->attributes['email'];
                    if($mail->sendMail($posl)){
                        $error[] = $langCommon[LANG]['send_mail'];
                        $msg = 'Отправлено';
                    }else{
                        $error[] = $langCommon[LANG]['send_no'].'<br>'.$mail->error;
                        $msg = 'Не отправлено: '.$mail->error;
                    }
                    writFile($msg);
                } else $error[] = $langCommon[LANG]['send_no'];*/
            }
            redirect('/registration');
        }
        return $this->findOne("SELECT `img` FROM `".PREF."users` WHERE `id` = 1 AND `dostup` = 1");
    }
}