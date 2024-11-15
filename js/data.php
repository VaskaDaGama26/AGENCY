<?php
session_start();
header('Content-Type: application/json');

// Включаем отображение ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../vendor/db_connect.php'; // Предполагаем, что у вас есть файл для подключения к базе данных

$response = array();

if (isset($_GET['order_id']) && isset($_SESSION['user'])) {
    $orderId = intval($_GET['order_id']);
    $user = array('name' => $_SESSION['user']['full_name']); // Получаем полное имя из сессии

    $sqlOrder = "SELECT Orders_ID, Orders_Title, Orders_Price FROM `Orders` WHERE Orders_ID = $orderId";
    $resultOrder = $connect->query($sqlOrder);

    if ($resultOrder === false) {
        $response['error'] = 'Ошибка выполнения запроса: ' . $connect->error;
    } else if ($resultOrder->num_rows > 0) {
        $order = $resultOrder->fetch_assoc();
        // Заполняем необходимые поля
        $order['items'] = [
            [
                'description' => $order['Orders_Title'],
                'quantity' => 1,
                'unit' => 'шт',
                'price' => floatval($order['Orders_Price']),
                'total' => floatval($order['Orders_Price'])
            ]
        ];
        $order['totalAmount'] = floatval($order['Orders_Price']);
        $order['supplier'] = 'ООО "AGENCY", ИНН 1122334455';
        $response['order'] = $order;
        $response['user'] = $user; // Добавляем данные пользователя в ответ
    } else {
        $response['error'] = 'Заказ не найден';
    }
} else {
    $response['error'] = 'Неверный ID заказа или пользователь не аутентифицирован';
}

$connect->close();

echo json_encode($response);
?>
