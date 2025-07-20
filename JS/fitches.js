document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.promo_button')) {
        handlePromoButtonClick();
    }

    // спуск в футер
    if (document.querySelector('#downInFooter')) {
        handleSmoothScroll('#downInFooter');
    }


    // поднятие наверх
    if (document.querySelector('#upInHead')) {
        handleSmoothScroll('.footer_links');
    }


    if (document.querySelector('#buy_btn')) {
        addReview();
    }

    if (document.querySelector('#catalog')) {
        showCategories();
    }
    if (document.querySelector('.category_ref')) {
        sortingDishes();
    }
    if (document.querySelector('.btn_design')) {
        animate();
    }


    // промокод
    function handlePromoButtonClick() {
        const promoButton = document.querySelector('.promo_button');
        const promoCode = document.querySelector('.promocode');

        if (promoButton && promoCode) {
            promoButton.addEventListener('click', function () {
                const textToCopy = promoCode.textContent;
                navigator.clipboard.writeText(textToCopy)
                    .then(() => {
                        console.log('Текст скопирован');
                    })
                    .catch(err => {
                        console.error('Ошибка в копировании текста: ', err);
                    });
                alert("Промокод скопирован");
            });
        }
    }

    function handleSmoothScroll(selector) {
        const links = document.querySelectorAll(selector);

        for (let link of links) {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                const blockID = link.getAttribute('href');
                if (blockID) {
                    const targetElement = document.querySelector(blockID);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                    }
                }
            });
        }
    }



    // оставьте отзыв
    function addReview() {
        const buy_btn = document.querySelector('#buy_btn');
        const review_text = document.querySelector('#review_sms');

        buy_btn.addEventListener('click', () => {
            console.log(review_text.classList);
            if (review_text.classList.contains('review_display')) {
                review_text.classList.remove('review_display');
            } else {
                review_text.classList.add('review_display');
            }
        });
    }


    // Меню категорий
    function showCategories() {
        const catalog = document.querySelector('#catalog');
        const menu = document.querySelector('#menu');

        catalog.addEventListener('click', () => {
            console.log(menu.classList);
            if (menu.classList.contains('disp')) {
                menu.classList.remove('disp');
            } else {
                menu.classList.add('disp');
            }
        });

    }

    // для сортировки
    function sortingDishes() {
        const buttons = document.querySelectorAll('.category_ref');
        const dishes = document.querySelectorAll('.catalog_item');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.getAttribute('data-category');
                showDishes(category);
            });
        });

        // показ товаров
        function showDishes(category) {
            dishes.forEach(dish => {
                const dishCategory = dish.getAttribute('data-category');
                if (dishCategory === category || category === 'all') {
                    dish.style.display = 'block';
                } else {
                    dish.style.display = 'none';
                }
            });
        }
    }

    // aнимация кнопки сохранения формы (наверное не лучшее решение дизайна)
    function animate() {
        let box = document.querySelector('.btn_design');

        box.addEventListener("click", function () {
            box.classList.add('box_animate_2');
        });

        box.addEventListener("animationend", AnimationHandler, false);

        function AnimationHandler() {
            box.classList.remove('box_animate_2');
        }
    }

    // добавить если будет необходимо все перенести в 1 файл
    function validate() {

    }

    // часы
    window.setInterval(function () {
        const date = new Date();
        const day = date.getDate();
        const year = date.getFullYear() - 2000;
        const m = date.getMonth();
        var month = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "авгуса", "сентября", "октября", "ноября", "декабря",];

        const clock = `${day} ${month[m]} ${year}г.`;


        document.getElementById("clock").innerHTML = clock;

    })

    function overflowText() {
        var buttons = document.querySelectorAll(".buy_button, .buy_btn, .promo_button");

        buttons.forEach(function (button) {
            if (button.classList.contains("buy_button") || button.classList.contains("buy_btn") || button.classList.contains("promo_button")) {
                button.classList.add("highlight");
            }

        });
    }

    function calculateCart(event) {
        console.log(event.target.dataset.action);
        var counterPrice = 0;

        // сначала посчитаем корзину
        var price = document.getElementsByClassName('item_price_new');
        for (let i = 0; i < price.length; i++) {
            counterPrice += parseInt(price[i].textContent);
        }
        document.getElementsByClassName('result_payment')[0].textContent = counterPrice;

        // closest - ближайший родитель
        if (event.target.dataset.action === 'plus' || event.target.dataset.action === 'minus') {
            var item_shopping = event.target.closest('.item_shopping');
            var counterFood = item_shopping.querySelector('[price-counter]');
        }
        if (event.target.dataset.action === 'plus') {
            counterFood.innerText++;
        }
        if (event.target.dataset.action === 'minus') {
            if (parseInt(counterFood.innerText) > 1) {
                counterFood.innerText--;
            }
        }
        counterPrice = 0;
        // посчитаем сумму исходя из увеличенного кол-ва 
        var counts = document.getElementsByClassName('items_current');
        for (let i = 0; i < counts.length; i++) {
            counterPrice += parseInt(price[i].textContent) * counts[i].textContent;
        }
        document.getElementsByClassName('result_payment')[0].textContent = (counterPrice + "₽");
    }

    window.addEventListener('click', function (event) {
        calculateCart(event);
    });


});






