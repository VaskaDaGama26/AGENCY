<?php

if ($_SESSION['user']['role'] == 'Сотрудник') {
    header('Location: ../index.php');
}
elseif ($_SESSION['user']['role'] == 'Администратор') {
    header('Location: ../index.php');
}

session_start();
require_once '../vendor/db_connect.php';
$userId = $_SESSION['user']['id'];
?>

<html style="user-select: auto;" lang="ru">
    <head>
        <title>Заказы</title>
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
                                <li><div class="dropdown"><a href="account.php" class="menu__auth active">Личный кабинет</a>
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

            <h2 class="under__title">Заказы</h2>
            <button class="back__button"><a href="javascript:history.back()">Назад</a></button>
            <?php 
            $sqlHas = "SELECT Orders_ID FROM `Has` WHERE Users_ID = $userId";
            $resultHas = $connect->query($sqlHas);

            if ($resultHas->num_rows > 0) {
                $ordersIds = [];
                while ($row = $resultHas->fetch_assoc()) {
                    $ordersIds[] = $row['Orders_ID'];
                }

                // Преобразование массива Orders_ID в строку для использования в SQL запросе
                $ordersIdsStr = implode(',', array_map('intval', $ordersIds));

                // Подготовка и выполнение запроса для получения записей из таблицы orders
                $sqlOrders = "SELECT * FROM `Orders` WHERE Orders_ID IN ($ordersIdsStr) ORDER BY 
                            CASE 
                                WHEN Orders_Status = 'Новый' THEN 1 
                                WHEN Orders_Status = 'В работе' THEN 2 
                                WHEN Orders_Status = 'Исполнен' THEN 3 
                                ELSE 4 
                            END, Orders_ID DESC";

                $resultOrders = $connect->query($sqlOrders);

                // Вывод всех записей
                if ($resultOrders->num_rows > 0) {
                ?>
                    <table>
                        <thead>
                        <tr>
                            <!--<th class="table__header">Номер</th>-->
                            <th class="table__header">Наименование</th>
                            <th class="table__header">Сумма</th>
                            <th class="table__header">Статус</th>
                            <th class="table__header"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($order = $resultOrders->fetch_assoc()) {
                            ?>
                            <tr class="tr__row">
                                <!--<td><?php echo $order['Orders_ID']; ?></td>-->
                                <td><?php echo $order['Orders_Title']; ?></td>
                                <td><?php echo $order['Orders_Price']; ?> руб.</td>
                                <td><?php echo $order['Orders_Status']; ?></td>
                                <td><a href="#" class="download_invoice" data-order-id="<?php echo $order['Orders_ID']; ?>">Скачать счёт</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo "Нет заказов для отображения.";
            }
        } else {
            echo "Нет заказов для отображения.";
        }
        ?>

            </div>
            </main>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
            <script src="/js/order_pdf.js"></script>

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