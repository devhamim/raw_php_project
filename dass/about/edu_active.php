<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$select = " SELECT * FROM about_edus WHERE id=$id ";
$select_result = mysqli_query($db_connect, $select);
$after_accos = mysqli_fetch_assoc($select_result);

if($after_accos['status']==0){
    $update2 = " UPDATE about_edus SET status=1 WHERE id=$id ";
    $update_result2 = mysqli_query($db_connect, $update2);
    header('location:add_edu.php');
}
else{
    $update = " UPDATE about_edus SET status=0 WHERE id=$id";
    $update_result = mysqli_query($db_connect, $update);
    header('location:add_edu.php');
}




?>