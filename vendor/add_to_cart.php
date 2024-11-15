<?php
session_start();
include_once "db_connect.php";

// Проверка, что переменные product_id и quantity существуют и не пусты
if (isset($_POST['product_id']) && isset($_POST['quantity']) && !empty($_POST['product_id']) && !empty($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Проверяем, существует ли сессия 'cart', если нет - инициализируем ее
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Проверяем, пуста ли корзина
    if (!empty($_SESSION['cart'])) {
        $_SESSION['message'] = "Нельзя добавить более одной услуги в корзину";
    } else {
        // Проверяем наличие товара в базе данных
        $check = mysqli_query($connect, "SELECT * FROM `Services` WHERE `Services_ID` = '$product_id'");

        if ($check) {
            $row = mysqli_fetch_assoc($check);

            if (mysqli_num_rows($check) > 0) {
                // Добавляем новую услугу в корзину
                $_SESSION['cart'][$product_id] = [
                    "id" => $row['Services_ID'],
                    "name" => $row['Services_Name'],
                    "price" => $row['Services_Price'],
                    "quantity" => $quantity,
                    "status" => "Новый"
                ];
                $_SESSION['message'] = "Услуга добавлена в корзину";
            } else {
                $_SESSION['message'] = "Услуга не найдена";
            }
        } else {
            $_SESSION['message'] = "Ошибка БД: " . mysqli_error($connect);
        }
    }
} else {
    $_SESSION['message'] = "Product ID or quantity not set.";
}
header('Location: /account/basket.php');
/*Для отладки выводим содержимое сессии и сообщения
echo '<pre>';
print_r($_SESSION['cart']);
echo gettype($_SESSION['cart']['price']);
echo '</pre>';*/

echo $_SESSION['message'];
