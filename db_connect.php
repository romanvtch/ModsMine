<?php
$host = 'modsmi0.mysql.tools';
$db = 'modsmi0_db';
$user = 'modsmi0_db';
$password = '5emDvqyw';

// Встановлення з'єднання з базою даних
$conn = new mysqli($host, $user, $password, $db);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}
?>
