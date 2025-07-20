window.addEventListener('click', function (event) {
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
        counterPrice += parseInt(price[i].textContent) * counts[i].textContent
    }
    document.getElementsByClassName('result_payment')[0].textContent = (counterPrice + "₽");

});

