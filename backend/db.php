<?php
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=feedback_db;charset=utf8',
        "your_username", // Логин
        "your_pass"    // Пароль
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>
