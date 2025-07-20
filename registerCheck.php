<?php
require_once("helpFunctions/helps.php");


// var_dump($_POST);

$name = $_POST['name'] ?? '';
$email = $_POST['email'];
$password = $_POST['password'] ?? '';
$passwordRepeat = $_POST['passwordRepeat'] ?? '';

$_SESSION['validation'] = [];



if(empty($name)) {
    $_SESSION['validation']['name'] = 'Пустое имя!'; 
    redirect('registrationPage.php');
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['validation']['email'] = 'Неверно указна почта';
    redirect('registrationPage.php');
}

if(empty($password)) {
    $_SESSION['validation']['password'] = 'Пустой пароль!'; 
    redirect('registrationPage.php');
}

if(!($password === $passwordRepeat)) {
    $_SESSION['validation']['passwordRepeat'] = 'Пароли не совпадают!'; 
    redirect('registrationPage.php');
}

if(!empty($_SESSION['validation'])) {
    addOldValue('name', $name);
    addOldValue('email', $email);
    redirect('registrationPage.php');
}


$pdo = getPDO();


// проверка существования почты в базе
error_reporting(E_ALL);
ini_set('display_errors', 1);

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);

if ($stmt->rowCount() > 0) {
    $_SESSION['validation']['email'] = 'Такой пользователь уже зарегестрирован!'; 
    redirect('registrationPage.php');
}

// запись данных
$query = "INSERT INTO users (name, email, password, roleId) VALUES (:name, :email, :password, :roleId)";
$params = [
    'name' => $name,
    'email' => $email,
    'password' =>password_hash($password, PASSWORD_DEFAULT),
    'roleId' => 1,

];
$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
    
} catch (PDOException $e) {
    die('Ошибка при выполнении запроса: ' . $e->getMessage());
}
if(empty($_SESSION['validation'])) {
    redirect('loginPage.php');
    echo '<script>alert("Вы успешно зарегестрировались");</script>';

}