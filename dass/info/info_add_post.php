<?php

require '../db.php';
session_start();

$id = $_POST['id'];
$title =$_POST['title'];
$office = $_POST['office'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];



    $infos_update = " UPDATE infos SET title='$title', office='$office', address='$address', phone='$phone', email='$email'  WHERE id=$id ";
    $infos_update_result = mysqli_query($db_connect, $infos_update);
    
    $_SESSION['update'] = 'infos Update Successfully';
    header('location:info_add.php');



?>
