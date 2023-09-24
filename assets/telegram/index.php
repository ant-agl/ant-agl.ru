<?php
require_once __DIR__ . '/TelegramConnector.php';

$token = "6568622203:AAGSlCG1tv3LaVWbzI5ZkvzLs78PQ7zL8xE";

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

    $telegramManager->sendMessage(710899516, $text);

} catch (Exception $e) {
    file_put_contents("MAIN_ERROR_LOG.txt", 'Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode() . " " . PHP_EOL . $e->getFile() . " : " . $e->getLine());
}