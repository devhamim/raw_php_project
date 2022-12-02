<?php
require '../db.php';
session_start();


$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];

$insart = " INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg') ";
$insart_result = mysqli_query($db_connect, $insart);

$_SESSION['message'] = 'message sent successfully';
header('location:../index.php#contact');

?>