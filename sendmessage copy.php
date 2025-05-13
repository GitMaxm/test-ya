<?php
  $content = "";
  $emailContent = "";
  
  foreach ($_POST as $key => $value) {
    if($value) {
      $content .= "<b>$key</b>: <i>$value</i>\n";
      $emailContent .= "$key: $value\n";
    }
  }
  
  if(trim($content)){
    
    // Отправка на email
    $to = "alex2702071@mail.ru"; // Укажите вашу почту
    $subject = "Новая заявка с сайта";
    $headers = "From: applications@upakartex.ru\r\n"; // Укажите email отправителя
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    $emailMessage = "Новая заявка с сайта:\n\n" . $emailContent;
    
    mail($to, $subject, $emailMessage, $headers);
  }
?>

 