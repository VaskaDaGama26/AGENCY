<?php
require_once 'db_connect.php';
session_start();

$login = $_SESSION['user']['login'];
$password = $_SESSION['user']['password'];
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

$checknew = md5($newPassword);
$checkold = md5($currentPassword);

// Проверка заполненности полей
if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
    $_SESSION['message'] = 'Не все поля заполнены';
    header('Location: /profile.php');
    exit();
}

// Соответствует ли введённый нынешний пароль фактическому паролю пользователя
if (password_verify($password, $checkold)) {
    $_SESSION['message'] = 'Введённый нынешний пароль не совпадает с фактическим';
    header('Location: /profile.php');
    exit();
}

// Соответствует ли новый пароль фактическому паролю пользователя
$check_user = mysqli_query($connect, "SELECT * FROM `Users` WHERE `Users_Login` = '$login' AND `Users_Password` = '$checknew'");
if (mysqli_num_rows($check_user) > 0) {
    $_SESSION['message'] = 'Новый пароль совпадает с нынешним';
    header('Location: /profile.php');
    exit();
}

// Проверка совпадения нового пароля и его подтверждения
if ($newPassword !== $confirmPassword) {
    $_SESSION['message'] = 'Новый пароль и подтверждение пароля не совпадают';
    header('Location: /profile.php');
    exit();
}

// Хэширование нового пароля
$hashPassword = md5($newPassword);

// Запрос на обновление пароля в базе данных
$update_query = "UPDATE `Users` SET `Users_Password`='$hashPassword' WHERE `Users_Login` = '$login'";
$update_result = mysqli_query($connect, $update_query);

if ($update_result) {
    $_SESSION['message'] = 'Пароль успешно обновлён';
} else {
    $_SESSION['message'] = 'Ошибка при обновлении пароля';
}

header('Location: /profile.php');
exit();
?>
