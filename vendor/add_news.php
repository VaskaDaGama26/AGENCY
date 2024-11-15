<?php
require_once 'db_connect.php';
session_start();


$textnews = $_POST['newsText'];
$currentDate = date('Y-m-d');

    if (isset($_POST['upload']) and $_FILES['newsImg']['error'] === 0){
        $img_type= substr($_FILES['newsImg']['type'], 0, 5);
        $img_size = 2*1024*1024;
        if (!empty($_FILES['newsImg']['tmp_name']) and $img_type === 'image' and $_FILES['newsImg']['size'] <= $img_size) { 
        $img = addslashes(file_get_contents($_FILES['newsImg']['tmp_name']));
        $connect->query("INSERT INTO `News`(`News_ID`,`News_Image`, `News_Title`, `News_Date`) 
        VALUES (NULL, '$img', '$textnews', '$currentDate')");
        header('Location: /admin_panel/admin_base.php#sectionNews');
        }
    }
    else{
        header('Location: /admin_panel/admin_base.php#sectionNews');
    }


