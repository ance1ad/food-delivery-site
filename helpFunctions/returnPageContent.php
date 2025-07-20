<?php
if ($page) {
    // сохраняем хтмл-контент во временный файл
    $tempFile = tempnam(sys_get_temp_dir(), 'page_');
    file_put_contents($tempFile, $page["content"]);

    // подключаем временный файл, чтобы PHP интерпретировал встроенный код
    include($tempFile);
    // удаляем
    unlink($tempFile);
} else {
    echo "Ошибка на нашей стороне, мы делаем все возможное чтобы это исправить";
}
?>
