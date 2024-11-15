<?php
$server = "localhost";
$name = "j903861s_diplom";
$password = "VaskaDaGama01234";
$dbname = "j903861s_diplom";

$connect = new mysqli($server, $name, $password, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
