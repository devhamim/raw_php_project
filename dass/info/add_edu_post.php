<?php

require '../db.php';
session_start();

$title =  $_POST['title'];
$percent =  $_POST['percent'];
$year =  $_POST['year'];


$insart = " INSERT INTO about_edus(title, percent, year) VALUES('$title', '$percent', '$year')";
$insart_result = mysqli_query($db_connect, $insart);

$_SESSION ['add_edu'] = 'About Education add';
header('location:add_edu.php');

?>