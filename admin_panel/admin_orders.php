<?php
session_start();
require_once '../vendor/db_connect.php';
if ($_SESSION['user']['role'] != 'Администратор') {
    header('Location: ../index.php');
}

// Запросы на получение данных из базы данных
$sqlOrdersNew = "SELECT * FROM `Orders` WHERE Orders_Status = 'Новый'";
$sqlOrdersWorks = "SELECT * FROM `Orders` WHERE Orders_Status = 'Обработан'";
$sqlOrdersProcessed = "SELECT * FROM `Orders` WHERE Orders_Status = 'Исполнен'";
$sqlTeams = "SELECT * FROM `Teams`";

$resultOrdersNew = $connect->query($sqlOrdersNew);
$sqlOrdersWorks = $connect->query($sqlOrdersWorks);
$resultOrdersProcessed = $connect->query($sqlOrdersProcessed);
$resultTeams = $connect->query($sqlTeams);

if (!$resultOrdersNew || !$resultOrdersProcessed || !$resultTeams) {
    die("Ошибка выполнения запроса: " . mysqli_error($connect));
}
?>

<html style="user-select: auto;" lang="ru">
    <head>
        <title>Заказы агентства</title>
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

            <h2 class="under__title">Заказы агентства</h2>
            <button class="back__button"><a href="javascript:history.back()">Назад</a></button>

            <!-- Таблица для новых заказов -->
            <h1 class="main__title">Новые</h1>
            <table>
                <thead>
                    <tr>
                        <!--<th class="table__header">Номер заказа</th>-->
                        <th class="table__header">Наименование</th>
                        <th class="table__header">Сумма</th>
                        <th class="table__header">Команда</th>
                        <th class="table__header"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultOrdersNew->num_rows > 0) {
                        while ($order = $resultOrdersNew->fetch_assoc()) { ?>
                            <tr class="tr__row">
                                <!--<td><?php echo $order['Orders_ID']; ?></td>-->
                                <td><?php echo $order['Orders_Title']; ?></td>
                                <td><?php echo $order['Orders_Price']; ?> руб.</td>
                                <td><?php echo $order['Teams_ID']; ?></td>
                                <td><button class="basket__button orders basket-add"><a onclick="openEditModal(<?php echo $order['Orders_ID']; ?>)">Изменить</a></button></td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
            </table>

            <!-- Таблица для обработанных заказов -->
            <h1 class="main__title">Обработанные</h1>
            <table>
                <thead>
                    <tr>
                        <!--<th class="table__header">Номер заказа</th>-->
                        <th class="table__header">Наименование</th>
                        <th class="table__header">Сумма</th>
                        <th class="table__header">Команда</th>
                        <th class="table__header">Статус</th>
                        <th class="table__header"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($sqlOrdersWorks->num_rows > 0) {
                        while ($order = $sqlOrdersWorks->fetch_assoc()) { ?>
                            <tr class="tr__row">
                                <!--<td><?php echo $order['Orders_ID']; ?></td>-->
                                <td><?php echo $order['Orders_Title']; ?></td>
                                <td><?php echo $order['Orders_Price']; ?> руб.</td>
                                <td><?php echo $order['Teams_ID']; ?></td>
                                <td><?php echo $order['Orders_Status']; ?></td>
                                <td><button class="basket__button orders basket-add"><a onclick="openEditModal(<?php echo $order['Orders_ID']; ?>)">Изменить</a></button></td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
            </table>

            <!-- Таблица для исполненнных заказов -->
            <h1 class="main__title">Исполненные</h1>
            <table>
                <thead>
                    <tr>
                        <!--<th class="table__header">Номер заказа</th>-->
                        <th class="table__header">Наименование</th>
                        <th class="table__header">Сумма</th>
                        <th class="table__header">Команда</th>
                        <th class="table__header">Статус</th>
                        <th class="table__header"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultOrdersProcessed->num_rows > 0) {
                        while ($order = $resultOrdersProcessed->fetch_assoc()) { ?>
                            <tr class="tr__row">
                                <!--<td><?php echo $order['Orders_ID']; ?></td>-->
                                <td><?php echo $order['Orders_Title']; ?></td>
                                <td><?php echo $order['Orders_Price']; ?> руб.</td>
                                <td><?php echo $order['Teams_ID']; ?></td>
                                <td><?php echo $order['Orders_Status']; ?></td>
                                <td><button class="basket__button orders basket-add"><a onclick="openEditModal(<?php echo $order['Orders_ID']; ?>)">Изменить</a></button></td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
            </table>

            <!-- Модальное окно для изменения заказа -->
            <div id="AdminModal" class="modal">
                <div class="modal_content">
                    <span class="close" onclick="closeEditModal()">&times;</span>
                    <h2>Изменить заказ</h2>
                    <form id="orderForm" action="/vendor/edit_order.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="editOrderID" name="orderID">
                        <label for="editOrderStatus">Статус заказа</label><br>
                        <select name="editOrderStatus" id="editOrderStatus">
                            <option value="Новый">Новый</option>
                            <option value="Обработан">Обработан</option>
                            <option value="Исполнен">Исполнен</option>
                        </select><br><br>
                        <label for="editOrderTeam">Команда разработки</label><br>
                        <select name="editOrderTeam" id="editOrderTeam">
                            <?php if ($resultTeams->num_rows > 0) {
                                while ($team = $resultTeams->fetch_assoc()) { ?>
                                    <option value="<?php echo $team['Teams_ID']; ?>"><?php echo $team['Teams_Name']; ?></option>
                                <?php }
                            } ?>
                        </select><br><br>
                        <div class="modal_button"><button type="submit">Применить</button></div>
                    </form>
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
            <script src="/js/pass_modal.js"></script>
            <script>
        // Открыть модальное окно для изменения заказа
        function openEditModal(orderID) {
            document.getElementById("editOrderID").value = orderID;
            document.getElementById("AdminModal").style.display = "block";
        }

        // Закрыть модальное окно для изменения заказа
        function closeEditModal() {
            document.getElementById("AdminModal").style.display = "none";
        }
    </script>

        </div>
    </body>