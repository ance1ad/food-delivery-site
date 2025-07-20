itemsInfo = document.querySelectorAll(".catalogInfo p:nth-child(2)");
itemsClass = document.querySelectorAll(".catalogInfo p:nth-child(3)");
itemsPrice = document.querySelectorAll(".catalogInfo p:nth-child(4)");

document.addEventListener("DOMContentLoaded", () => {
	// Кнопки сортировки
	const allSorts = document.querySelectorAll(".sortItem");

	// Выбор сортировки
	const sortChoose = document.getElementById("sortChoose"); // Кнопка сортировать
	const sortChooseBlock = document.getElementById("sortChooseBlock"); // Блок сортировки
	sortChoose.addEventListener('click', () => {
		sortChooseBlock.style.display = 'flex'; // Показать блок выбора сортировки
	});

	const options = document.querySelectorAll(".option");
	let sortVar = -1;
	for (let i = 0; i < options.length; i++) {
		options[i].addEventListener('click', () => {
			sortVar = i;
			const allDots = document.querySelectorAll(".option > div");
			allDots.forEach((e) => {
				e.style.backgroundColor = 'white';
			});
			allDots[i].style.backgroundColor = 'black';
		});
	}

	const sortChooseBlockButton = document.querySelector("#sortChooseBlock > .buy-button"); // Кнопка применить

	// Расположение блока сортировки
	let rect = sortChoose.getBoundingClientRect();
	sortChooseBlock.style.top = `${rect.bottom + 15}px`;
	sortChooseBlock.style.left = `${rect.left - ((rect.right - rect.x) / 2 - 30)}px`;

	window.addEventListener('resize', () => {
		rect = sortChoose.getBoundingClientRect();
		sortChooseBlock.style.top = `${rect.bottom + 15}px`;
		sortChooseBlock.style.left = `${rect.left - ((rect.right - rect.x) / 2 - 30)}px`;
	});

	// Обработчик для кнопок сортировки
	const sortButtons = document.querySelectorAll(".sortItem");

	if (sortButtons.length > 0) {
		sortButtons.forEach(button => {
			button.addEventListener("click", () => {
				const sortType = button.getAttribute("data-sort");
				window.location.href = `catalogSort.php?sort=${sortType}`;
			});
		});
	} else {
		console.log("Кнопки сортировки не найдены.");
	}
});

