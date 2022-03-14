<?php
defined('_magaz') or die;
$lang = \core\App::$app->getProperty('lang');
?>
<?=varError()?>
<?=varSuccess()?>
<form enctype="multipart/form-data" method="post" id="form_edit_registration">
    <p align="center">
        <img src="<?=PUB?>/img_uploads/<?=$data?>"><br>
        <label><?=$lang['load_foto']?></label><br><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
        <input type="file" name="upload_image" multiple accept="image/*,image/jpeg" class="edit_profile_foto"><br><br>
        <label><?=$lang['load_login']?></label><br><br>
        <input type="text" name="name" class="edit_profile_input" placeholder="<?=$lang['friend']?>" required value="<?=empty($_SESSION['post']['name']) ? '':$_SESSION['post']['name'];?>"><br><br>
        <label>E-mail</label><br><br>
        <input type="email" name="email" class="edit_profile_input" placeholder="email@my.com" required value="<?=empty($_SESSION['post']['email']) ? '':$_SESSION['post']['email'];?>"><br><br>
        <label><?=$lang['pass']?></label><br><br>
        <input type="password" name="pass" class="edit_profile_pass" placeholder="*******" required value="<?=empty($_SESSION['post']['pass']) ? '':$_SESSION['post']['pass'];?>"><br><br>
        <div id="block-captcha">
            <img src="<?=PUB?>/reg/reg-captcha.php">
            <input type="text" name="captcha" id="reg_captcha" required><br><br>
            <p id="reloadcaptcha"><?=$lang['update']?></p>
        </div>
<input type="submit" name="registration" class="reg_profile_submit" value="<?=$lang['loader']?>">
</form>