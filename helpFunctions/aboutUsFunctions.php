<?php
// Проверка корректности пути
    function isValidPath($path) {
        return strpos($path, '..') === false && file_exists($path) && is_readable($path) && (substr($path, 0, 2) === './' || substr($path, 0, 1) === '/');
    }

    // Получение размера файла
    function getFileSize($path) {
        return filesize($path);
    }

    // Получения размера директории
    function getDirectorySize($path) {
        $size = 0;
        $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($dir as $file) {
            $size += $file->getSize();
        }
        return $size;
    }

    // Основная логика
    if (isset($_GET['path'])) {
        $path = $_GET['path'];

        if (isValidPath($path)) {
            if (is_file($path)) {
                $size = getFileSize($path);
                echo "<label style='color: black'> Размер файла $path составляет " . $size . " байт. </label>";
            } else {
                $size = getDirectorySize($path);
                echo "<label style='color: black'> Размер папки $path составляет " . $size . " байт. </label>";
            }
        } else {
            echo "<label style='color: black'> К сожалению, указанный путь недоступен. </label>";
        }
    }
    if(!isset($_SESSION["user"]["id"])){
        redirect("loginPage.php");
    }
?>