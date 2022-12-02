<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$select = "SELECT * FROM logos WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);
$delete_img = '../uplode/logo/'.$after_assoc['logo'];
unlink($delete_img);

$delete = " DELETE FROM logos WHERE id=$id ";
$delete_result = mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'Logo Delete ';
header('location:logo.php');

?>