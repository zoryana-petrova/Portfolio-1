<?php
session_start();
// проверка - был ли POST
if($_SERVER['REQUEST_METHOD'] == "POST"){

    // Получаем доступ к файлу
    $file = $_FILES['upload'];

    // проверка на величину файла в байтах
    if($file['size'] == 0 || $file['size'] > 2097152){
        $_SESSION['message'] = "Файл не выбран или превышает 2МБ";
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: projects.php");
    }

    $file_name = $file['name'];

    // проверяем, есть ли папка для загрузки файлов
    if(!file_exists(__DIR__.'/uploads/')){
        // если нет, то создаем ее
        mkdir(__DIR__.'/uploads/', 777);
    }

    // формируем путь к файлу, в нашем приложении
    $file_dist = __DIR__.'/uploads/'.$file_name;
  

    // перемещаем файл из временной папки сервера, в папку нашего приложения
    if(move_uploaded_file($file['tmp_name'], $file_dist)){
        $_SESSION['message'] = "Файл успешно загружен на сервер<br /><a href='/app/uploads/{$file_name}'>{$file_name}</a>";
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: projects.php");
    } else {
        $_SESSION['message'] = "Возникла ошибка при загрузке файла на сервер";
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: projects.php");
    }


} else {
    $_SESSION['message'] = "У вас нет доступа на данную страницу";
    header("HTTP/1.1 302 Moved Temporarily");
    header("Location: projects.php");
    exit;
}