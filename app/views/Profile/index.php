<?php
defined('_magaz') or die;
$lang = \core\App::$app->getProperty('lang');
?>
<?=varError()?>
<?=varSuccess()?>
<br>
<p id="profile" align="center"><?=$lang['izm_prof']?><br>
    <img src="<?=($data['img'] == '/img_dop/noimages80x70.png') ? PUB.$data['img'] : PUB.'/img_uploads/'.$data['img'];?>"></p>
<form enctype="multipart/form-data" method="post" id="form_edit_profile">
    <p align="center">
        <label><?=$lang['pom_foto']?></label><br><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
        <input type="file" name="upload_image" multiple accept="image/*,image/jpeg" class="edit_profile_foto"><br><br>
        <label><?=$lang['izm_login']?></label><br><br>
        <input type="text" name="name" class="edit_profile_input" value="<?=$data['name']?>"><br><br>
        <label><?=$lang['izm_pass']?></label><br><br>
        <input type="password" name="pass" id="auth_pass2" value="<?=$data['true_pass']?>"><span id="button-pass-show-hide" class="pass-hide" title="<?=$lang['click_me']?>"></span><br><br>
        <label>E-mail</label><br><br>
        <input type="email" name="email" class="edit_profile_input" value="<?=$data['email']?>"><br><br>
        <input type="submit" name="edit_profile" class="edit_profile_submit" value="<?=$lang['loader']?>"><br><br>
    </p>
</form>
<p id="delp_rof"><a class="delprof"><?=$lang['del_prof']?></a></p>