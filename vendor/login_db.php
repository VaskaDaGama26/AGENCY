<?php

    session_start();
    require_once 'db_connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `Users` WHERE `Users_Login` = '$login' AND `Users_Password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['Users_ID'],
            "full_name" => $user['Users_Name'],
            "login" => $user['Users_Login'],
            "password" => $user['Users_Password'],
            "email" => $user['Users_Email'],
            "role" => $user['Users_Role']
        ];

        header('Location: /profile.php');

    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: log_in.php');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
