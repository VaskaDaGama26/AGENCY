<?php
require_once 'vendor/db_connect.php';
session_start();
?>

<html lang="ru">
    <head>
        <title>Контакты</title>
        <link rel="stylesheet" href="css/header.css"./>
        <link rel="stylesheet" href="css/footer.css"./>
        <link rel="stylesheet" href="css/style.css"./>
        <link rel="stylesheet" href="css/three.css"./>
        <link rel="stylesheet" href="css/slider.css"./>
        <link rel="stylesheet" href="css/dropdown.css"./>
        <link rel="stylesheet" href="css/contacts.css"./>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="img/shortcut_icon.png"/>
    </head>
    <body>
        <div class="wrapper">
            <header id="section1" class="header">
                <div class="container">
                    <div class="header__row">
                        <a href="index.php"><img src="/img/logo1.png" class="header__logo"></a>
                        <nav class="menu__body">
                            <ul class="menu__list">
                                <li><a href="index.php" class="menu__link">Главная</a></li>
                                <li><a href="news.php" class="menu__link">Новости</a></li>
                                <li><a href="services.php" class="menu__link">Услуги</a></li>
                                <li><div class="dropdown"><a href="portfolio.php" class="menu__link">Портфолио</a>
                                        <div class="dropdown__content">
                                            <a href="portfolio.php#port1">Наружная и интерьерная реклама</a>
                                            <a href="portfolio.php#port2">Вентилируемые фасады</a>
                                        </div>   
                                    </div> 
                                </li>
                                <li><a href="about.php" class="menu__link">О компании</a></li>
                                <li><a href="#" class="menu__link active">Контакты</a></li>
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

                    <h2 class="under__title">Контакты</h2>

                    <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/9/lipetsk/?utm_medium=mapframe&utm_source=maps" 
                    style="color:#eee;font-size:12px;position:absolute;top:0px;">Липецк</a>
                    <a href="https://yandex.ru/maps/9/lipetsk/house/ulitsa_s_f_balmochnykh_vl11/Z0AYcw9mTEwHQFtofXpweHVlYA==/?from=mapframe&ll=39.586590%2C52.619964&utm_medium=mapframe&utm_source=maps&z=16" 
                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица С.Ф. Балмочных, вл11 — Яндекс Карты</a>
                    <iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=39.586590%2C52.619964&mode=whatshere&whatshere%5Bpoint%5D=39.586590%2C52.619964&whatshere%5Bzoom%5D=17&z=16" 
                    width="1200" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
                    
                    <ul class="contacts">
                        <li class="contacts__item">
                            <div class="contacts__container">
                                <a class="contacts__link" href="https://yandex.ru/maps/9/lipetsk/house/ulitsa_s_f_balmochnykh_vl11/Z0AYcw9mTEwHQFtofXpweHVlYA==/?from=mapframe&ll=39.586590%2C52.619964&utm_medium=mapframe&utm_source=maps&z=16">
                                    <ion-icon class="contacts__icon" name="navigate-outline"></ion-icon>
                                </a>
                                <div class="contacts__info">ул. Балмочных, владение 11, офис 3-14, 3-15</div>
                            </div>
                        </li>
                        <li class="contacts__item">
                            <div class="contacts__container">
                                <a class="contacts__link" href="mailto:example@example.com">
                                    <ion-icon class="contacts__icon" name="mail-open-outline"></ion-icon>
                                </a>
                                <div class="contacts__info">example@example.com</div>
                            </div>
                        </li>
                        <li class="contacts__item">
                            <div class="contacts__container">
                                <a class="contacts__link" href="tel:+7(4742)**-**-**">
                                    <ion-icon class="contacts__icon" name="call-outline"></ion-icon>
                                </a>
                                <div class="contacts__info">+7(4742)12-12-12</div>
                            </div>
                        </li>
                    </ul>

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
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>