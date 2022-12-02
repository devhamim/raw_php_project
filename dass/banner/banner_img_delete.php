<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$select = "SELECT * FROM banner_images WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);
$delete_img = '../uplode/banner/'.$after_assoc['banner_img'];
unlink($delete_img);

$delete = " DELETE FROM banner_images WHERE id=$id ";
$delete_result = mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'Banner Images Delete ';
header('location:banner_img.php');

?>