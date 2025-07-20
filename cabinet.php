<?php
    require_once("helpFunctions/helps.php");
    if(!isset($_SESSION["user"]["id"])){
        redirect("loginPage.php");
    }
    $title = "Личный кабинет";
    require_once("header.php");
    $user = getCurrentUser(); 
 
?>
<div class="caption_other">
    <?php  if(isset($_SESSION['user']['id'])): ?>
        <p class="caption">
        <?php echo ("Добро пожаловать ".  $user['name']. " !"); ?>
        </p>
        <form action="helpFunctions/logout.php" method="post" class="formLogout">
            <button class="buy_btn">🏃 Выйти</button>
        <?php endif; ?>
        </form>
    

    <p class="caption">Тут находятся ваши заказы</p>
    <hr />
</div>


<!-- главная часть сайта -->
<div class="content">
    <div class="orders">
        <!-- товар 1 -->
        <?php 
            $pdo = getPDO();
                $user_id = $_SESSION["user"]["id"];
                $sql = "SELECT * FROM cabinetOrders";
                $stmt = $pdo->query($sql);
                while($item = $stmt->fetch()){
                    if($user_id == $item["idUser"]){
                        $product = $item["product"];
                        $date = $item["date"];
                        $address = $item["address"];
                        $imgSrc = $item["imgSrc"];
                        require("productsBasket.php");
                    }
            }?> 

    </div>
</div>
<!-- конец покупок -->

<!-- промокод другу -->
<?php
    require("promocodeGenerate.php");
?>

<!-- футер -->
<hr />
<?php
    require_once("footer.php");
?>
