<?php defined('_magaz') or die;
$lang = \core\App::$app->getProperty('lang');
?>
<table width="1050">
    <tr><th>
            <p class="text"><span><?=$lang['text']?></span></p>
            <p class="zagolovok"><?=$lang['nord']?></p>
        </th></tr>
    <tr width="1050" height="647" style="background-image: url(<?=PATH?>/public/img/map/nord0.jpg);">
        <th valign='top'>
            <img src="<?=PATH?>/public/img/nord/detsad.jpg" height="25" onclick="changeSizeImage (this)">
            <img src="<?=PATH?>/public/img/nord/institut.jpg" height="25" onclick="changeSizeImage(this)">
            <img src="<?=PATH?>/public/img/nord/ambulatorya.jpg" height="25" onclick="changeSizeImage(this)">
            <img src="<?=PATH?>/public/img/nord/post.jpg" height="25" onclick="changeSizeImage(this)">
        </th></tr>
    <tr><th> </th></tr>
    <tr><th><p class="zagolovok"><?=$lang['south']?></p></th></tr>
    <tr width="1050" height="702" style="background-image: url(<?=PATH?>/public/img/map/south.jpg);">
        <th style='vertical-align: bottom;'>
            <img src="<?=PATH?>/public/img/south/klub.jpg" height="25" onclick="changeSizeImage (this)">
            <img src="<?=PATH?>/public/img/south/park.jpg" height="25" onclick="changeSizeImage(this)">
            <img src="<?=PATH?>/public/img/south/school.jpg" height="25" onclick="changeSizeImage(this)">
        </th></tr>
    <tr><th> </th></tr>
    <tr><th><p class="zagolovok"><?=$lang['gener']?></p></th></tr>
    <tr width="1050" height="761" style="background-image: url(<?=PATH?>/public/img/map/obzor.jpg);"><th> </th></tr>
    <tr><th> </th></tr>
</table>