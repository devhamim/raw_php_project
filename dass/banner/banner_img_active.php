<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$update = " UPDATE banner_images SET status=0";
$update_result = mysqli_query($db_connect, $update);

$update2 = " UPDATE banner_images SET status=1 WHERE id=$id ";
$update_result = mysqli_query($db_connect, $update2);

header('location:banner_img.php');

?>