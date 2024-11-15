<?php
require_once 'vendor/db_connect.php';
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>

<html lang="ru">
    <head>
        <title>Мой профиль</title>
        <link rel="stylesheet" href="/css/header.css"./>
        <link rel="stylesheet" href="/css/footer.css"./>
        <link rel="stylesheet" href="/css/style.css"./>
        <link rel="stylesheet" href="/css/three.css"./>
        <link rel="stylesheet" href="/css/slider.css"./>
        <link rel="stylesheet" href="/css/dropdown.css"./>
        <link rel="stylesheet" href="/css/account.css"./>
        <link rel="stylesheet" href="/css/modal.css"./>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="img/shortcut_icon.png"/>
    </head>
    <body>
        <div class="wrapper">
            <header id="section1" class="header">
                <div class="container">
                    <div class="header__row">
                        <a href="/index.php"><img src="/img/logo1.png" class="header__logo"></a>
                        <nav class="menu__body">
                            <ul class="menu__list">
                                <li><a href="/index.php" class="menu__link">Главная</a></li>
                                <li><a href="/news.php" class="menu__link">Новости</a></li>
                                <li><a href="/services.php" class="menu__link">Услуги</a></li>
                                <li><div class="dropdown"><a href="/portfolio.php" class="menu__link">Портфолио</a>
                                        <div class="dropdown__content">
                                            <a href="/portfolio.php#port1">Наружная и интерьерная реклама</a>
                                            <a href="/portfolio.php#port2">Вентилируемые фасады</a>
                                        </div>   
                                    </div> 
                                </li>
                                <li><a href="/about.php" class="menu__link">О компании</a></li>
                                <li><a href="/contacts.php" class="menu__link">Контакты</a></li>
                                <?php
                                    if(!$_SESSION['user']) {
                                        echo '<li><a href="vendor/log_in.php" class="menu__auth">Войти</a></li>';
                                        echo '<li><a href="vendor/sign_in.php" class="menu__auth">Зарегистрироваться</a></li>';
                                    }
                                    else {
                                        echo '<li><div class="dropdown">';
                                        if($_SESSION['user']['role'] == "Клиент"){
                                            echo '<a href="account/account.php" class="menu__auth active">Личный кабинет</a>';
                                        }
                                        elseif($_SESSION['user']['role'] == "Администратор"){
                                            echo '<a href="admin_panel/admin_panel.php" class="menu__auth active">Личный кабинет</a>';
                                        }
                                        else{
                                            echo '<a href="worker_panel/worker_panel.php" class="menu__auth active">Личный кабинет</a>';
                                        }   
                                        echo'<div class="dropdown__content">';
                                            if($_SESSION['user']['role'] == "Клиент"){
                                                echo '<a href="profile.php">Мой профиль</a>
                                                        <a href="account/basket.php">Корзина</a>
                                                        <a href="account/orders.php">Заказы</a></div></div></li>';
                                            }
                                            elseif($_SESSION['user']['role'] == "Администратор"){
                                                echo '<a href="profile.php">Мой профиль</a>
                                                        <a href="admin_panel/admin_base.php">База данных</a>
                                                        <a href="admin_panel/admin_orders.php">Заказы</a></div></div></li>';
                                            }
                                            else{
                                                echo '<a href="profile.php">Мой профиль</a>
                                                        <a href="worker_panel/worker_base.php">База данных</a></div></div></li>';
                                            }
                                        echo '<li><a href="vendor/logout.php" class="menu__auth">Выйти</a></li>';
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            <main class="page">
                <div class="container">

                    <h2 class="under__title">Мой профиль</h2>
                    <button class="back__button"><a href="javascript:history.back()">Назад</a></button>

                    <div class="avatar"><img class="avatar__image" src="/img/user.svg"></div>
                    <div class="rubric__title acc">ФИО</div>
                    <div class="rubric__title"><?=$_SESSION['user']['full_name']?></div>
                    <div class="rubric__title acc">Логин</div>
                    <div class="rubric__title"><?=$_SESSION['user']['login']?></div>
                    <div class="rubric__title acc">E-mail</div>
                    <div class="rubric__title"><?=$_SESSION['user']['email']?></div>
                    <div class="rubric__title acc">Роль</div>
                    <div class="rubric__title"><?=$_SESSION['user']['role']?></div>
                    <div class="rubric__title btn"><a onclick="openModal5()">Сменить пароль</a></div>
                    <?php
                        if ($_SESSION['message']) {
                            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                        }
                        unset($_SESSION['message']);
                    ?>
                
                    <div id="ChangePassModal" class="modal">
                        <!-- Контент модального окна -->
                        <div class="modal_content">
                            <span class="close" onclick="closeModal5()">&times;</span>
                            <h2>Изменить пароль</h2>
                            <form id="passwordForm" action="vendor/changepass_db.php" method="post">
                                <label for="currentPassword">Нынешний пароль:</label><br>
                                <input type="password" id="currentPassword" name="currentPassword"><br><br>
                                <label for="newPassword">Новый пароль:</label><br>
                                <input type="password" id="newPassword" name="newPassword"><br><br>
                                <label for="confirmPassword">Подвердите пароль:</label><br>
                                <input type="password" id="confirmPassword" name="confirmPassword"><br><br>
                                <div class="modal_button"><button type="submit">Сменить пароль</button></div>
                            </form>
                        </div>
                    </div>

                    <script src="js/pass_modal.js"></script>
                </div>
            </main>

            <footer class="footer">
                <div class="container">
                    <nav class="footer__body">
                        <ul class="footer__list">
                            <li class="title"><a href="" class="footer__link">2023-2024 © AGENCY брендинговое агентство. Россия, Липецк, ул. Московская, 30,<br>
                            Использование материалов сайта разрешено только&nbsp;с указанием авторства и обратной ссылкой на
                            оригинал.</a></li>
                            <li><a href="#section1" class="footer__link button">Наверх</a></li>
                        </ul>
                    </nav>
                </div>
            </footer>

        </div>
    </body>