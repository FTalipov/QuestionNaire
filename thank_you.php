<?php
session_start();

if (!isset($_SESSION['form_submitted']) || $_SESSION['form_submitted'] !== true) {
    header("Location: index.html");
    exit;
}
unset($_SESSION['form_submitted']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Спасибо!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        h1 {
            color: #4CAF50;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Спасибо за заполнение анкеты!</h1>
    <p>Ваши ответы были успешно отправлены.</p>
    <a href="results.php">
        <button>Посмотреть результаты</button>
    </a>
</body>
</html>