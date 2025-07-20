<?php
// Обработка формы изменения контента страницы
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['page_id']) && !isset($_POST['user_id'])) {
    $pageId = $_POST['page_id'];
    $content = $_POST['content'];
    $_SESSION['success'] = 'Правки успешно внесены !';
    updatePageContent($pageId, $content);
    redirect("adminPage.php");
    echo '<script>alert("'.$_SESSION['success'].'");</script>';
}


// Обработка формы изменения или удаления пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'update') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $roleId = $_POST['role_id'];
            $_SESSION['success'] = 'Пользователь изменён !';
            updateUser($userId, $name, $email, $roleId);
            redirect("adminPage.php");
            exit();
        } elseif ($_POST['action'] === 'delete') {
            $_SESSION['success'] = 'Пользователь удален !';
            deleteUser($userId);
            redirect("adminPage.php");
            echo '<script>alert("'.$_SESSION['success'].'");</script>';
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['img_id'])) {
    $imgId = $_POST['img_id'];
    if (isset($_POST['action']) && $_POST['action'] === 'deleteImg') {
        $_SESSION['success'] = 'Изображение удалено';
        deleteImg($imgId);
        redirect("adminPage.php");
        echo '<script>alert("'.$_SESSION['success'].'");</script>';
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['new_name'], $_POST['new_email'], $_POST['new_password'], $_POST['new_role'])) {
        $name = $_POST['new_name'];
        $email = $_POST['new_email'];
        $password = $_POST['new_password'];
        $roleId = $_POST['new_role'];
        $_SESSION['success'] = 'Пользователь добавлен !';
        // Вызов функции для добавления нового пользователя
        addUser($name, $email, $password, $roleId);
        redirect("adminPage.php");
        exit();
    }
}



if (isset($_SESSION['success'])) {
    echo '<script>alert("'.$_SESSION['success'].'");</script>';
    unset($_SESSION['success']);
}

?>