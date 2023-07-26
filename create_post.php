<?php
// Підключення до бази даних
require_once 'db_connect.php';
//Завантаження функцій для трансліта
require_once 'functions.php';

// Отримання даних з форми
$image = $_POST['image'];
$title = $_POST['title'];
$description = $_POST['description'];
$image2 = $_POST['image2'];
$description2 = $_POST['description2'];
$image3 = $_POST['image3'];
$description3 = $_POST['description3'];
$download = $_POST['download'];
$seodescription = $_POST['seodescription'];
$seotag = $_POST['seotag'];
$link = translit_url($title);
$section = $_POST['section']; 

// Підготовка та виконання запиту на вставку даних
$stmt = $conn->prepare("INSERT INTO post (image, title, description, image2, description2, image3, description3, download, seodescription, seotag, link, section, data_add) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE())");
$stmt->bind_param("ssssssssssss", $image, $title, $description, $image2, $description2, $image3, $description3, $download, $seodescription, $seotag, $link, $section);
$stmt->execute();

// Перенаправлення на головну сторінку після додавання поста
header("Location: index.php");
exit();
?>