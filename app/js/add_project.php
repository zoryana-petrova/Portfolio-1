<?php

// $name = $_POST['project-name'];
// $addProjectUrl = $_POST['add-project-url'];
// $projectTextarea = $_POST['project-textarea'];
// $data = array();

// if($name === '' || $addProjectUrl === '' || $projectTextarea === ''){
// 	$data['status'] = 'error';
// 	$data['text'] = 'Ошибка! Попробуйте еще раз, что-то идет не так !';
// }else{
// 	$data['status'] = 'OK';
// 	$data['text'] = "Проект успешно добавлен"; 
// }

header("Content-Type: application/json");
echo json_encode($data);
exit;

?>