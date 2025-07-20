<?php
    include_once "CRUD_help/connect.php";
    require_once "header.php";
    require_once "modalWindow.php";

    $productId = $_GET["id"];
    $product = mysqli_query($connect, "SELECT * FROM goods WHERE id = '$productId'");
    $product = mysqli_fetch_assoc($product);  // преобразовать в массив
?>


</div>
<div id="text">
    <div id="textContainer">
        <H3><a href="adminPage.php">Вернутся</a></H3>
    </div>
</div>

<div id="catalog">
    <form action="CRUD_help/update.php" method="post" enctype="multipart/form-data">
        <h1>Редактирование записи</h1>

        <p>Название</p>
        <textarea name="name" required><?= $product['name']?></textarea>

        <p>Цена</p>
        <input type="number" name="price" value="<?= $product['price']?>" required>

        <p>Старая цена</p>
        <input type="number" name="pPrice" value="<?= $product['pPrice']?>" required>

        <p>Класс</p>
        <textarea name="className" required><?= $product['className']?></textarea>


        <!-- Тут с помощью Selected задаю выбранное значение-->
        <?php
        function renderSelect($name, $selectedValue) {
            $options = [
                ['value' => 1, 'label' => 'Да'],
                ['value' => 0, 'label' => 'Нет']
            ];

            echo "<select name='$name'>";
            foreach ($options as $option) {
                $isSelected = $option['value'] == $selectedValue ? 'selected' : '';
                echo "<option value='{$option['value']}' $isSelected>{$option['label']}</option>";
            }
            echo "</select>";
        }
        ?>

        <p>Светлый</p>
        <?php renderSelect('isLight', $product['isLight']); ?>

        <p>Новинка</p>
        <?php renderSelect('isNew', $product['isNew']); ?>


        <p style="color:red">Хотите загрузить новый файл?</p>
        <select name="choose">
            <option value='0' selected>Нет</option>
            <option value='1'>Да</option>
        </select>

        <p>Текущее изображение:</p>
        <img src="<?= $product['imagePath'] ?>" alt="Текущее изображение" style="max-width: 200px; max-height: 200px;">
        <input type="file" name="fileName">




        <input type="hidden" name="imagePath" value="<?=$product['imagePath']?>">
        <input type="hidden" name="id" value="<?=$product['id']?>">
        <button type="submit" class="crud_button">Изменить</button>

    </form>
    <br> <br>  <br>  <br> <br>
</div>
<script src="modalLogic.js"></script>
</body>
</html>


