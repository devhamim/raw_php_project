<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$select = " SELECT * FROM counts WHERE id=$id ";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['status']==0){
    $update2 = " UPDATE counts SET status=1 WHERE id=$id ";
    $update_result = mysqli_query($db_connect, $update2);
    header('location:count_add.php');
}
else{
    $update = " UPDATE counts SET status=0 WHERE id=$id";
    $update_result = mysqli_query($db_connect, $update);
    header('location:count_add.php');
}

?>