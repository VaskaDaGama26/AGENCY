<?php
require_once 'db_connect.php';
session_start();

$textserv = $_POST['servText'];
$priceserv = $_POST['servPrice'];
    $priceFloat = (float)$priceserv;
$rateserv = $_POST['servRate'];
    
    if (isset($_POST['upload']) and $_FILES['servImg']['error'] === 0){
        $img_type= substr($_FILES['servImg']['type'], 0, 5);
        $img_size = 2*1024*1024;
        if (!empty($_FILES['servImg']['tmp_name']) and $img_type === 'image' and $_FILES['servImg']['size'] <= $img_size) { 
        $img = addslashes(file_get_contents($_FILES['servImg']['tmp_name']));
        $connect->query("INSERT INTO `Services`(`Services_ID`,`Services_Name`, `Services_Price`, `Services_Img`, `Services_Rate`) 
        VALUES (NULL, '$textserv', '$priceFloat', '$img', '$rateserv')");
        echo '$_FILES: ';
        var_dump($_FILES);
        echo '$textserv: ';
        var_dump($textserv);
        echo '$priceserv: ';
        var_dump($priceserv);
        echo '$rateserv: ';
        var_dump($rateserv);
        echo '$priceFloat: ';
        var_dump($priceFloat);
        $sd= gettype($variable);
        echo $sd;

        echo '$_POST["upload"]: ';
        var_dump($_POST['upload']);

        }
    }
    else{
        header('Location: /admin_panel/admin_base.php#sectionServ');
    }
