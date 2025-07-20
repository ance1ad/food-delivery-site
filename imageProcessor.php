<?php
require_once("helpFunctions/helps.php");
class ImageProcessor {
    private $imagePath;
    private $watermarkPath;
    private $outputPath;

    public function __construct($imageFile, $watermarkFile) {
        $this->imagePath = 'uploads/' . basename($imageFile['name']);
        $this->watermarkPath = 'uploads/' . basename($watermarkFile['name']);
        move_uploaded_file($imageFile['tmp_name'], $this->imagePath);
        move_uploaded_file($watermarkFile['tmp_name'], $this->watermarkPath);
        // загрузка в бд
        setImg($this->imagePath);
        setImg($this->watermarkPath);
    }

    public function processImage() {
        $image = imagecreatefromstring(file_get_contents($this->imagePath));
        $watermark = imagecreatefromstring(file_get_contents($this->watermarkPath));

        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);
        $watermarkWidth = imagesx($watermark);
        $watermarkHeight = imagesy($watermark);

        $x = (int) (($imageWidth - $watermarkWidth) / 2);
        $y = (int) (($imageHeight - $watermarkHeight) / 2);

        imagecopy($image, $watermark, $x, $y, 0, 0, $watermarkWidth, $watermarkHeight);

        $this->outputPath = 'uploads/watermarked_' . basename($_FILES['image']['name']);
        imagejpeg($image, $this->outputPath);

        imagedestroy($image);
        imagedestroy($watermark);
    }

    public function getOutputPath() {
        return $this->outputPath;
    }
}