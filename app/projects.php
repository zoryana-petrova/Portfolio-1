<?php
session_start();

$message = null;
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
}

unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petrova Zoryana</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="bower/qtip2/jquery.qtip.css">
    <link rel="stylesheet" href="bower/normalize-css/normalize.css">
    <link rel="stylesheet" href="css/projects.css">
    <script src="bower/modernizr/modernizr.js"></script>
    <!-- HTML5 shim and Respond.js IE8 of HTML5 elements and media queries-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="css/ie-8.css" />
    <![endif]-->
</head>
<body>
    <div class="wrapper">
        <section class="top-menu-header">
            <div class="container">
                <header class="top-menu-content">
                    <div class="header-logo">
                        <a href="index.html" class="logo-link">
                           <img src="images/header_logo.png" alt="LoftSchool">
                        </a>
                    </div>
                    <div class="top-menu-wrapper">
                        <ul class="top-menu ul-clear">
                            <li class="icons-wrapper">
                                <a href="http://facebook.com/" target="_blank" class="f icons-social"></a>
                            </li>
                            <li class="icons-wrapper">  
                                <a href="http://vk.com" target="_blank" class="vk icons-social" ></a>
                            </li>
                            <li class="icons-wrapper">
                                <a href="http://twitter.com" target="_blank" class="tw icons-social"></a>
                            </li>
                            <li class="icons-wrapper">
                                <a href="http://github.com/" target="_blank" class="g icons-social"></a>
                            </li>
                        </ul>
                    </div>
                </header>
            </div>
        </section>
        <section class="page-content-wrapper">
            <div class="container">
                <div class="content">
                    <aside class="sidebar">
                        <ul class="main-menu">
                            <li class="main-menu-item"><a href="index.html" class="main-menu-link">Обо мне</a></li>
                            <li class="main-menu-item active"><a href="projects.html" class="main-menu-link">Мои Работы</a></li>
                            <li class="main-menu-item"><a href="feedback.html" class="main-menu-link">Обратная связь</a></li>
                        </ul>
                        <div class="menu-contacts">
                            <header class="contacts-panel-header">
                                <h3 class="contacts-header-text">Контакты</h3>
                            </header>
                            <ul class="contacts-panel-inner">
                                <li class="contacts-panel-item">
                                    <a href="mailto:zoryana.petrova@gmail.com" class="contacts-panel-link image-post">
                                        zoryana.petrova
                                    </a>                                                        
                                </li>
                                <li class="contacts-panel-item">
                                    <a href="tel:+380507193028" class="contacts-panel-link image-phone">
                                        +380507193028
                                    </a>
                                </li>
                                <li class="contacts-panel-item">
                                    <a href="skype:zoryana_83?call" class="contacts-panel-link image-skype">
                                        zoryana_83
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <div class="page-content">
                        <div class="content-panel panel">
                            <header class="content-panel-header">
                                <h3 class="panel-header">Мои работы</h3> 
                            </header>
                            <div class="content-panel-inner">
                                <ul class="projects-list">
                                    <li class="projects-item">  
                                        <div class="item-content-wrapper">
                                            <div class="projects-item-content">
                                                <a href="http://wtm24.com/" target="_blank" class="projcts-image-wrapper">
                                                    <img src="images/WTM24.png" alt="WTM24" class="projects-image">
                                                </a>
                                            </div>
                                            <a href="http://wtm24.com/" class="project-link" target="_blank">wtm24.com</a>
                                            <p class="project-text">
                                                WTM24 – система автоматизации твоего бизнеса. Предоставляет аналитику для всесторонней оценки деятельности компании
                                            </p>
                                        </div>
                                    </li>
                                    <li class="projects-item">  
                                        <div class="item-content-wrapper">
                                            <div class="projects-item-content">
                                                <a href="http://xn--80acedik6ancec1c.xn--p1ai/" target="_blank" class="projcts-image-wrapper">
                                                    <img src="images/for_projects2.png" alt="project_1" class="projects-image">
                                                </a>
                                            </div>
                                            <a href="http://xn--80acedik6ancec1c.xn--p1ai/" class="project-link" target="_blank">домгазобетон.рф</a>
                                            <p class="project-text">
                                                Продающая страница для компании ledenland.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="projects-item">  
                                        <div class="item-content-wrapper">
                                            <div class="projects-item-content">
                                                <a href="http://crmconsulting.biz/" target="_blank" class="projcts-image-wrapper">
                                                    <img src="images/for_projects3.png" alt="project_3" class="projects-image">
                                                </a>
                                            </div>
                                            <a href="http://crmconsulting.biz/" class="project-link" target="_blank">crmconsulting.biz</a>
                                            <p class="project-text">
                                                Лендинг компании «СRM Consulting» специализирующейся на точной настройке Битрикс24 под бизнес.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="projects-item">  
                                        <div class="item-content-wrapper">
                                            <div class="projects-item-content">
                                                <a href="http://landingsloft.ru/" target="_blank" class="projcts-image-wrapper">
                                                    <img src="images/for_projects4.png" alt="project_4" class="projects-image">
                                                </a>
                                            </div>
                                            <a href="http://landingsloft.ru/" class="project-link" target="_blank">landingsloft.ru</a>
                                            <p class="project-text">
                                                Сайт по услугам разработки продающих лендингов.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="projects-item">  
                                        <div class="item-content-wrapper">
                                            <div class="projects-item-content">
                                                <a href="http://yasnow.biz/"  target="_blank" class="projcts-image-wrapper">
                                                    <img src="images/for_projects5.png" alt="project_5" class="projects-image">
                                                </a>
                                            </div>
                                            <a href="http://yasnow.biz/" class="project-link" target="_blank">yasnow.biz</a>
                                            <p class="project-text">
                                                Landing page по продажи франшизы снежного бизнеса
                                            </p>
                                        </div>
                                    </li>
                                    <li class="projects-item">  
                                        <div class="item-content-wrapper">
                                            <a href="#" id="add-new-project" class="add-project">Добавить проект</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="popup-page" class="popup-page">
            <header class="form-popup-header">
                <h4 class="popup-header-text">Добавление проекта</h4>
            </header>
            <div class="form-popup-wpapper">
                <button type="button" class="popup-window-close b-close"></button>
                <form action="upload.php" enctype="multipart/form-data" method="post" id="add-project" class="portfolio-form">
                    <div class="message ms-error">
                        <h3 class="message-header">Ошибка!</h3>
                        <p class="message-text error-text">Попробуйте еще раз, что-то идет не так !</p>
                    </div>
                    <div class="message ms-succes">
                        <h3 class="message-header">Отлично!</h3>
                        <p class="message-text succes-text">Ваш проект успешно добавлен!</p>
                    </div>
                    <div class="input-wrapper">
                        <label for="project-name" class="form-label">Название проекта</label>
                        <input placeholder="Введите название" id="project-name" name="project-name" class="form-input" type="text" qtip-content="введите название">
                    </div>  
                    <div class="input-wrapper add-image-wrapper">
                        <label for="add-project-input" class="form-label add-image" qtip-content="изображение">Загрузите и изображение</label>
                        <input  id="add-project-input" type="file" name="upload" class="form-input add-project-input"  qtip-content="изображение" placeholder="Загрузите и изображение">
                    </div>  
                    <div class="input-wrapper">
                        <label for="add-project-url" class="form-label">URL проекта</label>
                        <input id="add-project-url" name="add-project-url "class="form-input add-project-url" type="text" placeholder="Добавьте ссылку" qtip-content="ссылка на проект">
                    </div>
                    <div class="input-wrapper textarea-wrapper">
                        <label for="project-textarea" class="form-label">Описание</label>
                        <textarea id="project-textarea" name="project-textarea" class="add-project-textarea" cols="5" rows="5" placeholder="Пара слов о Вашем проекте" qtip-content="описание проекта"></textarea>
                    </div>
                    <div class="form-button-wrapper">
                        <input type="submit" value="Добавить" class="add-project-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="site-footer-section">
        <div class="container">
            <div class="footer-inner clearfix">
                <a href="autorization.html" class="footer-icon">
                    Вход
                </a>
                <span class="footer-item">
                    &copy;2016. Это мой сайт, пожалуйста, не копируйте и не воруйте его.
                </span>
            </div>
        </div>
    </footer>

    <script src="bower/jquery/jquery.js"></script>
    <script src="bower/bPopup/jquery.bpopup.js"></script>
    <script src="bower/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="js/main.js"></script>  
    <script src="js/jquery.easing.1.3.js"></script>
    <script src ="bower/qtip2/jquery.qtip.js"></script>
    <script src="js/add_project.js"></script>
    <script src="js/validation.js"></script>
</body>
</html>


