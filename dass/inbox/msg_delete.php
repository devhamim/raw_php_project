<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$delete = " DELETE FROM msgs WHERE id=$id ";
$delete_result = mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'Delete messege successfully';
header('location:msg_view.php');

?>