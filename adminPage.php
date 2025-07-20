<?php
include_once "header.php";
include_once "CRUD_help/connect.php";
require_once "modalWindow.php";
?>
<div id="text">
    <div id="textContainer">
        <H3><a href="index.php" class="linkText" >🔙 На главную</a></H3>
    </div>
</div>

<div id="catalog">
<h1>Панель администратора</h1>
</div>


<!--READ-->
<div id="catalog">
    <table>
        <tr> <th>id</th> <th>Название</th> <th>Цена</th> <th>Старая цена</th> <th>Класс</th> <th>Цветная</th> <th>Новая</th> <th>Путь к фотографии</th><th>Действие</th></tr>
            <?php
            if (!empty($connect)) {
                $goods = mysqli_query($connect, "SELECT * FROM goods");
                $goods = mysqli_fetch_all($goods);
                foreach ($goods as $good) {
                    echo '<tr>';
                    for ($i = 0; $i < 8; $i++) {
                        echo '<td>' . $good[$i] . '</td>';
                    }
                    ?>
                        <td>
                            <a href="delete.php?id=<?= $good[0] ?>" > ❌</a>

                            <a href="update.php?id=<?= $good[0] ?>">  ✏️</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
    </table>

<!--CREATE-->
    <div>
        <h1>Добавление новой записи</h1>
        <form action="CRUD_help/create.php" method="post" enctype="multipart/form-data">
            <p>Название</p>
            <textarea name="name" required></textarea>

            <p>Цена</p>
            <input type="number" name="price" required>

            <p>Старая цена</p>
            <input type="number" name="pPrice" required>

            <p>Класс</p>
            <textarea name="className" required></textarea>

            <p>Светлый</p>
            <select name="isLight" required>
                <option value='1'>Да</option>
                <option value='0'>Нет</option>
            </select>

            <p>Новинка</p>
            <select name ="isNew" required>
                <option value='1'>Да</option>
                <option value='0'>Нет</option>
            </select>

            <p>Загрузите картинку</p>
            <input type="file" name="fileName" required>
            <button type="submit" class="crud_button">Добавить</button>


        </form>
        <br> <br>  <br>  <br> <br>
    </div>

</div>
<script src="modalLogic.js"></script>

</body>
</html>