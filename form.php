<?php
include('db.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $agree = isset($_POST['agree']) ? 1 : 0;
    $sql = "INSERT INTO responses (name, surname, age, gender, country, agree) VALUES (?, ?, ?, ?, ?, ?)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $surname, $age, $gender, $country, $agree]);
        $_SESSION['form_submitted'] = true;
        header("Location: thank_you.php");
        exit;

    } catch (PDOException $e) {
        echo "Ошибка при отправке анкеты: " . $e->getMessage();
    }
} else {
    echo "Форма не была отправлена.";
}
?>