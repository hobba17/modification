<?php
defined('_magaz') or die;
$forum_foto_vivod = '';
foreach ($data['foto'] as $row_foto) {
    if ($row_foto['id_comment'] == $row['id_hod']) {
        $img_path = WWW.'/img_forum/' . $row_foto['images'];
        if (strlen($row_foto['images']) > 0 && file_exists($img_path)) {
            $max_width = 70;
            $max_height = 70;
            list($width, $height) = getimagesize($img_path);
            $ratiow = $max_width / $width;
            $ratioh = $max_height / $height;
            $ratio = min($ratioh, $ratiow);
            $width = intval($ratio * $width);
            $height = intval($ratio * $height);
            $forum_foto = PUB.'/img_forum/'.$row_foto['images'];
        } else {
            $forum_foto = PUB.'/img_dop/noimages80x70.png';
            $width = 70;
            $height = 60;
        }
        $forum_foto_vivod .= "<li class='forum_foto'><img class='expando' src='$forum_foto' width='$width' height='$height'></li>";
    }
}