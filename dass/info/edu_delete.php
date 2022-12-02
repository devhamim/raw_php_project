<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$delete = " DELETE FROM about_edus WHERE id=$id ";
$delete_result = mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'About Education Content Delete ';
header('location:add_edu.php');

?>