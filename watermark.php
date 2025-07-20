<?php
require_once 'ImageProcessor.php';
$title = "Наложение фото";
require_once("header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && isset($_FILES['watermark'])) {
        $imageFile = $_FILES['image'];
        $watermarkFile = $_FILES['watermark'];

        if ($imageFile['error'] === UPLOAD_ERR_OK && $watermarkFile['error'] === UPLOAD_ERR_OK) {
            $imageProcessor = new ImageProcessor($imageFile, $watermarkFile);
            $imageProcessor->processImage();

            $outputPath = $imageProcessor->getOutputPath();

            // перенаправление на стр с результатом
            header('Location: watermarkPage.php?outputPath=' . urlencode($outputPath));
            exit;
        } else {
            echo '<p>Ошибка загрузки файлов.</p>';
        }
    } else {
        echo '<p>Файлы не были загружены.</p>';
    }
} else {
    echo '<p>Некорректный метод запроса.</p>';
}
?>