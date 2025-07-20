<div class="catalog_item" data-category=<?php echo $dataCategory?>>
<div href="#" class="item">
    <div class="image_block">
        <a href="#" class="item_image">
            <img src=<?php echo $imgSrc?> alt="" />
        </a>
    </div>
    <div class="item_title_row">
        <a href="#" class="item_title"><?php echo $itemTitle?></a>
    </div>
    <div class="item_text">
        <p class="item_p">
            <?php echo $itemDescription?>
        </p>
    </div>
    <div class="item_footer">
        <div class="price_row">
            <!-- вывод цены и проверка на скидку -->
            <?php if($discount == true): ?>
            <p class="item_price_new">
                <?php echo $itemPriceNew?>₽
            </p>
            <p class="item_price_old">
                <?php echo $itemPriceOld?>
            </p>
            <?php endif; ?>
            <?php if($discount == false): ?>
            <p class="item_price_default">
                <?php echo $itemPriceDefault?>₽
            </p>
            <?php endif; ?>


        </div>
        <a href="#" class="buy_button""">Купить !</a>
    </div>
</div>
</div>