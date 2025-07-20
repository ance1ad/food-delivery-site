<?php
    require_once("helpFunctions/helps.php");
    if(!isset($_SESSION["user"]["id"])){
        redirect("loginPage.php");
    }
    $title = "Корзина";
    require("formValidate.php");
    error_reporting(E_ALL);
    require_once("header.php");
?>
        <div class="main_title">
            <p class="caption_other">🛒Корзина</p>
            <hr />
        </div>
        <!-- главная часть сайта -->
        <div class="content">
            <div class="shopping">
                <!--тут логика вывода данных из таблицы по айдишнику пользователя в сессии-->
                <?php
                    $pdo = getPDO();
                    $user_id = $_SESSION["user"]["id"];
                    $sql = "SELECT * FROM shoppingBasket";
                    $stmt = $pdo->query($sql);
                    while($item = $stmt->fetch()){
                        if($user_id == $item["userId"]){
                            $itemName = $item["itemName"];
                            $addressname = $item["addressname"];
                            if($item["discount"] == 0){
                                $itemPriceNew = $item["itemPriceDefault"];
                            } else{
                                $itemPriceNew = $item["itemPriceNew"];
                            }
                            $itemPriceOld = $item["itemPriceOld"];
                            $img = $item["img"];
                            require("yourOrders.php");
                        }
                    }?>
                <div class="payment_container">
                    <div class="payment_stuff">
                        <p class="product_title">
                            Сумма заказа
                        </p>
                        <p class="product_title result_payment" sum_price>
                            0₽
                        </p>
                    </div>
                    <div class="payment_for_goods"></div>
                    <!-- промокод -->
                    <div class="promo_input">
                        <input class="input_promo_text" type="text" placeholder="Промокод" />
                        <a href="#" class="buy_button payment_btn" id="buy_btn">Оплатить</a>
                    </div>
                    <div class=" review review_display" id="review_sms">
                        <p class="review_text">Отзыв можно оставить в <a href="cabinet.php">Личном
                                кабинете 🙋</a></p>
                    </div>
                </div>
            </div>
            <hr>
        <!-- Обработка -->
        <div class="caption_other">
        <p class="caption">Ваши данные</p>
        </div>
        <div class="user_data">
            <form action="" class="form" id="add_form" method="POST">
                <div class="input_form">
                    <input type="text" id="name" name="name" placeholder="Как вас зовут" class="<?php echo isset($errors['name']) ? 'error' : ''; ?>" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : htmlspecialchars($name); ?>"><br />
                    <?php if(isset($errors['name'])) echo '<span class="error-message">'.$errors['name'].'</span>'; ?>
                </div>
                <div class="input_form">
                    <input type="text" id="phone" name="phone" placeholder="Телефон" class="<?php echo isset($errors['phone']) ? 'error' : ''; ?>" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : htmlspecialchars($phone); ?>"><br />
                    <?php if(isset($errors['phone'])) echo '<span class="error-message">'.$errors['phone'].'</span>'; ?>
                </div>
                <div class="input_form">
                    <input type="text" id="address" name="address" placeholder="Адрес" class="<?php echo isset($errors['address']) ? 'error' : ''; ?>" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : htmlspecialchars($address); ?>"><br />
                    <?php if(isset($errors['address'])) echo '<span class="error-message">'.$errors['address'].'</span>'; ?>
                </div>
                <div class="input_form">
                    <input type="text" id="email" name="email" placeholder="Почта" class="<?php echo isset($errors['email']) ? 'error' : ''; ?>" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : htmlspecialchars($email); ?>"><br />
                    <?php if(isset($errors['email'])) echo '<span class="error-message">'.$errors['email'].'</span>'; ?>
                </div>
                <div class="input_form">
                    <select id="payment_method" name="payment_method" required="">
                        <option value="online">Онлайн оплата</option>
                        <option value="cash">Наличные при получении</option>
                    </select><br />
                </div>
                <div class="btn_design">
                    <button type="submit" class="btn_send">Сохранить</button>
                </div>
            </form>
        </div>
        
        </div>
        <!-- футер -->
        <hr />
        <?php
            require_once("footer.php");
        ?>
    