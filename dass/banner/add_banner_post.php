<?php

require '../db.php';
session_start();

$sub_title =  $_POST['sub_title'];
$title =  $_POST['title'];
$dess =  $_POST['dess'];


$insart = " INSERT INTO banner(sub_title, title, dess) VALUES('$sub_title', '$title', '$dess')";
$insart_result = mysqli_query($db_connect, $insart);

$_SESSION ['add_banner'] = 'banner contant add';
header('location:add_banner.php');

?>