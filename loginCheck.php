<?php
require_once("helpFunctions/helps.php");
// var_dump($_POST);

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

$_SESSION['login'] = [];
addOldValue('email', $email);

$user = findUser($email);


// var_dump($user);
if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['login']['email'] = 'Неверный формат почты';
    redirect('loginPage.php');
}


if(!$user){
    $_SESSION['login']['email'] = "Пользователь $email не найден";
    redirect('loginPage.php');
}


$password = (string)$password;
$storedPasswordHash = (string)$user['password'];
if(!password_verify($password, $storedPasswordHash)){
    $_SESSION['login']['password'] = 'Неверно указан пароль';
    var_dump($email, $password, $user['password']);
    redirect('loginPage.php');
}


$_SESSION['user']['roleId'] = $user['roleId'];
$_SESSION['user']['id'] = $user['id'];
redirect('cabinet.php');
?>