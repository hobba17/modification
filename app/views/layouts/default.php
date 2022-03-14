<?php
defined('_magaz') or die;
$lang = \core\App::$app->getProperty('lang');
$langCommon = \core\App::$app->getProperty('langCommon');
?>
<!doctype html>
<html lang="<?=LANG?>">
<head>
    <title><?=$lang['title']?></title>
    <meta charset="UTF-8">
    <meta name="description" content="<?=$lang['descr']?>">
    <meta name="keywords" content="<?=$lang['keyw']?>">
    <link href="<?=PUB?>/css/reset.css" rel="stylesheet" type="text/css">
    <link href="<?=PUB?>/css/styleforum.css" rel="stylesheet" type="text/css">
    <link href="<?=PUB?>/js/jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css">
    <script src="<?=PUB?>/js/jquery-1.8.2.min.js"></script>
    <script src="<?=PUB?>/js/main.js"></script>
    <script src="<?=PUB?>/js/script_forum.js"></script>
    <script src="<?=PUB?>/js/image_increase.js"></script>
    <script src="<?=PUB?>/js/jquery_confirm/jquery_confirm.js"></script>
    <script src="<?=PUB?>/js/fotki.js"></script>
</head>
<body>
<div id="block-body">
    <div id='block-header' data-url="<?=PATH?>">
        <p id='title-lang'><a class='langs'>Language</a>
            <div id="okno-lang">
        <p id="russ" ang="ru"><a>Русский</a>
        <p id="engl" ang="en"><a>English</a>
    </div>
    <ul id='guest'>
        <?php
            new \app\widgets\visitor\Visitor();
        ?>
    </ul>
    <div id='block-authoriz'>
        <?php
            new \app\widgets\panel\Panel();
        ?>
        <div id='okno-authoriz'>
            <div class='corner'></div>
            <form method='post'>
                <ul id='authoriz-input'>
                    <p id='vhod'><?=$langCommon[LANG]['ent']?></p>
                    <p id='no-login'><?=$langCommon[LANG]['no_enter']?></p>
                    <p id='ban'><?=$langCommon[LANG]['ban']?></p>
                    <li><input type='text' id='auth_login' placeholder='<?=$langCommon[LANG]['log_or']?> E-mail' class='input-login'></li>
                    <li><input type='password' id='auth_pass' placeholder='<?=$langCommon[LANG]['pass']?>' class='input-pass'></li>
                    <p id='forget-pass'><a><?=$langCommon[LANG]['forg_pass']?></a></p>
                    <p id='authoriz-vhod'><a><?=$langCommon[LANG]['done']?></a></p>
                    <p class='authoriz-load'><img src='<?=PUB?>/img_dop/loading.gif'></p>
                </ul>
            </form>
            <div id='block-remind'>
                <p id='vostanovl'><?=$langCommon[LANG]['recov']?><br><?=$langCommon[LANG]['recov2']?></p>
                <p id='message-remind' class='message-remind-success'><?=$langCommon[LANG]['rem_suc']?></p>
                <input type='text' id='remind-email' placeholder='<?=$langCommon[LANG]['your']?> E-mail'>
                <p id='button-remind'><a><?=$langCommon[LANG]['done']?></a></p>
                <p class='authoriz-load'><img src='<?=PUB?>/img_dop/loading.gif'></p>
                <p id='prev-auth'><?=$langCommon[LANG]['back']?></p>
            </div>
        </div>
        <div id='okno-vihod'>
            <div class='corner2'></div>
            <ul id='authoriz-vihod'>
                <li><img src='<?=PUB?>/img_dop/user_info.png'><a href='<?=PATH?>/profile'><?=$langCommon[LANG]['user_profile']?></a></li>
                <li><img src='<?=PUB?>/img_dop/logout.png'><a id='logout'><?=$langCommon[LANG]['log_out']?></a></li>
            </ul>
        </div>
    </div>
</div>
<div id='block-content'>
<?=$content?>
<?php
$ff = new \app\models\AppModel;
/*echo '<br>Количество запросов: '.$ff::$countSql;
dump($ff::$queries);*/
?>
</div>
<div id="levo">
    <ul class="spisok">
        <?php
        new \app\widgets\menu\Menu;
        if(isset($_SESSION['user']['name']) && $_SESSION['user']['name'] == 'Admin') {
            echo '<li><a href="'.PATH.'/admin">Админ</a></li>';
        }
        ?>
    </ul>
</div>
</div>
<div id="toTop"><img src='<?=PUB?>/img/vverx.jpg'></div>
</body>
</html>