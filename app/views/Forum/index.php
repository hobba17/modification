<?php
defined('_magaz') or die;
$lang = \core\App::$app->getProperty('lang');
$langCommon = \core\App::$app->getProperty('langCommon');
if(!empty($data['forum'])) {
    foreach ($data['forum'] as $row) {
        include WWW.'/includes/photo_processing.php';
        if ($row['moderat'] == '0') {
            ?>
            <div class="forum">
                <div class="forum_verx">
                    <ul class="ul1">
                        <li class="name"><?=$row['name']?></li>
                        <li class="date_comment"><?=$row['date_comment']?></li>
                    </ul>
                </div>
                <div class="forum_niz_verific">
                    <ul class="ul2">
                        <li class="images"><img src="<?=$user_foto?>" width="<?=$width?>" height="<?=$height?>"></li>
                        <li class="comment_verific"><?=$langCommon[LANG]['prover']?></li>
                    </ul>
                </div>
                <p class="polosa"></p>
            </div>
            <?php
        } else {
            ?>
            <div class="forum">
                <div class="forum_verx">
                    <ul class="ul1">
                        <li class="name"><?=$row['name']?></li>
                        <li class="date_comment"><?=$row['date_comment']?></li>
                        <?php
                        if (isset($_SESSION['user']['auth']) && $_SESSION['user']['auth'] == 'budet' && $_SESSION['user']['id'] == $row['id_comment']) {
                            echo '<li class="delete_comment" id="'.$row['id_hod'].'">'.$langCommon[LANG]['del_com'].' <img src="'.PUB.'/img_dop/folder_delete.png"></li>';
                        } else {
                            echo '';
                        }
                        ?>
                    </ul>
                </div>
                <div class="forum_niz">
                    <p>
                        <img src="<?=$user_foto?>" width="<?=$width?>" height="<?=$height?>">
                        <span><?=$row['comment']?></span>
                    <ul class="ul2">
                        <?php
                        if (empty($data['foto'])) {
                            echo '';
                        } else {
                            include WWW.'/includes/photo_processing_user.php';
                            echo $forum_foto_vivod;
                        }
                        ?>
                    </ul>
                </div>
                <p class="polosa"></p>
            </div>
            <?php
        }
    }
    if (isset($_SESSION['user']['auth']) && $_SESSION['user']['auth'] == 'budet') {
        ?>
        <form enctype='multipart/form-data' method='post'>
            <div id='new_comment'>
                <textarea name='comment' cols='70' rows='4' placeholder='<?=$lang['writ_mes']?>' required></textarea>
            </div>
            <p class='stylelabel'><img src='<?=PUB?>/img_dop/photo.jpg'></p>
            <div id='hiden_form_foto'>
                <div id='objects'>
                    <div id='addimages' class='addimage'>
                        <input type='hidden' name='MAX_FILE_SIZE' value='2000000'>
                        <input type='file' name='galleryimg[]'>
                    </div>
                </div>
                <p id='add-input'><?=$lang['addit']?></p><br>
            </div>
            <?=varError()?>
            <input type='submit' id='submit-form' value='<?=$lang['make_com']?>'>
            <input type='hidden' name='id' value='<?=$_SESSION['user']['id']?>'>
        </form>
    <?php } else { ?>
        <div id='new_comment'>
            <br>
            <p><b style='margin-left: 60px;'><?=$lang['zamet']?></b></p>
            <br><br>
        </div>
    <?php
    }
    //pstrNav($page, $total);
}
