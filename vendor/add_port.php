<?php
require_once 'db_connect.php';
session_start();

$categoryPort = $_POST['portCategory'];

    if (isset($_POST['upload']) and $_FILES['portImg']['error'] === 0){
        $img_type= substr($_FILES['portImg']['type'], 0, 5);
        $img_size = 2*1024*1024;
        if (!empty($_FILES['portImg']['tmp_name']) and $img_type === 'image' and $_FILES['portImg']['size'] <= $img_size) { 
        $img = addslashes(file_get_contents($_FILES['portImg']['tmp_name']));
        $connect->query("INSERT INTO `Portfolio`(`Portfolio_ID`,`Portfolio_Image`, `Portfolio_Category`) 
        VALUES (NULL, '$img', '$categoryPort')");
        header('Location: /admin_panel/admin_base.php#sectionPort');
        }
    }
    else{
        header('Location: /admin_panel/admin_base.php#sectionPort');
        /*echo '$_FILES: ';
        var_dump($_FILES);
        echo '$categoryPort: ';
        var_dump($categoryPort);
        echo '$_POST["upload"]: ';
        var_dump($_POST['upload']);
        echo '$img: ';
        var_dump($img);
        echo '$imgType: ';
        var_dump($img_type);
        echo '$categoryPort: ';
        var_dump($categoryPort);*/
    }