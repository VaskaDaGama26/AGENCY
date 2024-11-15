<?php
if ($_SESSION['user']['role'] == 'Сотрудник') {
    header('Location: ../index.php');
}
elseif ($_SESSION['user']['role'] == 'Администратор') {
    header('Location: ../index.php');
}
?>
<html lang="ru">
    <head>
        <title>Личный кабинет</title>
        <link rel="stylesheet" href="/css/header.css"./>
        <link rel="stylesheet" href="/css/footer.css"./>
        <link rel="stylesheet" href="/css/style.css"./>
        <link rel="stylesheet" href="/css/three.css"./>
        <link rel="stylesheet" href="/css/slider.css"./>
        <link rel="stylesheet" href="/css/dropdown.css"./>
        <link rel="stylesheet" href="/css/account.css"./>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="/img/shortcut_icon.png"/>
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
                                <li><div class="dropdown"><a href="#" class="menu__auth active">Личный кабинет</a>
                                        <div class="dropdown__content">
                                            <a href="/profile.php">Мой профиль</a>
                                            <a href="basket.php">Корзина</a>
                                            <a href="orders.php">Заказы</a>
                                        </div>   
                                    </div> 
                                </li>
                                <li><a href="/vendor/logout.php" class="menu__auth">Выйти</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            <main class="page">
                <div class="container">

                    <h2 class="under__title">Личный кабинет</h2>
                    <button class="back__button"><a href="javascript:history.back()">Назад</a></button>

                    <div class="three-block">
                        <div class="three-block__row">
                            <div class="three-block__column">
                                <div class="three-block__item__logo">
                                    <div class="three-block__image">
                                        <a href="/profile.php"><img class="three-block__img" src="/img/profile.png" alt="Картинка"></a>
                                    </div>
                                </div>
                                <div class="three-block__item__logo">
                                    <div class="three-block__image">
                                        <a href="basket.php"><img class="three-block__img" src="/img/basket.png" alt="Картинка"></a>
                                    </div>
                                </div>
                                <div class="three-block__item__logo">
                                    <div class="three-block__image">
                                        <a href="orders.php"><img class="three-block__img" src="/img/orders.png" alt="Картинка"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
</html>