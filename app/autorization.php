<?php
header('Content-Type: application/json');

$email = strtolower($_POST['email']);
$password = strtolower($_POST['password']);


if($email !== 'admin@example.com' || $password !== 'admin'){
  echo json_encode([
      'error' => true,
      'errorMessage' => 'Неверный логин или пароль'
  ]);

  exit(0);
}

// Пользователь авторизован
session_start();

echo json_encode([
  'error' => false
]);

exit(0);