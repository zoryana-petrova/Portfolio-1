<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
 

  // Создаём объект ReCaptcha
  $recaptcha = new \ReCaptcha\ReCaptcha($config['recaptcha_secret']);

  // Проверяем правильно ли ввели каптчу
  $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

  // Если не правильно
  if (!$response->isSuccess()){
    echo json_encode([
      'error' => true,
      'captchaError' => true
    ]);
    exit;
  }


  // Setup Mailer
  $mailer = new PHPMailer();

  $mailer->isSMTP();


  $mailer->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mailer->SMTPAuth = true;          // Enable SMTP authentication

  $mailer->Username = $config['mailer_username'];          // SMTP username
  $mailer->Password = $config['mailer_password'];          // SMTP password

  $mailer->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
  $mailer->Port = 587;                                      // TCP port to connect to

  $mailer->setFrom($config['mailer_username']);
  $mailer->addAddress($config['mailer_username'], 'From Website');


  // Create Message
  $mailer->Subject = 'New feedback on portfolio website!';

  $mailer->Body = "Name: $name\n";
  $mailer->Body .= "Email: $email\n";
  $mailer->Body .= "Message: $message\n";

  if($mailer->send()) {
    echo json_encode(['error' => false]);
  } else {
    echo json_encode(['error' => true]);
  }
}