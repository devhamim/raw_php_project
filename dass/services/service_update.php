<?php
require '../db.php';
session_start();
$id =$_POST['id'];
$icon =$_POST['icon'];
$title =$_POST['title'];
$dess =$_POST['dess'];

$service_update = " UPDATE services SET  icon='$icon', title='$title', dess='$dess' WHERE id=$id ";
$service_update_result = mysqli_query($db_connect, $service_update);

$_SESSION['update'] = 'service_update Update Successfully';
header('location:services_add.php');

?>