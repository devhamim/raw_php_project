<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$delete = " DELETE FROM services WHERE id=$id ";
$delete_result = mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'services Content Delete ';
header('location:services_add.php');

?>