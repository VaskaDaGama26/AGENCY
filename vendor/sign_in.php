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
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
    <!-- Форма регистрации -->
        <form class="form" action="signin_db.php" method="post" enctype="multipart/form-data" style="margin-top:-50px">
            <h2 class="form-title">Регистрация</h2>
            <p class="path"><a href="/index.php">Главная</a> – Регистрация</p>
            <input class="input" type="text" name="full_name" placeholder="Введите свое полное имя"><br>
            <input class="input" type="text" name="login" placeholder="Введите свой логин"><br>
            <input class="input" type="email" name="email" placeholder="Введите свой e-mail"><br> 
            <input class="input" type="password" name="password" placeholder="Введите пароль"><br>
            <input class="input" type="password" name="password_confirm" placeholder="Подтвердите пароль"><br>
            <div style='display: flex;justify-content: center;'class="g-recaptcha" data-sitekey="6Ld5vPwpAAAAALLwKVazC1Ou6Ub0aivsryMBc2x5"></div><br>
            <p class="link">У вас уже есть аккаунт? - <a href="log_in.php">авторизируйтесь</a>!</p>
            <button class="button-form" type="submit">Зарегистрироваться</button>
            <?php
                if ($_SESSION['message']) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>
    </body>
</html>