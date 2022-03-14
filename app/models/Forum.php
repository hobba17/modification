<?php

namespace app\models;

use core\App;

defined('_magaz') or die;
class Forum extends AppModel{
    public function getData(){
        $langCommon = App::$app->getProperty('langCommon');
        if ($_POST){
            $sql = "INSERT INTO `".PREF."comments` (`id_hod`, `comment`, `date_comment`, `id_comment`, `moderat`)
            VALUES
                (NULL, :comment, '".date('Y-m-d H:i')."', :id_comment, 1)";
            $id_comment = $this->funInsertId($sql, [':comment' => $_POST['comment'],':id_comment' => $_POST['id']]);
            if (empty($_POST['galleryimg'])) {
                if (isset($_FILES['galleryimg']['name'][0])) {
                    for ($i = 0; $i < count($_FILES['galleryimg']['name']); $i++) {
                        if ($_FILES['galleryimg']['name'][$i]) {
                            $galleryimgType = $_FILES['galleryimg']['type'][$i];
                            $types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/x-png');
                            $imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['galleryimg']['name'][$i]));
                            $uploaddir = './img_forum/';
                            $newfilename = generStr(8)."-".$_POST['id'].".".$imgext;
                            $uploadfile = $uploaddir.$newfilename;
                            if (!in_array($galleryimgType, $types)) {
                                $_SESSION['error'] = '<p id="form-error">'.$langCommon[LANG]['img10'].'</p>';
                                continue;
                            }
                            if (empty($_SESSION['error'])) {
                                if (move_uploaded_file($_FILES['galleryimg']['tmp_name'][$i], $uploadfile)) {
                                    $sql = "INSERT INTO `".PREF."forum_images` (`images`, `id_comment`, `id_user`)
                                    VALUE (:newfilename, :id_comment, :id_user)";
                                    $this->funInsertId($sql, [':newfilename' => $newfilename,':id_comment' => $id_comment,':id_user' => $_POST['id']]);
                                    $info   = getimagesize($uploadfile);//funInsertId Поменять на нормальный
                                    $width  = $info[0];
                                    $height = $info[1];
                                    $type   = $info[2];
                                    switch ($type) {
                                        case 1:
                                            $img = imageCreateFromGif($uploadfile);
                                            imageSaveAlpha($img, true);
                                            break;
                                        case 2:
                                            $img = imageCreateFromJpeg($uploadfile);
                                            break;
                                        case 3:
                                            $img = imageCreateFromPng($uploadfile);
                                            imageSaveAlpha($img, true);
                                            break;
                                    }
                                    $w = 600;
                                    $h = 0;
                                    if (empty($w)) $w = ceil($h / ($height / $width));
                                    if (empty($h)) $h = ceil($w / ($width / $height));
                                    $tmp = imageCreateTrueColor($w, $h);
                                    if ($type == 1 || $type == 3) {
                                        imagealphablending($tmp, true);
                                        imageSaveAlpha($tmp, true);
                                        $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
                                        imagefill($tmp, 0, 0, $transparent);
                                        imagecolortransparent($tmp, $transparent);
                                    }
                                    $tw = ceil($h / ($height / $width));
                                    $th = ceil($w / ($width / $height));
                                    if ($tw < $w) {
                                        imageCopyResampled($tmp, $img, ceil(($w - $tw) / 2), 0, 0, 0, $tw, $h, $width, $height);
                                    } else {
                                        imageCopyResampled($tmp, $img, 0, ceil(($h - $th) / 2), 0, 0, $w, $th, $width, $height); }
                                    imagejpeg($tmp, $uploadfile);
                                    imagedestroy($tmp);
                                } else $_SESSION['error'] = '<p id="form-error">'.$langCommon[LANG]['img8'].'</p>';
                            }
                        }
                    }
                }
                unset($_POST['galleryimg']);
            }
            redirect('/forum');
        }
        //Сам форум
        $query_start_num = '';
        $sql = "SELECT `id_hod`, `name`, `img`, `comment`, `date_comment`, `id_comment`, `moderat` FROM `".PREF."users`, `".PREF."comments` WHERE `".PREF."users`.`id` = `".PREF."comments`.`id_comment` ORDER BY `date_comment` $query_start_num";
        $data['forum'] = $this->findAllSql($sql);
        //Фотки пользователей форума
        $this->table = 'forum_images';
        $data['foto'] = $this->findAll();
        return $data;
    }
}