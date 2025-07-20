<?php
require_once "header.php";
include_once "CRUD_help/connect.php";
require_once "modalWindow.php";


$productId = $_GET["id"];
$product = mysqli_query($connect, "SELECT * FROM goods WHERE id = '$productId'");

mysqli_query($connect, "DELETE FROM goods WHERE id = '$productId'");

?>
<div class="containerForm">
    <div class="containerDeleteSuccess">
        <h1>Товар успешно удалён!</h1>
        <p>ID удалённого товара: <strong><?php echo $productId; ?></strong></p>
        <a href="adminPage.php" class="btn">Вернуться на страницу администратора</a>
    </div>
</div>

