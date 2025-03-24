<?php
// Параметры подключения Denwer
$host = 'localhost';
$dbname = 'flower_shop';
$user = 'root';    // Стандартный пользователь Denwer
$pass = '';        // Пароль по умолчанию пустой

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>