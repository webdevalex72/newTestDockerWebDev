<?php
//phpinfo();
//phpinfo();

$link = mysqli_connect('mysql', 'root', 'root');
if (!$link) {
    die('Ошибка соединения: ' . mysqli_error($link));
}
echo 'Успешно соединились';
mysqli_close($link);

