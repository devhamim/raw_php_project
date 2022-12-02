<?php
require '../db.php';
session_start();
$id =$_POST['id'];
$icon =$_POST['icon'];
$number =$_POST['number'];
$title =$_POST['title'];


$count_update = " UPDATE counts SET  icon='$icon',number='$number', title='$title' WHERE id=$id ";
$count_update_result = mysqli_query($db_connect, $count_update);

$_SESSION['update'] = 'Count Update Successfully';
header('location:count_add.php');

?>