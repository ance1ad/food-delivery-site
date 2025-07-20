<?php
function GeneratePromo($length = 6){
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $promocode = "";
    for($i = 0; $i < $length; $i++){
        $promocode .= $alphabet[rand(0, strlen($alphabet)-1)];
    }
    return $promocode;
}

?>
<div class="promo">
    <div class="promo_text">
        <p class="friend_promo">
            Промокод на скидку 20% - первый заказ другу
        </p>
        <div class="promo_container">
            <div class="promo_copy">
                <p class="promocode" id="text"><?php echo GeneratePromo()?></p>
                <button class="promo_button">Скопировать</button>
            </div>
        </div>
    </div>
    <img src="img/catalog/friend.png" class="promo_img" alt="" />
</div>
