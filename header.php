<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="css/style.css" type="text/css" />

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- шрифт для названия каталогов -->
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Madimi+One&display=swap"
        rel="stylesheet" as="font" crossorigin="anonymous" />
    <title><?php echo $title?></title>
    <link rel="icon" href="img/icons/ico.svg" type="image/x-icon" />
</head>

<body id="body" class="body">
    <!-- обертка -->
    <div class="wrapper">
        <!-- шапка -->
        <header class="header">
            <div class="container">
                <div class="header_container">
                    <a href="index.php" class="logo">🥧Tasty</a>
                    <nav class="navbar">
                        <?php  if(!isset($_SESSION['user']['id'])): ?>
                            <a href="loginPage.php" class="menu_text">Вход</a>
                        <?php endif; ?>
                        
                        <a href="index.php" class="menu_text">Каталог</a>
                        <?php if($title == "Главная страница"): ?> 
                            <a href="#" class="menu_text" id="catalog">Категории</a>
                        <?php endif; ?>
                        
                        <a href="#footer" class="menu_text" id="downInFooter">Контакты</a>
                        <?php  if(isset($_SESSION['user']['id'])): ?>
                            <a href="cabinet.php" class="menu_text">🙋‍♂️Личный кабинет</a>
                            <a href="shopping.php" class="menu_text">🛒Корзина</a>
                            <a href="about.php" class="menu_text">О нас</a>
                        <?php endif; ?>
                        <!-- логика проверки что юзер админ -->
                        <?php  if(($_SESSION['user']['roleId']) == 2): ?>
                            <a href="adminPage.php" class="menu_text">🙋Панель админа</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <hr />
        </header>
        <!-- категории товаров -->
        <div class="category disp" id="menu">
            <div class="container">
                <div class="category_list">
                    <div class="elements">
                        <a href="index.php" class="category_ref">Все категории</a>
                    </div>
                    <div class="elements">
                        <a href="#" class="category_ref" data-category="sushi">Суши 🍣</a>
                    </div>
                    <div class="elements">
                        <a href="#" class="category_ref" data-category="fast">Быстрое 🥙</a>
                    </div>
                    <div class="elements">
                        <a href="#" class="category_ref" data-category="sporpit">Спортпит 🥦</a>
                    </div>
                    <div class="elements">
                        <a href="#" class="category_ref" data-category="hot">Приготовленное 🍳</a>
                    </div>
                    <div class="elements">
                        <a href="#" class="category_ref" data-category="products">Продукты 🍉</a>
                    </div>
                </div>
            </div>
        </div>
        <hr />