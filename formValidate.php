<?php
    // Хранение полей формы
    $name = '';
    $phone = '';
    $address = '';
    $email = '';
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Проверка имени
        if (empty($_POST['name'])) {
            $errors['name'] = "Заполните это поле!";
        } elseif (!preg_match("/^[A-Za-zА-Яа-яЁё ]+$/u", $_POST['name'])) {
            $errors['name'] = "Имя должно содержать только буквы и пробелы!";
        } else {
            $name = $_POST['name']; // сохраняем введенное имя
        }
        // Проверка телефона
        if (empty($_POST['phone'])) {
            $errors['phone'] = "Заполните это поле!";
        } elseif (!preg_match("/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/", $_POST['phone'])) {
            $errors['phone'] = "Введите корректный номер телефона!";
        } else {
            $phone = $_POST['phone']; // сохраняем введенный телефон
        }
        // Проверка адреса
        if (empty($_POST['address'])) {
            $errors['address'] = "Заполните это поле!";
        } else {
            $address = $_POST['address']; // сохраняем введенный адрес
        }
        // Проверка email
        if (empty($_POST['email'])) {
            $errors['email'] = "Заполните это поле!";
        } elseif (!preg_match("/^[a-zA-Z0-9][\w.-]*[a-zA-Z0-9]+@[a-zA-Z0-9]+[a-zA-Z0-9-.]*[a-zA-Z0-9]\.[a-z]{2,}$/", $_POST['email'])) {
            $errors['email'] = "Введите корректный email!";
        } else {
            $email = $_POST['email']; // сохраняем введенный email
        }
    
        // Если ошибок нет, сохраняем данные в сессии и делаем редирект
        if (empty($errors)) {
            $_SESSION['success'] = "Данные успешно обработаны!";
            error_reporting(E_ALL);

            header('Location: '.$_SERVER['PHP_SELF'].'?message=ok'); // редирект
            unset($_SESSION['errors']);
            $_SESSION['form_data'] = [
                'name' => '',
                'phone' => '',
                'email' => '',
                'address' => ''
            ];
        } else {
            // Сохраняем ошибки и введенные значения в сессии
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = [
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'email' => $_POST['email']
            ];
        }
    } else {
        // Если форма не была отправлена, попытаемся загрузить предыдущие значения из сессии (если они есть)
        if (isset($_SESSION['form_data'])) {
            $name = $_SESSION['form_data']['name'] ?? '';
            $phone = $_SESSION['form_data']['phone'] ?? '';
            $address = $_SESSION['form_data']['address'] ?? '';
            $email = $_SESSION['form_data']['email'] ?? '';
            unset($_SESSION['form_data']); // Очищаем данные из сессии
        }
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }
        if (isset($_SESSION['success'])) {
            echo '<script>alert("'.$_SESSION['success'].'");</script>';
            unset($_SESSION['success']);
        }
    }
    ?>