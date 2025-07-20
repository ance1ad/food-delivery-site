<?php
include_once "CRUD_help/connect.php";
require_once "header.php";
require "sortButtons.php";
?>

<!-- ТОВАРЫ  -->
<div id="catalog">
    <?php
    if (!empty($connect)) {
        $goods = mysqli_query($connect, "SELECT * FROM goods");
        $goods = mysqli_fetch_all($goods);
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

    require 'footer.php';
    ?>


