<?php
// тут вся логика сортировки данных
require_once "header.php";
include_once "CRUD_help/connect.php";
require "sortButtons.php";

$sortQuery = "";


// Сортировка на кнопке сортировать
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sort'])) {
    $sort = $_POST['sort'];

    switch ($sort) {
        case 'popular':
            $sortQuery = "WHERE isLight = 1"; // Популярное
            break;
        case 'new':
            $sortQuery = "WHERE isNew = 1"; // Новинки
            break;
        case 'cheap':
            $sortQuery = "ORDER BY price ASC"; // Сначала дешевле
            break;
        case 'expensive':
            $sortQuery = "ORDER BY price DESC"; // Сначала дороже
            break;
    }
}

// Получение товаров с учетом сортировки
$query = "SELECT * FROM goods $sortQuery";
$goods = mysqli_query($connect, $query);
$goods = mysqli_fetch_all($goods);


// Верхняя сортировка
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];

    // SQL запрос в зависимости от типа сортировки
    switch ($sort) {
        case 'discount':
            $query = "SELECT * FROM goods WHERE isNew = 1";
            break;

        case 'wood':
            $query = "SELECT * FROM goods";
            break;

        case 'light':
            $query = "SELECT * FROM goods WHERE isLight = 1";
            break;
    }

    $result = mysqli_query($connect, $query);
    $goods = mysqli_fetch_all($result);
}



// Отображение сортировки
?>

<div id="catalog">
    <?php
    if (!empty($connect)) {
        foreach ($goods as $good) {
            ?>
            <div class="catalogItem">

                <!--Вывод значков новинок-->
                <?php if($good[6]==1 ) {?>
                    <div class="imageContainer">
                        <div class="icons">
                            <img class="discountImg" src="img/discount.png">
                            <img class="newImg" src="img/new.png">
                        </div>
                    </div>
                <?php } ?>
                <img class="catalogImg" src="<?=$good[7]?>">
                <div class="catalogInfo">
                    <div class="catalogItemCircles">
                        <div></div>
                        <div></div>
                    </div>
                    <p><?=$good[1]?></p>
                    <p><?=$good[4]?></p>
                    <p><?=$good[2]?>
                        <del style="color:rgba(0, 0, 0, 0.3);">  <?php if($good[6]==1) echo $good[3]?>  </del> ₽ / м²
                    </p>
                    <button class="buy-button">Купить</button>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>



<?php
require 'footer.php';
