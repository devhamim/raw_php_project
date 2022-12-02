<?php
require '../db.php';
session_start();
$id =$_POST['id'];
$sub_title =$_POST['sub_title'];
$title =$_POST['title'];
$dess =$_POST['dess'];

$banner_update = " UPDATE banner SET  sub_title='$sub_title', title='$title', dess='$dess' WHERE id=$id ";
$banner_update_result = mysqli_query($db_connect, $banner_update);

$_SESSION['update'] = 'Banner Update Successfully';
header('location:add_banner.php');

?>