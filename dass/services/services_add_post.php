<?php

require '../db.php';
session_start();

$icon =  $_POST['icon'];
$title =  $_POST['title'];
$dess =  $_POST['dess'];


$insart = " INSERT INTO services(icon, title, dess) VALUES('$icon', '$title', '$dess')";
$insart_result = mysqli_query($db_connect, $insart);

$_SESSION ['add_services'] = 'services contant add';
header('location:services_add.php');

?>