<?php defined('_magaz') or die; ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Разработка</title>
</head>
<body>
<h3>Произошла ошибка</h3>
<p><b>Код ошибки:</b> <?=$errno?></p>
<p><b>Текст ошибки:</b> <?=$errstr?></p>
<p><b>Файл, в котором произошла ошибка:</b> <?=$errfile?></p>
<p><b>Строка, в которой произошла ошибка:</b> <?=$errline?></p>
</body>
</html>