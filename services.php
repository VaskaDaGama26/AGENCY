<?php
require_once 'vendor/db_connect.php';
$result = mysqli_query($connect, "SELECT * FROM `Services`");
session_start();
?>

<html lang="ru">
    <head>
        <title>Услуги</title>
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
                                <li><a href="#" class="menu__link active">Услуги</a></li>
                                <li><div class="dropdown"><a href="portfolio.php" class="menu__link">Портфолио</a>
                                        <div class="dropdown__content">
                                            <a href="portfolio.php#port1">Наружная и интерьерная реклама</a>
                                            <a href="portfolio.php#port2">Вентилируемые фасады</a>
                                        </div>   
                                    </div> 
                                </li>
                                <li><a href="about.php" class="menu__link">О компании</a></li>
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

                    <h2 class="under__title">Предоставляемые услуги</h2>

                    <div class="three-block">
                        <div class="three-block__row">
                            <div class="three-block__column">

                            <?php while ($serv = mysqli_fetch_assoc($result)) { ?>
                                    <div class="three-block__item services">
                                        <div class="three-block__image">
                                            <?php echo '<img class="three-block__img"' . 'src="data:image/jpg;base64,'. 
                                            base64_encode($serv['Services_Img']) . '"alt="Картинка">';?>
                                        </div>
                                        <div class="three-block__text long">
                                            <?php echo '<a>'. $serv['Services_Name'] . '</a>';?>
                                        </div>
                                        <div class="three-block__price">
                                            <?php echo '<a>'. $serv['Services_Price'] . ' руб.</a>';?>
                                        </div>
                                        <div class="three-block__rating">
                                            <ul class="rating">
                                                <?php for ($i = 0; $i < $serv['Services_Rate']; $i++)
                                                {
                                                    echo '<li><ion-icon name="star"></ion-icon></li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <?php 
    if($_SESSION['user']['role'] == "Клиент"){
        echo '<div class="three-block__button">
            <form action="vendor/add_to_cart.php" method="post">
            <input type="hidden" name="product_id" value="';
?>
<?php echo $serv['Services_ID']; ?>
<?php echo '"><input type="hidden" name="quantity" value="1">
            <button type="submit" class="add__to__cart"><a onclick="openModal6()">В корзину</a></button>
            </form>
            </div>';
        }
?>
                                    </div>
                                <?php } ?>

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
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
    </body>
</html>