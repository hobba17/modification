<?php
defined('_magaz') or die;
$lang = \core\App::$app->getProperty('lang');
?>
<table width="1050">
    <tr><th>
            <p class="text"><?=$lang['text']?></p>
            <p class="zagolovok"><?=$lang['nord']?></p>
        </th></tr>
    <tr width="1050" height="647" style="background-image: url(<?=PATH?>/public/img/map/dosug_nord2.jpg);">
        <td align="center" valign="top">        
            <img src="<?=PATH?>/public/img/nord/sale2.jpg" height="25" onclick="changeSizeImage(this)">
        </td></tr>
    <tr><th> </th></tr>
    <tr><th>
            <p class="zagolovok"><?=$lang['south']?></p>
        </th></tr>
    <tr width="1050" height="702" style="background-image: url(<?=PATH?>/public/img/map/dosug_south.jpg);">
        <td align="left" valign="top">    
            <img src="<?=PATH?>/public/img/south/klub2.jpg" height="25" onclick="changeSizeImage(this)">    
            <img src="<?=PATH?>/public/img/south/kafe.jpg" height="25" onclick="changeSizeImage(this)">    
            <img src="<?=PATH?>/public/img/south/salon.jpg" height="25" onclick="changeSizeImage(this)">    
        </td></tr>
    <tr><th> </th></tr>
</table>
