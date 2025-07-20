<?php
session_start();
require_once("config.php");
function redirect(string $path){
    header("Location: $path");
    die();
}

function addOldValue(string $key, $value): void{ 
    $_SESSION['old'][$key] = $value;
}

function getOldValues(string $key){
    $value = $_SESSION['old'][$key] ?? '';
    unset ($_SESSION['old'][$key]);
    return $value;
}
 
function validationErrorMessage(string $fieldName){
    $message =  $_SESSION['validation'][$fieldName] ?? '';
    unset( $_SESSION['validation'][$fieldName]);
    echo $message;
}


// пользователь не найден при авторизации
function getMessage(string $key): string{
    $message = $_SESSION['login'][$key] ??'';
    unset( $_SESSION['login'][$key]); // унчитожение
    return $message;
}

function hasMessage(string $key): bool{
    return isset($_SESSION['login'][$key]);
}


function findUser(string $email)
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


// получаем пользователя из бд по айдишнику из сессии
function getCurrentUser()
{
    $pdo = getPDO();

    if(!isset($_SESSION['user'])){
        return false;
    }
    $userid = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userid]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getPage(string $pageId){
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM pages WHERE id = :id");
    $stmt->execute(['id' => $pageId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}   

function getPages() {
    $pdo = getPDO();
    $stmt = $pdo->query("SELECT id, name FROM pages"); // Используем поле name для названия страницы
    return $stmt->fetchAll();
}

function getPageTitle(string $pageId){
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM pages WHERE id = :id");
    $stmt->execute(['id' => $pageId]);
    $page =  $stmt->fetch(PDO::FETCH_ASSOC);
    return $page["pageTitle"];
}   

function getPageContent($pageId) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT content FROM pages WHERE id = :id");
    $stmt->execute(['id' => $pageId]);
    return $stmt->fetchColumn();
}

function updatePageContent($pageId, $content) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("UPDATE pages SET content = :content WHERE id = :id");
    return $stmt->execute(['content' => $content, 'id' => $pageId]);
}



// Функции для пользователей
function getUsers() {
    $pdo = getPDO();
    $stmt = $pdo->query("SELECT * FROM users");
    return $stmt->fetchAll();
}

function getUser($userId) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getRoles() {
    $pdo = getPDO();
    $stmt = $pdo->query("SELECT * FROM roles");
    return $stmt->fetchAll();
}

function updateUser($userId, $name, $email, $roleId) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, roleId = :roleId WHERE id = :id");
    return $stmt->execute(['name' => $name, 'email' => $email, 'roleId' => $roleId, 'id' => $userId]);
}


function deleteUser($userId) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
}

function addUser($name, $email, $password, $roleId) {
    $pdo = getPDO();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, roleId) VALUES (:name, :email, :password, :roleId)");
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword, 'roleId' => $roleId]);
}

function setImg($src) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("INSERT INTO watermarkImg (src) VALUES (:src)");
    $stmt->execute(['src' => $src]);
}

function getImgs() {
    $pdo = getPDO();
    $stmt = $pdo->query("SELECT * FROM watermarkImg");
    return $stmt->fetchAll();
}  


function deleteImg($imgId) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("DELETE FROM watermarkImg WHERE id = :id");
    $stmt->execute(['id' => $imgId]);
}


// выход
function logout(){
    unset($_SESSION['user']['id']);
    unset($_SESSION['user']['roleId']);

    redirect('../loginPage.php');
}

function getPDO():PDO { // подключение к бд через драйвер ПДО
    try {
        return new \PDO('mysql:host='.DB_HOST.'; port='.DB_PORT.'; dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
    } catch (\PDOException $e) {
        die("Ошибка: {$e->getMessage()}");
    }
}
