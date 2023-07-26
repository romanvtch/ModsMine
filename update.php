<?php
// Підключення до бази даних
require_once 'db_connect.php';
//Завантаження функцій для трансліта
require_once 'functions.php';

$result = $conn->query("SELECT * FROM post");
while(($info = $result->fetch_assoc())) {
    print_r($info);
    $conn->query("UPDATE post SET link = '".translit_url($info["title"])."' WHERE id = ".$info["id"]);
}