<?php
$host = 'localhost';
$dbname = 'questionnaire';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Не удается подключиться к базе данных: " . $e->getMessage());
}
?>