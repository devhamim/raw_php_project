<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$select = " SELECT * FROM customers WHERE id=$id ";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['status']==0){
    $update2 = " UPDATE customers SET status=1 WHERE id=$id ";
    $update_result = mysqli_query($db_connect, $update2);
    header('location:customer_add.php');
}
else{
    $update = " UPDATE customers SET status=0 WHERE id=$id";
    $update_result = mysqli_query($db_connect, $update);
    header('location:customer_add.php');
}

?>