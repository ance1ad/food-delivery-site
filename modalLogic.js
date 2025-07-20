const popupBtns = document.querySelectorAll(".crud_button"); // Находим все кнопки с классом
const closeBtn = document.querySelector("#closeBtn");
const dialog = document.querySelector("dialog");

popupBtns.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault(); // Отменяем стандартное поведение

        const form = button.closest("form");
        if (form && !validateForm(form)) {
            // Если валидация не пройдена, выводим сообщение об ошибке
            alert("Пожалуйста, заполните все поля корректно!");
            return;
        }

        dialog.showModal();

        if (form) {
            // Если кнопка связана с формой
            setTimeout(() => {
                form.submit();
            }, 1000);
        } else {
            setTimeout(() => {
                dialog.close();
            }, 1000);
        }
    });
});

// Закрытие модального окна вручную
closeBtn.addEventListener("click", () => {
    dialog.close();
});

// Валидация
function validateForm(form) {
    // Проверяем, что все обязательные поля заполнены
    const requiredFields = form.querySelectorAll("[required]");
    for (let field of requiredFields) {
        if (!field.value.trim()) {
            return false; // Если хоть одно поле пустое
        }
    }
    return true; // Все поля корректно заполнены
}


