<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$select = "SELECT * FROM works WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);
$delete_img = '../uplode/work/'.$after_assoc['image'];
unlink($delete_img);

$delete = " DELETE FROM works WHERE id=$id ";
$delete_result = mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'Work Content Delete ';
header('location:work_add.php');

?>