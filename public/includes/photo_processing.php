<?php
defined('_magaz') or die;
$img_path = WWW.'/img_uploads/'.$row['img'];
if (strlen($row['img']) > 0 && file_exists($img_path)) {
			$max_width = 90;
			$max_height = 90;
			list($width, $height) = getimagesize($img_path);
			$ratiow = $max_width/$width;
			$ratioh = $max_height/$height;
			$ratio = min($ratioh, $ratiow);
			$width = intval($ratio*$width);
			$height = intval($ratio*$height);
			$user_foto = PUB.'/img_uploads/'.$row['img'];
		} else {
			$user_foto = PUB.'/img_dop/noimages80x70.png';
			$width = 80;
			$height = 70;
		}
