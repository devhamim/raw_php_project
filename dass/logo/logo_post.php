<?php

require '../db.php';
session_start();


$upload_file = $_FILES['logo'];
$after_explode = explode('.', $upload_file['name']);
$extantion = end($after_explode);
$name = $upload_file['name'];

$allowed_extantion = array('jpg', 'png', 'jpeg');
    if(in_array($extantion, $allowed_extantion)){
        if($upload_file['size']<= 1000000){
            $insart = " INSERT INTO logos(logo) VALUES('$name')";
            $insart_result = mysqli_query($db_connect, $insart);
            $id = mysqli_insert_id($db_connect);
            $file_name = $id. '.'.$extantion;
            $new_location = '../uplode/logo/'.$file_name;
            move_uploaded_file($upload_file['tmp_name'], $new_location);

            $update_img = " UPDATE logos SET logo = '$file_name' WHERE id=$id ";
            $update_img_result = mysqli_query($db_connect, $update_img);
            $_SESSION['success'] = 'Logo Upload';
            header('location:logo.php');
        }
        else{
            $_SESSION['size'] = 'File size is to large';
            header('location:logo.php');
        }
    }
    else{
        $_SESSION['extantion'] = 'Invalid Extantion';
        header('location:logo.php');
    }



?>