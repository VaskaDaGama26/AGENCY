<?php
require_once '../vendor/db_connect.php';
session_start();
if ($_SESSION['user']['role'] != 'Администратор') {
    header('Location: ../index.php');
}
?>

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
        <link rel="stylesheet" href="/css/modal.css"./>
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
                                <li><div class="dropdown"><a href="admin_panel.php" class="menu__auth active">Личный кабинет</a>
                                        <div class="dropdown__content">
                                            <a href="/profile.php">Мой профиль</a>
                                            <a href="admin_base.php">База данных</a>
                                            <a href="admin_orders.php">Заказы</a>
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
                        <table id="sectionServ">
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Услуги</th>
                                    <th class="table__header"></th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-add"><a onclick="openModal2()">Добавить</a></button></th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-delete"></button></th>
                                </tr>
                            </thead>
                            <form action='/vendor/delete_row.php' method='POST'>
                                <tbody>
                                    <?php $result = mysqli_query($connect, "SELECT * FROM `Services`"); 
                                    while ($serv = mysqli_fetch_assoc($result)) { ?>
                                        <tr class="tr__row">
                                            <td class="img__col"><?php echo '<img class="three-block__img"' . 'src="data:image/jpg;base64,'. 
                                            base64_encode($serv['Services_Img']) . '"alt="Картинка">';?></td>
                                            <td><?php echo '<a>'. $serv['Services_Name'] . '</a>';?></td>
                                            <td>
                                                <div class="three-block__rating">
                                                    <ul class="rating">
                                                        <?php for ($i = 0; $i < $serv['Services_Rate']; $i++)
                                                        {
                                                            echo '<li><ion-icon name="star"></ion-icon></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td><?php echo '<a>'. $serv['Services_Price'] . ' руб.</a>';?></td>
                                            <td><button class="delete_button" name="serv_id" value="<?php echo $serv['Services_ID'];?>"><span class="delete-icon"></span></button></td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </form>
                        </table>

                        <!--НОВОСТИ-->
                        <table id="sectionNews">
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Новости</th>
                                    <th class="table__header"></th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-add"><a onclick="openModal1()">Добавить</a></button></th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-delete"></button></th>
                                </tr>
                            </thead>
                            <form action='/vendor/delete_row.php' method='POST'>
                                <tbody class="tbody_news">
                                    <?php $result = mysqli_query($connect, "SELECT * FROM `News`");
                                    while ($news = mysqli_fetch_assoc($result)) { ?> 

                                        <tr class="tr__row">
                                            <td class="img__col"><?php echo '<img ' . 'src="data:image/jpg;base64,'. base64_encode($news['News_Image']) . '"alt="Картинка">';?></td>
                                            <td><?php echo $news['News_Title'];?></td>
                                            <td><?php echo $news['News_Date'];?></td>
                                            <td><button class="delete_button" name="news_id" value="<?php echo $news['News_ID'];?>"><span class="delete-icon"></span></button></td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </form>
                        </table>
                    
                        <!--ПОРТФОЛИО-->
                        <table id="sectionPort">
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Портфолио</th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-add"><a onclick="openModal()">Добавить</a></button></th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-delete"></button></th>
                                </tr>
                            </thead>
                            
                            <form action='/vendor/delete_row.php' method='POST'>
                                <tbody class="tbody_port">
                                    <?php $result = mysqli_query($connect, "SELECT * FROM `Portfolio`");
                                    while ($port = mysqli_fetch_assoc($result)) { ?> 

                                    <tr class="tr__row">
                                        <td class="img__col"><?php echo '<img ' . 'src="data:image/jpg;base64,'. base64_encode($port['Portfolio_Image']) . '"alt="Картинка">';?></td>
                                        <td><?php echo $port['Portfolio_Category'];?></td>
                                        <td><button class="delete_button" name="port_id" value="<?php echo $port['Portfolio_ID'];?>"><span class="delete-icon"></span></button></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </form>
                        </table>
                        

                        <!--Пользователи-->
                        <?php
                        if ($_SESSION['message']) {
                            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                        }
                        unset($_SESSION['message']);
                        ?>
                        <table id="sectionUsers">
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Пользователи</th>
                                    <th class="table__header"></th>
                                    <th class="table__header"></th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-delete"></button></th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-add"><a onclick="openModal3()">Добавить</a></button></th>
                                </tr>
                            </thead>
                            <form action='/vendor/delete_row.php' method='POST'>
                                <tbody>
                                    <tr class="tr__row">
                                        <?php $result = mysqli_query($connect, "SELECT * FROM `Users`");
                                        while ($users = mysqli_fetch_assoc($result)) { ?> 
                                        <td class="img__col"><img src="/img/user.svg"></td>
                                        <td><?php echo $users['Users_Name'];?></td>
                                        <td><?php echo $users['Users_Login'];?></td>
                                        <td><?php echo $users['Users_Email'];?></td>
                                        <td><?php echo $users['Users_Role'];?></td>
                                        <?php if ($users['Users_Role'] != 'Администратор'){ ?>
                                            <td><button class="delete_button" name="users_id" value="<?php echo $users['Users_ID'];?>"><span class="delete-icon"></span></button></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </form>
                        </table>

                        <div id="PortModal" class="modal">
                            <!-- Контент модального окна ПОРТФОЛИО-->
                            <div class="modal_content">
                                <span class="close" onclick="closeModal()">&times;</span>
                                <h2>Новая запись</h2>
                                <form id="portForm" action="/vendor/add_port.php" method="post" enctype="multipart/form-data">
                                    <label for="portCategory">Категория</label><br><br>
                                    <select name="portCategory" id="portCategory">
                                        <option value="Наружная и интерьерная реклама">Наружная и интерьерная реклама</option>
                                        <option value="Вентилируемые фасады">Вентилируемые фасады</option>
                                    </select><br><br>
                                    <label for="portImg">Изображение</label><br><br>
                                    <input id="portImg" name="portImg" type="file" accept=".jpg"/><br><br>
                                    <div class="modal_button"><button name='upload' type="submit">Применить</button></div>
                                </form>
                            </div>
                        </div>
                        <div id="NewsModal" class="modal">
                            <!-- Контент модального окна НОВОСТИ-->
                            <div class="modal_content">
                                <span class="close" onclick="closeModal1()">&times;</span>
                                <h2>Новая запись</h2>
                                <form id="newsForm" action="/vendor/add_news.php" method="post" enctype="multipart/form-data">
                                    <label for="newsText">Текст</label><br><br>
                                    <input id="newsText" name="newsText" type="text"/><br><br>
                                    <label for="newsImg">Изображение</label><br><br>
                                    <input id="newsImg" name="newsImg" type="file" accept=".jpg"/><br><br>
                                    <div class="modal_button"><button name='upload' type="submit">Применить</button></div>
                                </form>
                            </div>
                        </div>
                        <div id="ServModal" class="modal">
                            <!-- Контент модального окна УСЛУГИ-->
                            <div class="modal_content">
                                <span class="close" onclick="closeModal2()">&times;</span>
                                <h2>Новая запись</h2>
                                <form id="servForm" action="/vendor/add_serv.php" method="post" enctype="multipart/form-data">
                                    <label for="servText">Название</label><br><br>
                                    <input id="servText" name="servText" type="text"/><br><br>
                                    <label for="servImg">Изображение</label><br><br>
                                    <input id="servImg" name="servImg" type="file" accept=".jpg"/><br><br>
                                    <label for="servPrice">Цена</label><br><br>
                                    <input type="number" step="0.01" name="servPrice" id="servPrice"><br><br>
                                    <label for="servRate">Рейтинг</label><br><br>
                                    <input type="number" id="servRate" name="servRate" min="1" max="5"><br><br>
                                    <div class="modal_button"><button name='upload' type="submit">Применить</button></div>
                                </form>
                            </div>
                        </div>
                        <div id="UserModal" class="modal">
                            <!-- Контент модального окна ПОЛЬЗОВАТЕЛИ (ДОБАВИТЬ)-->
                            <div class="modal_content">
                                <span class="close" onclick="closeModal3()">&times;</span>
                                <h2>Новая запись</h2>
                                <form id="userForm" action="/vendor/add_user.php" method="post" enctype="multipart/form-data">
                                    <label for="userName">ФИО</label><br><br>
                                    <input type="text" name="userName" id="userName"><br><br>
                                    <label for="userLogin">Логин</label><br><br>
                                    <input class="input" type="text" name="userLogin" id="userLogin"><br><br>
                                    <label for="userMail">Почта</label><br><br>
                                    <input class="input" type="mail" name="userMail" id="userMail"><br><br>
                                    <label for="userPass">Пароль</label><br><br> 
                                    <input class="input" type="password" name="userPass" id="userPass"><br><br>
                                    <label for="userConf">Подтвердите пароль</label><br><br>
                                    <input class="input" type="password" name="userConf" id="userConf"><br><br>
                                    <label for="userRole">Тип пользователя</label><br><br>
                                    <select name="userRole" id="userRole">
                                        <option value="Клиент">Клиент</option>
                                        <option value="Сотрудник">Сотрудник</option>
                                        <option value="Администратор">Администратор</option>
                                    </select><br><br>
                                    <div class="modal_button"><button name='upload' type="submit">Применить</button></div>
                                </form>
                            </div>
                        </div>
                        <!--
                        <div id="UserModal1" class="modal">
                             Контент модального окна ПОЛЬЗОВАТЕЛИ (ИЗМЕНИТЬ)
                            <div class="modal_content">
                                <span class="close" onclick="closeModal4()">&times;</span>
                                <h2>Новая запись</h2>
                                <form id="userForm" action="/vendor/add_user.php" method="post" enctype="multipart/form-data">
                                    <label for="userName">ФИО</label><br><br>
                                    <input type="text" name="userName" id="userName"><br><br>
                                    <label for="userLogin">Логин</label><br><br>
                                    <input class="input" type="text" name="userLogin" id="userLogin"><br><br>
                                    <label for="userMail">Почта</label><br><br>
                                    <input class="input" type="mail" name="userMail" id="userMail"><br><br>
                                    <label for="userPass">Пароль</label><br><br> 
                                    <input class="input" type="password" name="userPass" id="userPass"><br><br>
                                    <label for="userConf">Подтвердите пароль</label><br><br>
                                    <input class="input" type="password" name="userConf" id="userConf"><br><br>
                                    <label for="userRole">Тип пользователя</label><br><br>
                                    <select name="userRole" id="userRole">
                                        <option value="Клиент">Клиент</option>
                                        <option value="Сотрудник">Сотрудник</option>
                                    </select><br><br>
                                    <div class="modal_button"><button name='upload' type="submit">Применить</button></div>
                                </form>
                            </div>
                        </div>-->

                    <script src="/js/pass_modal.js"></script>
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
    
