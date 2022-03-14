<?php
defined('_magaz') or die;
if (isset($_FILES['upload_image'])) {
	if ($_FILES['upload_image']['error'] > 0) {
		switch ($_FILES['upload_image']['error']) {
			case 1: $error[] = $langCommon[LANG]['img1']; break;
			case 2: $error[] = $langCommon[LANG]['img2']; break;
			case 3: $error[] = $langCommon[LANG]['img3']; break;
			case 4: $error[] = $langCommon[LANG]['img4']; break;
			case 5: $error[] = $langCommon[LANG]['img5']; break;
			case 6: $error[] = $langCommon[LANG]['img6']; break;
			case 7: $error[] = $langCommon[LANG]['img7']; break;
			case 8: $error[] = '';
		}
	} else {
	$id = empty($_SESSION['user']['id']) ? $id_img : $_SESSION['user']['id'];
    if ($_FILES['upload_image']['type'] == 'image/jpeg' || $_FILES['upload_image']['type'] == 'image/jpg' || $_FILES['upload_image']['type'] == 'image/png') {
		$imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['upload_image']['name']));
        $uploaddir = WWW.'/img_uploads/';
        $newfilename = generStr(8)."-$id.".$imgext;
        $uploadfile = $uploaddir.$newfilename;
        if (move_uploaded_file($_FILES['upload_image']['tmp_name'], $uploadfile)) {
			if (($row = $this->findOne("SELECT `img` FROM `".PREF."users` WHERE `id` = ?", [$id])) > '') {
				$path = WWW.'/img_uploads/'.$row;
				if (file_exists($path)) unlink($path);
			}
			$this->execute("UPDATE `".PREF."users` SET `img` = '$newfilename' WHERE `id` = ?", [$id]);
			$info   = getimagesize($uploadfile);
			$width  = $info[0];
			$height = $info[1];
			$type   = $info[2];
			switch ($type) {
				case 1:
					$img = imageCreateFromGif($uploadfile);
					imageSaveAlpha($img, true);
					break;
				case 2:
					$img = imageCreateFromJpeg($uploadfile);
					break;
				case 3:
					$img = imageCreateFromPng($uploadfile);
					imageSaveAlpha($img, true);
					break;
			}
			$w = 200;
			$h = 0;
			if (empty($w)) {
				$w = ceil($h / ($height / $width));
			}
			if (empty($h)) {
				$h = ceil($w / ($width / $height));
			}
			$tmp = imageCreateTrueColor($w, $h);
			if ($type == 1 || $type == 3) {
				imagealphablending($tmp, true);
				imageSaveAlpha($tmp, true);
				$transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
				imagefill($tmp, 0, 0, $transparent);
				imagecolortransparent($tmp, $transparent);
			}
			$tw = ceil($h / ($height / $width));
			$th = ceil($w / ($width / $height));
			if ($tw < $w) {
				imageCopyResampled($tmp, $img, ceil(($w - $tw) / 2), 0, 0, 0, $tw, $h, $width, $height);
			} else {
				imageCopyResampled($tmp, $img, 0, ceil(($h - $th) / 2), 0, 0, $w, $th, $width, $height);
			}
			imagejpeg($tmp, $uploadfile);
			imagedestroy($tmp);
        } else $_SESSION['error'][] = $langCommon[LANG]['img8'];
	} else $_SESSION['error'][] = $langCommon[LANG]['img9'];
}
	$_SESSION['error'] = $error;
}
