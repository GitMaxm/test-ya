<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $message = $_POST["message"] ?? "";
    
    if (!empty($name) && !empty($email) && !empty($phone)) {
        // Подготовка содержимого для email
        $to = "ivanmax29@yandex.ru"; // Укажите вашу почту
        $subject = "Новая заявка с сайта";
        $headers = "From: test@astro-lina.ru\r\n"; // Укажите email отправителя
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        $emailMessage = "Новая заявка с сайта:\n\n";
        $emailMessage .= "Имя: " . $name . "\n";
        $emailMessage .= "Email: " . $email . "\n";
        $emailMessage .= "Телефон: " . $phone . "\n";
        $emailMessage .= "Сообщение: " . $message . "\n";
        
        // Отправка email
        mail($to, $subject, $emailMessage, $headers);
        
        echo json_encode(["success" => true]);
        exit;
    } else {
        echo json_encode(["success" => false, "message" => "Пожалуйста, заполните все обязательные поля."]);
        exit;
    }
}
?>
