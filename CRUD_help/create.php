<?php
require_once "connect.php";

move_uploaded_file($_FILES['fileName']['tmp_name'], '..\img\catalog\\'.$_FILES['fileName']['name']);

$name = $_POST['name'];

$price = $_POST['price'];
$pPrice = $_POST['pPrice'];
if($price < 0){
    $price = -$price;
}
if($pPrice < 0){
    $pPrice = -$pPrice;
}
if($price > $pPrice){
    $tempPrice = $pPrice;
    $pPrice = $price;
    $price = $tempPrice;
}
$className = $_POST['className'];
$isLight = $_POST['isLight'];
$isNew = $_POST['isNew'];
$fileName = 'img/catalog/'.$_FILES['fileName']['name'];

mysqli_query($connect, "INSERT INTO `goods` (`id`, `name`, `price`, `pPrice`, `className`, `isLight`, `isNew`, `imagePath`) VALUES (NULL, '$name', '$price', '$pPrice', '$className', '$isLight', '$isNew', '$fileName' )");
header('Location: ../adminPage.php');