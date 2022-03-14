<?php
defined('_magaz') or die;
foreach ($data as $row) {
    $stil = '';//(strtolower($page) == $row['links'])?'style="color: #83d9f4; text-decoration: underline;"':'';
    echo '<li><a '.$stil.' href="'.PATH.'/'.$row['links'].'">'.$row['page_'.LANG].'</a></li>';
}