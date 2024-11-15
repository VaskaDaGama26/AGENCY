<?php
session_start();
require_once 'db_connect.php';

// Проверка, существует ли массив корзины и данные пользователя в сессии
if (isset($_SESSION['cart']) && isset($_SESSION['user']['id'])) {
    // Получаем ID пользователя из сессии
    $user_id = $_SESSION['user']['id'];

    // Получаем первую (и единственную) услугу из корзины
    $cart = $_SESSION['cart'];
    $service = reset($cart);

    // Проверка на то, что $service содержит корректные данные
    if (isset($service['name']) && isset($service['price']) && isset($service['status'])) {
        // Экранируем строки и преобразуем данные
        $orders_title = mysqli_real_escape_string($connect, $service['name']);
        $orders_price = floatval($service['price']); // Преобразуем в число с плавающей запятой
        $orders_status = mysqli_real_escape_string($connect, $service['status']);

        /* Отладочная информация
        echo "orders_title: $orders_title<br>";
        echo "orders_price: $orders_price<br>";
        echo "orders_status: $orders_status<br>";*/

        // Проверка данных перед вставкой
        if ($orders_price > 0) {
            // Вставка данных в таблицу Orders, оставляя Teams_ID пустым
            $sql = "INSERT INTO Orders (Teams_ID, Orders_Title, Orders_Price, Orders_Status) 
                    VALUES (NULL, '$orders_title', '$orders_price', '$orders_status')";

            if ($connect->query($sql) === TRUE) {
                // Получение последнего вставленного ID
                $last_inserted_id = $connect->insert_id;

                // Вставка данных в таблицу Has
                $sql_has = "INSERT INTO Has (Orders_ID, Users_ID) VALUES ('$last_inserted_id', '$user_id')";
                if ($connect->query($sql_has) === TRUE) {
                    unset($_SESSION['cart']);
                    header('Location: /account/orders.php');
                    exit();
                } else {
                    echo "Ошибка: " . $sql_has . "<br>" . $connect->error;
                }
            } else {
                echo "Ошибка: " . $sql . "<br>" . $connect->error;
            }
        } else {
            echo "Ошибка: Некорректное значение цены.";
        }
    } else {
        echo "Ошибка: Некорректные данные в корзине.";
    }
} else {
    echo "Ошибка: Данные корзины или пользователя отсутствуют в сессии.";
}
?>
