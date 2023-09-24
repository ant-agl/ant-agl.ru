<?php
require_once __DIR__ . '/TelegramConnector.php';

$token = "";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['$message'];

try {
    $telegramManager = new TelegramConnector("", "");

    $text = "
Имя: " . $name . "
Почта: " . $email . "
Сообщение: " . $message;
    
    $telegramManager ->__construct($token);

    $telegramManager->sendMessage(983206088, $text);

} catch (Exception $e) {
    file_put_contents("MAIN_ERROR_LOG.txt", 'Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode() . " " . PHP_EOL . $e->getFile() . " : " . $e->getLine());
}