<?php
defined('_magaz') or die;
$langCommon = \core\App::$app->getProperty('langCommon');
?>
<li><?=$langCommon[LANG]['guests']?> <?=$visitorData[0]?></li>
<li><?=$langCommon[LANG]['visitors']?> <?=$visitorData[1]?></li>