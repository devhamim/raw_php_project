<?php

require '../db.php';
session_start();

$icon =  $_POST['icon'];
$number =  $_POST['number'];
$title =  $_POST['title'];



$insart = " INSERT INTO counts (icon, number, title) VALUES('$icon','$number', '$title')";
$insart_result = mysqli_query($db_connect, $insart);

$_SESSION ['add_count'] = 'count add';
header('location:count_add.php');

?>