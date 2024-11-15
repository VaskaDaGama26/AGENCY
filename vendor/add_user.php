<?php
require_once 'db_connect.php';
session_start();

$full_name = $_POST['userName'];
$login = $_POST['userLogin'];
$password = $_POST['userPass'];
$email = $_POST['userMail'];
$password_confirm = $_POST['userConf'];
$role = $_POST['userRole'];

$check = mysqli_query($connect, "SELECT * FROM `Users` WHERE Users_Login ='$login'");
$results = mysqli_fetch_assoc($check);

if (empty($full_name) || empty($login) || empty($password) || empty($email) || empty($password_confirm)) {
    $_SESSION['message'] = 'Не все поля заполнены!';
    header('Location: /admin_panel/admin_base.php#sectionUsers');
} 
else {
    if ($results === NULL) {

        if ($password === $password_confirm) {

            $password = md5($password);

            mysqli_query($connect, "INSERT INTO `Users`
            (`Users_ID`, `Teams_ID`, `Users_Name`, `Users_Login`, `Users_Email`, `Users_Password`, `Users_Role`) 
            VALUES (NULL, NULL, '$full_name', '$login', '$email', '$password', '$role')");

            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: /admin_panel/admin_base.php#sectionUsers');
        } 
        
        else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: /admin_panel/admin_base.php#sectionUsers');
        }
    } 
    
    else {
        $_SESSION['message'] = 'Пользователь с таким логином уже существует!';
        header('Location: /admin_panel/admin_base.php#sectionUsers');
    }
}