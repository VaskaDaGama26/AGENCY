<?php
require_once 'db_connect.php';
session_start();

$_SESSION['cart'] = array();

header('Location: ../account/basket.php');