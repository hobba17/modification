<?php
defined('_magaz') or die;
$lang = \core\App::$app->getProperty('lang');
?>
<table width="1050">
    <tr><th>
            <p class="text"><?=$lang['text']?></p>
            <p class="zagolovok"><?=$lang['nord']?></p>
        </th></tr>
    <tr width="1050" height="647" style="background-image: url(<?=PATH?>/public/img/map/magaz_nord.jpg);">
        <th valign='top'>
            <img src="<?=PATH?>/public/img/nord/fife.jpg" height="25" onclick="changeSizeImage(this)">    
            <img src="<?=PATH?>/public/img/nord/kvas2.jpg" height="25" onclick="changeSizeImage (this)">    
            <img src="<?=PATH?>/public/img/nord/sale.jpg" height="25" onclick="changeSizeImage(this)">
        </th></tr>
    <tr><th>&nbsp;</th></tr>
    <tr><th>
            <p class="zagolovok"><?=$lang['south']?></p>
        </th></tr>
    <tr width="1050" height="702" style="background-image: url(<?=PATH?>/public/img/map/magaz_south.jpg);"><th style='vertical-align: bottom;'>
            <img src="<?=PATH?>/public/img/south/peper.jpg" height="25" onclick="changeSizeImage(this)">    
            <img src="<?=PATH?>/public/img/south/kafe.jpg" height="25" onclick="changeSizeImage(this)">    
            <img src="<?=PATH?>/public/img/south/magaz.jpg" height="25" onclick="changeSizeImage (this)">    
            <img src="<?=PATH?>/public/img/south/meat.jpg" height="25" onclick="changeSizeImage(this)">    
            <img src="<?=PATH?>/public/img/south/apteka.jpg" height="25" onclick="changeSizeImage(this)">    
            <img src="<?=PATH?>/public/img/south/magnit.jpg" height="25" onclick="changeSizeImage(this)">    
        </th></tr>
    <tr><th>&nbsp;</th></tr>
</table>
