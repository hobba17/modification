<?php
defined('_magaz') or die;
$lang = \core\App::$app->getProperty('lang');
?>
<table width="1050">
    <tr width="1050" height="500" style="background-image: url(<?=PATH?>/public/img/pieces/bus.jpg);">
        <th valign="top">
            <p style="text-indent: 20px; color: white; margin: 20 10 0 10px; text-align: left;"><?=$lang['text']?></p>
            <p>
                <a class="way" href="#" onClick="window.open('<?=PATH?>/public/img/map/444.jpg', 'newWin', 'Toolbar=0, Location=0, Directories=0, Status=0, Menubar=0, Scrollbars=0, Resizable=0, Copyhistory=1, Width=1280, Height=333')"><?=$lang['bus']?> № <span>444</span> (<?=$lang['mos_sk']?>)</a>      
                <a class="way" href="#" onClick="window.open('<?=PATH?>/public/img/map/3222.jpg', 'newWin', 'Toolbar=0, Location=0, Directories=0, Status=0, Menubar=0, Scrollbars=0, Resizable=0, Copyhistory=1, Width=1280, Height=333')"><?=$lang['bus']?> № <span>322</span> (<?=$lang['mos_nog']?>)</a>
            </p>
            <p>
                <a class="way" href="#" onClick="window.open('<?=PATH?>/public/img/map/866.jpg', 'newWin', 'Toolbar=0, Location=0, Directories=0, Status=0, Menubar=0, Scrollbars=0, Resizable=0, Copyhistory=1, Width=1280, Height=415')"><?=$lang['minibus']?> № <span>886</span> (<?=$lang['mos_lp']?>)</a>      
                <a class="way" href="#" onClick="window.open('<?=PATH?>/public/img/map/elektro.jpg', 'newWin', 'Toolbar=0, Location=0, Directories=0, Status=0, Menubar=0, Scrollbars=0, Resizable=0, Copyhistory=1, Width=1280, Height=415')"><?=$lang['minibus']?> № <span>1250к</span> (<?=$lang['mos_nb']?>)</a>
            </p>
            <p>
                <a class="way" href="#" onClick="window.open('<?=PATH?>/public/img/map/monino.jpg', 'newWin', 'Toolbar=0, Location=0, Directories=0, Status=0, Menubar=0, Scrollbars=0, Resizable=0, Copyhistory=1, Width=1280, Height=415')"><?=$lang['minibus']?> № <span>587</span> (<?=$lang['mos_mon']?>)</a>      
                <a class="way" href="#" onClick="window.open('<?=PATH?>/public/img/map/588.jpg', 'newWin', 'Toolbar=0, Location=0, Directories=0, Status=0, Menubar=0, Scrollbars=0, Resizable=0, Copyhistory=1, Width=1280, Height=415')"><?=$lang['minibus']?> № <span>588</span> (<?=$lang['mos_elek']?>)</a>
            </p>
        </th></tr>
</table>
