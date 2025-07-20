<?php
require_once("helps.php");
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    logout(); 
    
}
redirect('index.php');

?>