<!-- как правильно с бд и тп -->
<?php
require_once("helpFunctions/helps.php");
$title = getPageTitle(4);
require_once("header.php");

if (isset($_GET['outputPath'])) {
    $outputPath = $_GET['outputPath'];
    setImg($outputPath);
    $page = getPage(4); 

    require("helpFunctions/returnPageContent.php");
} else {
    echo '<p>Некорректный запрос.</p>';
}
require_once("footer.php");
?>