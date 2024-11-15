<?php
session_start();
require_once 'db_connect.php';



if ($_SESSION['user']) {
    header('Location: /profile.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ваш секретный ключ
    $secret = '6Ld5vPwpAAAAABwdVu611HPyBUWcwp13cRRhJ52X';
    
    // Ответ капчи
    $response = $_POST['g-recaptcha-response'];
    
    // Делаем запрос к Google API
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $secret,
        'response' => $response
    );

    // Создаем контекст для POST-запроса
    $options = array(
        'http' => array(
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    
    // Делаем запрос и получаем ответ
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    // Проверяем ответ капчи
    if ($captcha_success->success) {
        // Капча пройдена, продолжайте обработку данных формы
        // Ваш код для обработки данных формы и регистрации пользователя
        $full_name = $_POST['full_name'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $password_confirm = $_POST['password_confirm'];
        
        $check = mysqli_query($connect, "SELECT * FROM `Users` WHERE Users_Login ='$login'");
        $results = mysqli_fetch_assoc($check);
        
        if (empty($full_name) || empty($login) || empty($password) || empty($email) || empty($password_confirm)) {
            $_SESSION['message'] = 'Не все поля заполнены!';
            header('Location: sign_in.php');
        } 
        else {
            if ($results === NULL) {
        
                if ($password === $password_confirm) {
        
                    $password = md5($password);
        
                    mysqli_query($connect, "INSERT INTO `Users`
                    (`Users_ID`, `Teams_ID`, `Users_Name`, `Users_Login`, `Users_Email`, `Users_Password`, `Users_Role`) 
                    VALUES (NULL, NULL, '$full_name', '$login', '$email', '$password', 'Клиент')");
        
                    $_SESSION['message'] = 'Регистрация прошла успешно!';
                    header('Location: log_in.php');
                } 
                
                else {
                    $_SESSION['message'] = 'Пароли не совпадают';
                    header('Location: sign_in.php');
                }
            } 
            
            else {
                $_SESSION['message'] = 'Пользователь с таким логином уже существует!';
                header('Location: sign_in.php');
            }
        }
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        // Капча не пройдена, выводим сообщение об ошибке
        $_SESSION['message'] = 'Капча не пройдена, попробуйте снова';
        header('Location: sign_in.php');
        exit();
    }
}



