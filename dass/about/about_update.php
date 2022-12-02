<?php

require '../db.php';
session_start();

$id = $_POST['id'];
$title =$_POST['title'];
$dess = $_POST['dess'];


$upload_file = $_FILES['image'];
if($upload_file['name'] == ''){

    $about_update = " UPDATE abouts SET title='$title', dess='$dess' WHERE id=$id ";
    $about_update_result = mysqli_query($db_connect, $about_update);
    
    $_SESSION['update'] = 'About Update Successfully';
    header('location:about_edit.php');

}
else{
    $select = "SELECT * FROM abouts WHERE id=$id";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);
    $delete_img = '../uplode/about/'.$after_assoc['image'];
    unlink($delete_img);

    $after_expload = explode('.', $upload_file['name']);
    $extencion = end($after_expload);
    $allaw_extencion = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    if(in_array($extencion, $allaw_extencion)){
        if($after_expload['size'] <= 1000000){
            $file_name = 'about'. '.'. $extencion;
            $new_location = '../uplode/about/'.$file_name;
            move_uploaded_file($upload_file['tmp_name'], $new_location);

            $update = " UPDATE abouts SET title='$title', dess='$dess', image='$file_name' WHERE id=$id ";
            $update_result = mysqli_query($db_connect, $update);
            $_SESSION['update'] = 'About Update Successfully';
            header('location:about_edit.php');
        }
        else{
            $_SESSION['size'] = 'File Size in to large';
            header('location:about_edit.php');
        }
    }
    else{
        $_SESSION['extencion'] = 'Invalid Extencion';
        header('location:about_edit.php');
    }
}



?>
