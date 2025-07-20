<div id="sort">
    <div id="sortContainer">
        <div class="sortItem sort1" data-sort="discount">
            <img src="img/discount.png">
            <p>Акции</p>
        </div>
        <div class="sortItem sort2" data-sort="rectangle">
            <img src="img/rectangle.png">
            <p>Прямоугольная</p>
        </div>
        <div class="sortItem sort3" data-sort="wood">
            <img src="img/wood.png">
            <p>Дерево</p>
        </div>
        <div class="sortItem sort4" data-sort="floor">
            <img src="img/flat_plan.png">
            <p>Для пола</p>
        </div>
        <div class="sortItem sort5" data-sort="light">
            <img src="img/brightness.png">
            <p>Светлая</p>
        </div>
        <div class="sortItem sort6" data-sort="lock">
            <img src="img/lock.png">
            <p>Замковая</p>
        </div>
        <div class="sortItem sort7" data-sort="living_room">
            <img src="img/sofa.png">
            <p>Для гостинной</p>
        </div>
    </div>
</div>
</div>
<div id="text">
    <div id="textContainer">
        <h1>Каталог</h1>
        <p><a href="adminPage.php" class="linkText">🙋‍♂️ Страница администратора</a></p>
        <div id="sortChoose">
            <img src="img/sort.png">
            <p>Сортировать</p>
        </div>
    </div>
</div>

<form id="sortChooseBlock" method="POST" action="catalogSort.php">
    <div class="choice_sorted_text">
        <label class="option">
            <input type="radio" name="sort" value="popular" required>
            <div></div>
            <p>Популярное</p>
        </label>
        <label class="option">
            <input type="radio" name="sort" value="new">
            <div></div>
            <p>Новинки</p>
        </label>
        <label class="option">
            <input type="radio" name="sort" value="cheap">
            <div></div>
            <p>Сначала дешевле</p>
        </label>
        <label class="option">
            <input type="radio" name="sort" value="expensive">
            <div></div>
            <p>Сначала дороже</p>
        </label>
    </div>
    <button type="submit" class="buy-button choice_button">Применить</button>
</form>

