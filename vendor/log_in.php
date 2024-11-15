<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /profile.php');
}
?>

<html lang="ru">
    <head>
        <title>Форма авторизации</title>
        <link rel="stylesheet" type=text/css href="/css/form_style.css"./>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="/img/shortcut_icon.png"/>
    </head>
    <body>
    <!-- Форма авторизации -->
        <form class="form" action="login_db.php" method="post">
            <h2 class="form-title">Войти</h2>
            <p class="path"><a href="/index.php">Главная</a> – Войти</p>
            <input class="input" type="text" name="login" placeholder="Введите свой логин"><br>
            <input class="input" type="password" name="password" placeholder="Введите пароль"><br>
            <p>У вас нет аккаунта? – <a href="sign_in.php">зарегистрируйтесь</a>!</p>
            <button class="button-form" type="submit">Войти</button>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </body>
</html>