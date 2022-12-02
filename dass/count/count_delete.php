<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$delete = " DELETE FROM counts WHERE id=$id ";
$delete_result = mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'counts Content Delete ';
header('location:count_add.php');

?>