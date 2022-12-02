<?php
require '../db.php';
session_start();
$id =$_POST['id'];
$type =$_POST['type'];
$sub_title =$_POST['sub_title'];
$title =$_POST['title'];
$dess =$_POST['dess'];



$uplode_file = $_FILES ['image'];
if($uplode_file['name']==''){
    $update = "UPDATE works SET type='$type', sub_title='$sub_title',title='$title', dess='$dess'  WHERE id=$id";
    $update_result = mysqli_query($db_connect, $update);
    $_SESSION['success']='update success';
    header('location:work_edit.php?id='.$id);
}
else{
    $after_extension = explode('.', $uplode_file['name']);
    $extension = end($after_extension);
    $allow_extension = ['jpg', 'png', 'jpeg'];
    if(in_array($extension, $allow_extension)){
        if($uplode_file['size'] <= 2000000){
            $select = "SELECT * FROM works WHERE id=$id";
            $select_result = mysqli_query($db_connect, $select);
            $after_assoc = mysqli_fetch_assoc($select_result);
            $delete_img = '../uplode/work/'.$after_assoc['image'];
            unlink($delete_img);

            $file_name = $id. '.' .$extension;
            $new_location = '../uplode/work/'. $file_name;
            move_uploaded_file($uplode_file['tmp_name'], $new_location);

            $update = "UPDATE works SET type='$type', sub_title='$sub_title',title='$title', dess='$dess', image='$file_name' WHERE id=$id";
            $update_result = mysqli_query($db_connect, $update);
            header('location:work_edit.php?id='.$id);
            $_SESSION['success']='update success';
        }
        else{
            $_SESSION['size'] = "image size is to long";
            header('location:work_edit.php?id='.$id);
        }
    }
    else{
        $_SESSION['extension'] = "invalid extension";
        header('location:work_edit.php?id='.$id);
    }
}








// $work_update = " UPDATE works SET type='$type', sub_title='$sub_title', title='$title', dess='$dess' WHERE id=$id ";
// $work_update_result = mysqli_query($db_connect, $work_update);

// $_SESSION['update'] = 'Work Update Successfully';
// header('location:work_add.php');


?>