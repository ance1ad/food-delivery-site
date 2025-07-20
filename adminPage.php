<?php
require_once("helpFunctions/helps.php");
session_start();
if ($_SESSION["user"]["roleId"] != 2) {
    redirect("index.php"); // редирект если не админ
}

$title = getPageTitle(6);;
require_once("header.php");
$user = getCurrentUser();

require_once("helpFunctions/adminPageFunctions.php");


// Получение списка страниц
$pages = getPages();
$currentContent = '';
$currentPageId = '';

if (isset($_GET['page_id'])) {
    $currentPageId = $_GET['page_id'];
    $currentContent = getPageContent($currentPageId);
}

// Получение списка пользователей и ролей
$users = getUsers();
$roles = getRoles();
$imgs = getImgs();

$page = getPage(6);
require("helpFunctions/returnPageContent.php");

require_once("footer.php");
?>