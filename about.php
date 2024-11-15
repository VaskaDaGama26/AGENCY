<?php
require_once 'vendor/db_connect.php';
session_start();
?>

<html lang="ru">
    <head>
        <title>О компании</title>
        <link rel="stylesheet" href="css/header.css"./>
        <link rel="stylesheet" href="css/footer.css"./>
        <link rel="stylesheet" href="css/style.css"./>
        <link rel="stylesheet" href="css/three.css"./>
        <link rel="stylesheet" href="css/slider.css"./>
        <link rel="stylesheet" href="css/dropdown.css"./>
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
                                <li><a href="#" class="menu__link active">О компании</a></li>
                                <li><a href="contacts.php" class="menu__link">Контакты</a></li>
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

                <div class="slides fade">
                    <img src="img/about.jpg" style="width:100%">
                </div>
                
                    <h2 class="under__title">Брендинг с фокусом на эффективность</h2>
                    <div class="content">
                        <div class="container">
                            <div class="content__text">
                                <article class="columns-2">
                                    <p class="about__text">Мы берем на себя бренд-консалтинг, позиционирование, разработку торгового названия, 
                                    дизайн упаковки для товаров повседневного спроса, а также создание фирменного стиля. В основе каждого проекта 
                                    мы делаем фокус на коммерческую эффективность бренда.
                                    </p>
                                    <p class="about__text">
                                    AGENCY является ведущим брендинговым агентством в РФ — среди проектов представлены крупные региональные и
                                    федеральные производители из 57 регионов России в различных ценовых сегментах и категориях продуктов.
                                    </p>
                                </article>
                            </div>
                        </div>
                    </div>
                    <h2 class="under__title">Почему нас выбирают</h2>
                    <div class="content">
                        <div class="container">
                            <div class="content__text">
                                <dl>
                                    <dt class="content__reason"><b>1. Отличие</b></dt>
                                        <dd class="content__reason__info">Создаем проекты в основе которых не только креативное решение, 
                                        но и позиционирование.</dd>
                                    <dt class="content__reason"><b>2. Процесс</b></dt>
                                        <dd class="content__reason__info">Имеем максимально отлаженные и прозрачные процессы для ускорения 
                                        реализации проекта.</dd>
                                    <dt class="content__reason"><b>3. Погружение</b></dt>
                                        <dd class="content__reason__info">Принимаем во внимание ваше видение, проводим аудит предпочтений 
                                        конечного покупателя.</dd>
                                </dl>
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