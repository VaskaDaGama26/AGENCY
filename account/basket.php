<?php
if ($_SESSION['user']['role'] == 'Сотрудник') {
    header('Location: ../index.php');
}
elseif ($_SESSION['user']['role'] == 'Администратор') {
    header('Location: ../index.php');
}

session_start();
require_once '../vendor/db_connect.php';

$total = 0;

if (!empty($_SESSION['cart'])) {
    // Получаем IDs товаров из сессии
    $product_ids = array_keys($_SESSION['cart']);
    // IDs to String
    $ids_string = implode(',', $product_ids);
}

if (!empty($ids_string)) {
$sql = "SELECT * FROM `Services` WHERE Services_ID IN ($ids_string)";
$result = mysqli_query($connect, $sql);
}
else {
    //Если корзина пуста, выводим сообщение
    //$_SESSION['message'] = 'Ваша корзина пуста';
}


?>

<html lang="ru">
    <head>
        <title>Корзина</title>
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

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.plugin.autotable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.plugin.vfs_fonts.min.js"></script>-->
    

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
                    
                    <h2 class="under__title">Корзина</h2>
                    <button class="back__button"><a href="javascript:history.back()">Назад</a></button>
                    
                    <?php
                        if ($_SESSION['message']) {
                            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                        }
                        unset($_SESSION['message']);
                    ?>

                    <form method="post" action="../vendor/add_to_order.php">
                        <table>
                            <thead class="table__basket">
                                <tr>
                                    <th style="text-align:left;" class="table__header">Товары в корзине</th>
                                    <th class="table__header"></th>
                                    <th style="text-align:center;" class="table__header"><button class="basket__button basket-delete"><a href="/vendor/clear_cart.php">Очистить</a></button></th>
                                    <th style="text-align:right;" class="table__header"><button type="submit" class="basket__confirm"><h1>Оформить</h1></button></th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php 
                                if(!$result == "") {                            
                                    while($serv = $result->fetch_assoc()) { ?>
                                        <tr class="tr__row">
                                            <td class="img__col"><?php echo '<img ' . 'src="data:image/jpg;base64,'. base64_encode($serv['Services_Img']) . '"alt="Картинка">';?></td>
                                            <td><?php echo $serv['Services_Name'];?></td>
                                            <td><?php echo $serv['Services_Price'];?> руб.</td>
                                            <!--<td><button class="delete_button" name="serv_id1" value="<?php echo $serv['Services_ID'];?>"><span class="delete-icon"></span></button></td>-->
                                            <td>
                                                <input type="hidden" name="servName" value="<?php echo $serv['Services_Name'];?>">
                                                <input type="hidden" name="servPrice" value="<?php echo $serv['Services_Price'];?>">
                                            </td>
                                        </tr>
                                <?php } } else {echo '<tbody><tr class="tr__row"></tr></tbody>';} ?>
                            </tbody>
                        </table>
                    </form>
                       <!--<script src="/js/order_pdf.js"></script>-->
                    
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
    
