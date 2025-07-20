-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Июн 26 2024 г., 21:17
-- Версия сервера: 5.6.51
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `FoodDeliveryDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cabinetOrders`
--

CREATE TABLE `cabinetOrders` (
  `id` int(11) UNSIGNED NOT NULL,
  `product` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `imgSrc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idUser` int(11) UNSIGNED NOT NULL COMMENT 'id покупателя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cabinetOrders`
--

INSERT INTO `cabinetOrders` (`id`, `product`, `date`, `address`, `imgSrc`, `idUser`) VALUES
(1, 'Суши \"Мафия\"', '8 марта 2024 года', 'Белгород ул.Есенина 31д.', 'img/catalog/sushi.png', 11),
(3, 'Пицца \"Пеперонни\"', '31 февраля 2024 года', 'Белгород ул.Южная 802д.', 'img/catalog/peperonni.png', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'категория товара',
  `imgSrc` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'путь к изображению',
  `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'название',
  `description` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'описание',
  `discount` tinyint(1) NOT NULL COMMENT 'есть ли скидка',
  `priceNew` int(11) DEFAULT NULL COMMENT 'цена со скидкой',
  `priceOld` int(11) DEFAULT NULL COMMENT 'старая цена',
  `priceDefault` int(11) DEFAULT NULL COMMENT 'обычная цена'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `category`, `imgSrc`, `title`, `description`, `discount`, `priceNew`, `priceOld`, `priceDefault`) VALUES
(31, 'sporpit', 'img/catalog/salad.png', 'Салат', 'Мясо и овощи - прекрасное сочетание для полноценного приема пищи. Сочные помидоры и кусочки печёного болгарского перца придают салату сочный вкус', 1, 200, 230, 0),
(32, 'fast', 'img/catalog/shawa1.png', 'Шаурма', 'Шаурма́ или шаве́рма — ближневосточное блюдо из мяса (курица, ягнятина, баранина, реже — свинина), обжаренного на вертеле, завёрнутого в лаваш или питу, с добавлением капусты, свежего огурца, репчатого лука, чесночного соуса и, по желанию, специй.', 1, 200, 230, 0),
(33, 'fast', 'img/catalog/pizza.png', 'Пицца', 'Пи́цца — традиционное итальянское блюдо, изначально в виде круглой дрожжевой лепёшки, выпекаемой с уложенной сверху вкусной начинкой.', 1, 290, 370, 0),
(34, 'sushi', 'img/catalog/sushi.png', 'Суши \"Мафия\"', 'Су́ши, или су́си, — блюдо традиционной японской кухни, приготовленное из риса с уксусной приправой и различных морепродуктов, а также других ингредиентов.', 0, 0, 0, 380),
(35, 'products', 'img/catalog/specii.png', 'Пряности', 'Различные части растений, обладающие специфическим, в той или иной мере устойчивым ароматом и вкусом, традиционно добавляемые в пищу в малых дозах', 0, 0, 0, 200),
(36, 'hot', 'img/catalog/sashlik.png', 'Шашлык из Курицы', 'Шашлы́к — изначально блюдо стран Западной и Центральной Азии, а также Восточной Европы, из баранины мелкой нарезки, нанизанное на шампур и запечённое на древесном угле в мангале. Очень хочется', 1, 189, 240, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `pageTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `pageTitle`, `name`, `content`) VALUES
(1, 'Главная страница', 'Каталог товаров', '<div class=\"main_title\">\r\n    <p class=\"caption_main\">Каталог товаров</p>\r\n    <hr />\r\n</div>\r\n<!-- главная часть сайта -->\r\n<div class=\"content\">\r\n    <!-- каталог товаров -->\r\n    <div class=\"catalog\">\r\n        <div class=\"container\">\r\n            <!-- весь флекс контейнер -->\r\n            <div class=\"catalog_row\">\r\n                <!-- каждый флекс элемент -->\r\n                <div class=\"catalog_column\">\r\n                    <!-- внутренности элемента -->\r\n                    <?php\r\n                        $items = array(\r\n                            array(\r\n                                \"category\" => \"sporpit\",\r\n                                \"imgSrc\" => \"img/catalog/salad.png\",\r\n                                \"title\" => \"Салат\",\r\n                                \"description\" => \"Мясо и овощи - прекрасное сочетание для полноценного приема пищи. Сочные помидоры и кусочки печёного болгарского перца придают салату сочный вкус\",\r\n                                \"discount\" => true,\r\n                                \"priceNew\" => 200,\r\n                                \"priceOld\" => 230\r\n                            ),\r\n                            array(\r\n                                \"category\" => \"fast\",\r\n                                \"imgSrc\" => \"img/catalog/shawa1.png\",\r\n                                \"title\" => \"Шаурма\",\r\n                                \"description\" => \"Шаурма или шаве́рма — ближневосточное блюдо из мяса (курица, ягнятина, баранина, реже — свинина), обжаренного на вертеле, завёрнутого в лаваш или питу, с добавлением капусты, свежего огурца, репчатого лука, чесночного соуса и, по желанию, специй. Очень хочется попробовать\",\r\n                                \"discount\" => true,\r\n                                \"priceNew\" => 200,\r\n                                \"priceOld\" => 260\r\n                            ),\r\n                            array(\r\n                                \"category\" => \"fast\",\r\n                                \"imgSrc\" => \"img/catalog/pizza.png\",\r\n                                \"title\" => \"Пицца\",\r\n                                \"description\" => \"Пи́цца — традиционное итальянское блюдо, изначально в виде круглой дрожжевой лепёшки, выпекаемой с уложенной сверху вкусной начинкой.\",\r\n                                \"discount\" => true,\r\n                                \"priceNew\" => 290,\r\n                                \"priceOld\" => 370\r\n                            ),\r\n                            array(\r\n                                \"category\" => \"sushi\",\r\n                                \"imgSrc\" => \"img/catalog/sushi.png\",\r\n                                \"title\" => \"Суши \\\"Мафия\\\"\",\r\n                                \"description\" => \"Су́ши, или су́си, — блюдо традиционной японской кухни, приготовленное из риса с уксусной приправой и различных морепродуктов, а также других ингредиентов.\",\r\n                                \"discount\" => false,\r\n                                \"priceDefault\" => 380\r\n                            ),\r\n                            array(\r\n                                \"category\" => \"products\",\r\n                                \"imgSrc\" => \"img/catalog/specii.png\",\r\n                                \"title\" => \"Пряности\",\r\n                                \"description\" => \"Различные части растений, обладающие специфическим, в той или иной мере устойчивым ароматом и вкусом, традиционно добавляемые в пищу в малых дозах\",\r\n                                \"discount\" => false,\r\n                                \"priceDefault\" => 200\r\n                            ),\r\n                            array(\r\n                                \"category\" => \"hot\",\r\n                                \"imgSrc\" => \"img/catalog/sashlik.png\",\r\n                                \"title\" => \"Шашлык из Курицы\",\r\n                                \"description\" => \"Шашлы́к — изначально блюдо стран Западной и Центральной Азии, а также Восточной Европы, из баранины мелкой нарезки, нанизанное на шампур и запечённое на древесном угле в мангале.\",\r\n                                \"discount\" => true,\r\n                                \"priceNew\" => 189,\r\n                                \"priceOld\" => 240\r\n                            )\r\n                        );\r\n\r\n                        foreach ($items as $item) {\r\n                            $dataCategory = $item[\"category\"];\r\n                            $imgSrc = $item[\"imgSrc\"];\r\n                            $itemTitle = $item[\"title\"];\r\n                            $itemDescription = $item[\"description\"];\r\n                            $discount = $item[\"discount\"];\r\n                            if ($discount) {\r\n                                $itemPriceNew = $item[\"priceNew\"];\r\n                                $itemPriceOld = $item[\"priceOld\"];\r\n                            } else {\r\n                                $itemPriceDefault = $item[\"priceDefault\"];\r\n                            }\r\n                            require(\"productData.php\");\r\n                        }\r\n                    ?>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>'),
(2, 'Вход', 'Вход', '<div class=\"register_container\">\r\n<form action=\"loginCheck.php\" method=\"post\">\r\n    <div class=\"container\">\r\n        <p class=\"caption_main register_caption\">Вход</p>\r\n\r\n        <label for=\"email\"><p class=\"fieldName\">Почта</p></label>\r\n        <input \r\n            type=\"text\" \r\n            placeholder=\"Введите почту\" \r\n            name=\"email\" \r\n            id=\"email\" \r\n            value=\"<?php echo getOldValues(\'email\')?>\"\r\n            required>\r\n            <?php if ($_SESSION[\'login\'][\'email\']): ?>\r\n                <span class=\"error_register\"><?php echo getMessage(\'email\')?></span>\r\n            <?php endif; ?>\r\n        <label for=\"password\"><p class=\"fieldName\">Пароль</p></label>\r\n        <input \r\n            type=\"password\" \r\n            placeholder=\"*********\" \r\n            name=\"password\" \r\n            id=\"password\" \r\n            required>\r\n            <?php if ($_SESSION[\'login\'][\'password\']): ?>\r\n                <span class=\"error_register\"><?php echo getMessage(\'password\')?></span>\r\n            <?php endif; ?>\r\n        <button type=\"submit\" class=\"registerbtn\">Войти</button>\r\n    </div>\r\n\r\n    <div class=\"container signin\">\r\n        <p>Впервые на портале? <a href=\"registrationPage.php\">Зарегистрируйтесь</a>.</p>\r\n    </div>\r\n</form>\r\n</div>'),
(3, 'Регистрация', 'Регистрация', '<div class=\"register_container\">\r\n    <form action=\"registerCheck.php\" method=\"post\">\r\n        <div class=\"container\">\r\n            <p class=\"caption_main register_caption\">Регистрация</p>\r\n\r\n            <label for=\"name\"><p class=\"fieldName\">Имя</p></label>\r\n            <input \r\n                type=\"text\" \r\n                placeholder=\"Иванов Иван\" \r\n                name=\"name\" \r\n                id=\"name\"\r\n                value=\"<?php echo getOldValues(\'name\')?>\"\r\n            >\r\n            <?php if ($_SESSION[\'validation\'][\'name\']): ?>\r\n                <span class=\"error_register\"><?php validationErrorMessage(\'name\')?></span>\r\n            <?php endif; ?>\r\n            <label for=\"email\"><p class=\"fieldName\">Почта</p></label>\r\n            <input \r\n                type=\"text\" \r\n                placeholder=\"ivanov_ivan@mail.ru\" \r\n                name=\"email\" \r\n                id=\"email\"\r\n                value=\"<?php echo getOldValues(\'email\')?>\"\r\n\r\n            >\r\n            <?php if ($_SESSION[\'validation\'][\'email\']): ?>\r\n                <span class=\"error_register\"><?php validationErrorMessage(\'email\')?></span>\r\n            <?php endif; ?>\r\n            <label for=\"password\"><p class=\"fieldName\">Пароль</p></label>\r\n            <input \r\n                type=\"password\" \r\n                placeholder=\"*********\" \r\n                name=\"password\" \r\n                id=\"password\"\r\n\r\n            >\r\n            <?php if ($_SESSION[\'validation\'][\'password\']): ?>\r\n                <span class=\"error_register\"><?php validationErrorMessage(\'password\')?></span>\r\n            <?php endif; ?>\r\n            <label for=\"passwordRepeat\"><p class=\"fieldName\">Повтор пароля</p></label>\r\n            <input \r\n                type=\"password\" \r\n                placeholder=\"*********\" \r\n                name=\"passwordRepeat\" \r\n                id=\"password-repeat\"\r\n            >\r\n            <?php if ($_SESSION[\'validation\'][\'passwordRepeat\']): ?>\r\n                <span class=\"error_register\"><?php validationErrorMessage(\'passwordRepeat\')?></span>\r\n            <?php endif; ?>\r\n            <button type=\"submit\" id=\"submit\" class=\"registerbtn\">Регистрация</button>\r\n        </div>\r\n\r\n        <div class=\"container signin\">\r\n            <p>У меня уже есть <a href=\"loginPage.php\">аккаунт<a/>.</p>\r\n        </div>\r\n    </form>\r\n</div>'),
(4, 'Фото с водянным знаком', 'Фото с водянным знаком', '<div class=\"photo_page\">\r\n        <div class=\"item\">\r\n        <img src=\"<?php echo $outputPath ?>\" alt=\"Изображение с водяным знаком\" width=\"50%\">\r\n                <p class = \"item_title\">Вы можете скачать изображение по следующей ссылке:</p>\r\n                <p><a class = \"shop_name\" href=\"<?php echo $outputPath ?>\">Скачать изображение</a></p>\r\n                <p class = \"item_title\">Или вернуться назад:</p>\r\n                <a class = \"shop_name\" href=\"about.php\" class=\"shop_name\">ВЕРНУТЬСЯ</a>\r\n            </div>\r\n    </div>'),
(5, 'О нас', 'О нас', '<div class=\"container\">\r\n    <div class=\"form_content\">\r\n        <div class=\"form-container\">\r\n            <form action=\"about.php\" method=\"get\">\r\n            <p class=\"item_title\">Введите путь к файлу или папке для подсчета размера</p>\r\n\r\n            <input type=\"text\" id=\"path\" name=\"path\">\r\n            <input class=\"button\" type=\"submit\" value=\"Посчитать размер\" style=\"display: block; margin: 0 auto; padding: 8px 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;\">\r\n            </form>\r\n\r\n            <?php\r\n                require_once(\"helpFunctions/aboutUsFunctions.php\");\r\n            ?>\r\n        </div>\r\n    </div>\r\n    <div class=\"form_content\">\r\n        <div class=\"form-container\">\r\n            <form action=\"watermark.php\" method=\"post\" enctype=\"multipart/form-data\">\r\n                <p class=\"item_title\">Выберите путь к изображению и путь к вотермарке</p>\r\n                <label for=\"image\">Выберите изображение:</label>\r\n                <input type=\"file\" name=\"image\" id=\"image\" required>\r\n                <label for=\"watermark\">Выберите изображение с вотермаркой:</label>\r\n                <input type=\"file\" name=\"watermark\" id=\"watermark\" required>\r\n                <input type=\"submit\" value=\"Загрузить и наложить водяной знак\">\r\n            </form>\r\n        </div>\r\n    </div>\r\n</div>\r\n</div>'),
(6, 'Админка', 'Панель администратора', '<div class=\"main_title\">\r\n    <p class=\"caption_main\">🙋 Панель администратора</p>\r\n    <hr />\r\n</div>\r\n<div class=\"content\">\r\n    <div class=\"catalog\">\r\n        <div class=\"containerpage\">\r\n            <div class=\"catalog_row\">\r\n                <div class=\"catalog_options\">\r\n                    <p class=\"caption_main\">Управление страницами</p>\r\n        \r\n                        <div class=\"form-container\">\r\n                        <form method=\"get\" action=\"adminPage.php\" class=\"form-group\">\r\n                            <label for=\"page_id\" class=\"form-label\">Выберите страницу:</label>\r\n                            <select id=\"page_id\" name=\"page_id\" onchange=\"this.form.submit()\" class=\"form-select\">\r\n                                <option value=\"\">--Выберите страницу--</option>\r\n                                <?php foreach ($pages as $page): ?>\r\n                                    <option value=\"<?= htmlspecialchars($page[\'id\']) ?>\" <?= ($page[\'id\'] == $currentPageId) ? \'selected\' : \'\' ?>>\r\n                                        <?= htmlspecialchars($page[\'name\']) ?>\r\n                                    </option>\r\n                                <?php endforeach; ?>\r\n                            </select>\r\n                        </form>\r\n                        \r\n                        <form method=\"post\" action=\"adminPage.php\" class=\"form-group\">\r\n                            <input type=\"hidden\" name=\"page_id\" value=\"<?= htmlspecialchars($currentPageId) ?>\">\r\n                            <label for=\"content\" class=\"form-label\">Содержание страницы:</label>\r\n                            <textarea id=\"content\" name=\"content\" rows=\"10\" class=\"form-textarea\"><?= htmlspecialchars($currentContent) ?></textarea>\r\n                            <br>\r\n                            <button type=\"submit\" class=\"buy_button save_btn\">Сохранить</button>\r\n                        </form>\r\n                    </div>\r\n\r\n                    <div class=\"container table-container\">\r\n                        <p class=\"caption_main\">Добавить нового пользователя</p>\r\n                                <form method=\"post\" action=\"adminPage.php\" class=\"newUserForm\">\r\n                                    <div class=\"form-group\">\r\n                                        <label for=\"new_name\">Имя:</label>\r\n                                        <input type=\"text\" class=\"form-control\" id=\"new_name\" name=\"new_name\" required>\r\n                                    </div>\r\n                                    <div class=\"form-group\">\r\n                                        <label for=\"new_email\">Email:</label>\r\n                                        <input type=\"email\" class=\"form-control\" id=\"new_email\" name=\"new_email\" required>\r\n                                    </div>\r\n                                    <div class=\"form-group\">\r\n                                        <label for=\"new_password\">Пароль:</label>\r\n                                        <input type=\"password\" class=\"form-control\" id=\"new_password\" name=\"new_password\" required>\r\n                                    </div>\r\n                                    <div class=\"form-group\">\r\n                                        <label for=\"new_role\">Роль:</label>\r\n                                        <select class=\"form-control\" id=\"new_role\" name=\"new_role\">\r\n                                            <option value=\"1\">Пользователь</option>\r\n                                            <option value=\"2\">Админ</option>\r\n                                        </select>\r\n                                    </div>\r\n                                    <button type=\"submit\" class=\"buy_button save_btn save_btn\">Добавить</button>\r\n                                </form>\r\n                        <p class=\"caption_main\">Управление пользователями</p>\r\n                        <table class=\"table table-bordered table-hover\">\r\n                            <thead>\r\n                                <tr>\r\n                                    <th>ID</th>\r\n                                    <th>Имя</th>\r\n                                    <th>Email</th>\r\n                                    <th>Роль</th>\r\n                                    <th>Действие</th>\r\n                                </tr>\r\n                            </thead>\r\n                            <tbody>\r\n                                <?php foreach ($users as $user): ?>\r\n                                    <tr>\r\n                                        <form method=\"post\" action=\"adminPage.php\">\r\n                                            <input type=\"hidden\" name=\"user_id\" value=\"<?= htmlspecialchars($user[\'id\']) ?>\">\r\n                                            <td><?= htmlspecialchars($user[\'id\']) ?></td>\r\n                                            <td><input type=\"text\" name=\"name\" value=\"<?= htmlspecialchars($user[\'name\']) ?>\" class=\"form-control\"></td>\r\n                                            <td><input type=\"email\" name=\"email\" value=\"<?= htmlspecialchars($user[\'email\']) ?>\" class=\"form-control\"></td>\r\n                                            <td>\r\n                                                <select name=\"role_id\" class=\"form-control\">\r\n                                                    <option value=\"1\" <?= ($user[\'roleId\'] == 1) ? \'selected\' : \'\' ?>>Пользователь</option>\r\n                                                    <option value=\"2\" <?= ($user[\'roleId\'] == 2) ? \'selected\' : \'\' ?>>Админ</option>\r\n                                                </select>\r\n                                            </td>\r\n                                            <td>\r\n                                            <input type=\"hidden\" name=\"action\" value=\"delete\">\r\n                                            <input type=\"hidden\" name=\"user_id\" value=\"<?= htmlspecialchars($user[\'id\']) ?>\">\r\n                                            <button type=\"submit\" name=\"action\" value=\"delete\" class=\"btn btn-danger btn-block\">❌</button>\r\n                                            <button type=\"submit\" name=\"action\" value=\"update\" class=\"btn btn-success btn-block\">✅</button>\r\n                                        </td>\r\n                                        </form>\r\n                                    </tr>\r\n                                <?php endforeach; ?>\r\n                                \r\n                            </tbody>\r\n                        </table>\r\n                        <p class=\"caption_main\">Загруженные изображения при работе с водянным знаком</p>\r\n                        <table class=\"table table-bordered table-hover\">\r\n                            <thead>\r\n                                <tr>\r\n                                    <th>ID</th>\r\n                                    <th>Путь</th>\r\n                                    <th>Удалить</th>\r\n                                </tr>\r\n                            </thead>\r\n                            <tbody>\r\n                                <?php foreach ($imgs as $img): ?>\r\n                                    <tr>\r\n                                        <form method=\"post\" action=\"adminPage.php\">\r\n                                            <input type=\"hidden\" name=\"img_id\" value=\"<?= htmlspecialchars($img[\'id\']) ?>\">\r\n                                            <td><?= htmlspecialchars($img[\'id\'])?></td>\r\n                                            <td><a href=\"<?= htmlspecialchars($img[\'src\'])?>\" target=\"_blank\"><?= htmlspecialchars($img[\'src\'])?></a></td>\r\n\r\n                                            <td>\r\n                                                <input type=\"hidden\" name=\"action\" value=\"deleteImg\">\r\n                                                <input type=\"hidden\" name=\"img_id\" value=\"<?= htmlspecialchars($img[\'id\']) ?>\">\r\n                                                <button type=\"submit\" name=\"action\" value=\"deleteImg\" class=\"btn btn-danger btn-block\">❌</button>\r\n                                            </td>\r\n                                        </form>\r\n                                    </tr>\r\n                                    \r\n                                <?php endforeach;  ?>\r\n                                \r\n                            </tbody>\r\n                        </table>\r\n                    </div>\r\n                    <!-- Подключение скриптов Bootstrap для работы интерактивных элементов -->\r\n                    </table>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <hr />\r\n    </div>\r\n</div>');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`roleId`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `shoppingBasket`
--

CREATE TABLE `shoppingBasket` (
  `id` int(11) NOT NULL,
  `itemName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `addressname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `itemPriceNew` int(10) UNSIGNED NOT NULL,
  `itemPriceOld` int(10) UNSIGNED NOT NULL,
  `itemPriceDefault` int(10) UNSIGNED NOT NULL,
  `discount` tinyint(1) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shoppingBasket`
--

INSERT INTO `shoppingBasket` (`id`, `itemName`, `addressname`, `itemPriceNew`, `itemPriceOld`, `itemPriceDefault`, `discount`, `img`, `userId`) VALUES
(1, 'Салат', 'Белгород ул.Бульвар-Юности дом 11 квартира 311121', 200, 230, 0, 1, 'img/catalog/salad.png', 11),
(4, 'Пицца \"Пеперонни\"', 'Белгород ул. Южная 802дом квартира №313', 690, 740, 690, 0, 'img/catalog/peperonni.png', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL COMMENT 'имя пользователя',
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `roleId`) VALUES
(11, 'Виктор', 'i1@mail.ru', '$2y$10$ot9G8ZWQRkGav.gT21EqqOaYGxMpX.Lwp.424AVTpkS4WsgdE2D/.', 1),
(12, 'admin', 'admin@mail.ru', '$2y$10$UjLU2fVpe2SV9YY.IbMzh.n3XXqEcrgXeqiSzEsE2O5E2xMuYGvUm', 2),
(26, 'admin2', 'admin2@mail.ru', '$2y$10$DXVS8KVqR2LaDaUf55UFLuBgqtMYangHsWWjHaAF9B78/3Yx0ieOS', 2),
(27, 'eugene', 'emerall.d@mail.ru', '$2y$10$PEhHI9LWqHEAdVVDKeG/SOyJoUdxUViNTsslBuFj5OnJeCHyW5K/O', 1),
(34, 'Иноакентий', 'email123@mail.ru', '$2y$10$Oa6AzDrCSj7XP2N96twMA.CaX/MwGGpyBKkUoI.hApgoIcM3fUCoW', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `watermarkImg`
--

CREATE TABLE `watermarkImg` (
  `id` int(11) NOT NULL,
  `src` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `watermarkImg`
--

INSERT INTO `watermarkImg` (`id`, `src`) VALUES
(11, 'uploads/Screenshot_3.png'),
(12, 'uploads/watermarked_Screenshot_2.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cabinetOrders`
--
ALTER TABLE `cabinetOrders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`),
  ADD UNIQUE KEY `roleId_2` (`roleId`),
  ADD KEY `roleId` (`roleId`);

--
-- Индексы таблицы `shoppingBasket`
--
ALTER TABLE `shoppingBasket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `userId_2` (`userId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_2` (`id`),
  ADD KEY `roleID` (`roleId`),
  ADD KEY `roleID_2` (`roleId`),
  ADD KEY `roleID_3` (`roleId`);

--
-- Индексы таблицы `watermarkImg`
--
ALTER TABLE `watermarkImg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cabinetOrders`
--
ALTER TABLE `cabinetOrders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `shoppingBasket`
--
ALTER TABLE `shoppingBasket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `watermarkImg`
--
ALTER TABLE `watermarkImg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cabinetOrders`
--
ALTER TABLE `cabinetOrders`
  ADD CONSTRAINT `cabinetorders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `shoppingBasket`
--
ALTER TABLE `shoppingBasket`
  ADD CONSTRAINT `shoppingbasket_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
