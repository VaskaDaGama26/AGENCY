<html lang="ru">
    <head>
        <title>База данных</title>
        <link rel="stylesheet" href="/css/header.css"./>
        <link rel="stylesheet" href="/css/footer.css"./>
        <link rel="stylesheet" href="/css/style.css"./>
        <link rel="stylesheet" href="/css/three.css"./>
        <link rel="stylesheet" href="/css/slider.css"./>
        <link rel="stylesheet" href="/css/dropdown.css"./>
        <link rel="stylesheet" href="/css/table.css"./>
        <link rel="stylesheet" href="/css/delete_icon.css"./>
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
                                <li><div class="dropdown"><a href="worker_panel.php" class="menu__auth active">Личный кабинет</a>
                                        <div class="dropdown__content">
                                            <a href="/profile.php">Мой профиль</a>
                                            <a href="admin_base.php">Администрирование</a>
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
                    
                    <h2 class="under__title">База данных</h2>
                    <button class="back__button"><a href="javascript:history.back()">Назад</a></button>

                        <!--УСЛУГИ-->
                        <table>
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Услуги</th>
                                    <th class="table__header"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Можжевельник чешуйчатый Блю Стар C2 Цветы Юга</td>
                                    <td>
                                        <div class="three-block__rating">
                                            <ul class="rating">
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star-half"></ion-icon></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>125,12 руб.</td>
                                </tr>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Можжевельник чешуйчатый Блю Стар C2 Цветы Юга</td>
                                    <td>
                                        <div class="three-block__rating">
                                            <ul class="rating">
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star-half"></ion-icon></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>125,12 руб.</td>
                                </tr>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Можжевельник чешуйчатый Блю Стар C2 Цветы Юга</td>
                                    <td>
                                        <div class="three-block__rating">
                                            <ul class="rating">
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star"></ion-icon></li>
                                                <li><ion-icon name="star-half"></ion-icon></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>125,12 руб.</td>
                                </tr>
                            </tbody>
                        </table>

                        <!--НОВОСТИ-->
                        <table>
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Новости</th>
                                    <th class="table__header"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Лывлато ывалвыда выаоы</td>
                                    <td>21.01.2024</td>
                                </tr>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Лывлато ывалвыда выаоы</td>
                                    <td>21.01.2024</td>
                                </tr>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Лывлато ывалвыда выаоы</td>
                                    <td>21.01.2024</td>
                                </tr>
                            </tbody>
                        </table>

                        <!--ПОРТФОЛИО-->
                        <table>
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Портфолио</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Наружная реклама</td>
                                </tr>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Наружная реклама</td>
                                </tr>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/image1.png"></td>
                                    <td>Наружная реклама</td>
                                </tr>
                            </tbody>
                        </table>

                        <!--Пользователи-->
                        <table>
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Пользователи</th>
                                    <th class="table__header"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/user.svg"></td>
                                    <td>Тест Тест Тест</td>
                                    <td>Логин</td>
                                    <td>jdc@df.ru</td>
                                    <td>Клиент</td>
                                </tr>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/user.svg"></td>
                                    <td>Тест Тест Тест</td>
                                    <td>Логин</td>
                                    <td>jdc@df.ru</td>
                                    <td>Сотрудник</td>
                                </tr>
                                <tr class="tr__row">
                                    <td class="img__col"><img src="/img/user.svg"></td>
                                    <td>Тест Тест Тест</td>
                                    <td>Логин</td>
                                    <td>jdc@df.ru</td>
                                    <td>Клиент</td>
                                </tr>
                            </tbody>
                        </table>

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
    
