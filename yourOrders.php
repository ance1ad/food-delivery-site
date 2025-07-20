<div class="container">
    <div class="shopping_row">
        <div class="shopping_item">
            <div class="shopping_image_block">
                <img src=<?php echo $img?> alt="" class="order_image" />
            </div>
            <div class="shopping_text">
                <a href="#" class="product_title"><?php echo $itemName?></a>
                <p class="shopping_data">
                Адрес: <?php echo $addressname?>
                </p>
                <div class="shop_footer">
                    <div class="shopping_stuff">
                        <div class="price">
                            <p class="item_price_new">
                                <?php echo $itemPriceNew?>₽
                            </p>
                            <p class="item_price_old">
                            <?php echo $itemPriceOld?>₽
                            </p>
                            <div class="item_shopping">
                                <div class="items_control" data-action="minus">
                                    -
                                </div>
                                <div class="items_current" price-counter>
                                    1
                                </div>
                                <div class="items_control" data-action="plus">
                                    +
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <hr />