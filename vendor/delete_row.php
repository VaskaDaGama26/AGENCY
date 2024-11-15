<?php
require_once 'db_connect.php';
session_start();

if (isset($_POST['port_id']) && !empty($_POST['port_id'])){
    $port = $_POST['port_id'];
    $check = mysqli_query($connect, "DELETE FROM `Portfolio` WHERE `Portfolio_ID` ='$port'");
    header('Location: /admin_panel/admin_base.php#sectionPort');
}
elseif (isset($_POST['news_id']) && !empty($_POST['news_id'])){
    $news = $_POST['news_id'];
    $check = mysqli_query($connect, "DELETE FROM `News` WHERE `News_ID` ='$news'");
    header('Location: /admin_panel/admin_base.php#sectionNews');
}
elseif (isset($_POST['serv_id']) && !empty($_POST['serv_id'])){
    $serv = $_POST['serv_id'];
    $check = mysqli_query($connect, "DELETE FROM `Services` WHERE `Services_ID` ='$serv'");
    header('Location: /admin_panel/admin_base.php#sectionServ');
}
elseif (isset($_POST['users_id']) && !empty($_POST['users_id'])){
    $users = $_POST['users_id'];
    $check = mysqli_query($connect, "DELETE FROM `Users` WHERE `Users_ID` ='$users'");
    header('Location: /admin_panel/admin_base.php#sectionUsers');
}

/*var_dump($port);
var_dump($check);
var_dump($news);
if ($check) {
    echo "Запись успешно удалена";
} else {
    echo "Ошибка при удалении записи: " . mysqli_error($connect);
}*/


