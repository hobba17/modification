<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	define('_magaz', 1);
	require __DIR__.'/core/DbAuxiliary.php';
	$db = new DbAuxiliary();
	if (($res = $db->query("SELECT `id`, `images` FROM `".pref."forum_images` WHERE `id_comment` = ?", [$_POST['id']])) > 0) {
		foreach ($res as $row) {
			$path = __DIR__.'/../img_forum/'.$row['images'];
			if (file_exists($path)){
				unlink($path);
			}
			$db->execute("DELETE FROM `".pref."forum_images` WHERE `id` = ?", [$row['id']]);
		}
	}
	if ($db->execute("DELETE FROM `".pref."comments` WHERE `id_hod` = ?", [$_POST['id']])){
		echo 'yes';
	}
}
