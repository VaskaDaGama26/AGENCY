<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_POST['orderID'];
    $newStatus = $_POST['editOrderStatus'];
    $teamID = $_POST['editOrderTeam'];

    // Подготовленный запрос для обновления данных
    $sqlUpdate = "UPDATE `Orders` SET Orders_Status = '$newStatus', Teams_ID = '$teamID' WHERE Orders_ID = '$orderID'";

    if ($connect->query($sqlUpdate) === TRUE) {
        // Успешное обновление
        header("Location: ../admin_panel/admin_orders.php"); // Перенаправление обратно на страницу с заказами
        exit();
    } else {
        // Ошибка при выполнении запроса
        echo "Ошибка при обновлении заказа: " . $connect->error;
    }
} else {
    // Недопустимый тип запроса
    header("Location: ../admin_panel/admin_orders.php"); // Перенаправление обратно на страницу с заказами
    exit();
}
?>
