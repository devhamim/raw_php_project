<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM banner_icon WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc_select = mysqli_fetch_assoc($select_result);

if($after_assoc_select['status']==1){
    $update2 = " UPDATE banner_icon SET status=0 WHERE id=$id ";
    $update_result = mysqli_query($db_connect, $update2);
    header('location:banner_icon.php');
}

else{
    $count = "SELECT COUNT(*) as active FROM banner_icon WHERE status=1";
    $count_result = mysqli_query($db_connect, $count);
    $after_assoc = mysqli_fetch_assoc($count_result);

    if($after_assoc['active'] == 4){
        $_SESSION ['link'] = 'max 4 link can active';
        header('location:banner_icon.php');
    }
    else{
        $update2 = " UPDATE banner_icon SET status=1 WHERE id=$id ";
        $update_result = mysqli_query($db_connect, $update2);
        header('location:banner_icon.php');
        
    }
}


?>