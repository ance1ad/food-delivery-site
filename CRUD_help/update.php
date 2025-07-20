<?php
require_once "connect.php";

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
$id = $_POST['id'];


// хочет поменять фото
if($_POST['choose'] == "1"){
    $fileName = 'img/catalog/'.$_FILES['fileName']['name'];
    move_uploaded_file($_FILES['fileName']['tmp_name'], '..\img\catalog\\'.$_FILES['fileName']['name']);
}
else{
    $fileName = $_POST['imagePath'];
}

$query = "UPDATE `goods` SET 
                   `name` = '$name', 
                   `price` = '$price',
                   `pPrice` = '$pPrice',
                   `className` = '$className',
                   `isLight` = '$isLight',
                   `isNew` = '$isNew',
                   `imagePath` = '$fileName' 
               WHERE `goods`.`id` = '$id'";


mysqli_query($connect, $query);
header('Location: ../adminPage.php?success=true');
