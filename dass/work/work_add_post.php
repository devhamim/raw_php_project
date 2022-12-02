<?php

require '../db.php';
session_start();

$type =  $_POST['type'];
$sub_title =  $_POST['sub_title'];
$title =  $_POST['title'];
$dess =  $_POST['dess'];

$upload_file = $_FILES['image'];
$explode = explode('.', $upload_file['name']);
$extension = end($explode);
$file_name = $upload_file['name'];

$allowed_file = array('jpg', 'png', 'jpeg');
if(in_array($extension , $allowed_file)){
    if($upload_file['size']<=2000000){
        $insart = " INSERT INTO works(type, sub_title, title, dess) VALUES('$type','$sub_title', '$title', '$dess')";
        $insart_result = mysqli_query($db_connect, $insart);

        $id = mysqli_insert_id($db_connect);
        $image_name = $id. '.' .$extension;
        $new_location = "../uplode/work/".$image_name;
        move_uploaded_file($upload_file['tmp_name'], $new_location);

        $insart_img = " UPDATE works SET image='$image_name' WHERE id=$id ";
        $insart_img_result= mysqli_query($db_connect, $insart_img);
        
        $_SESSION ['add_work'] = 'work contant add';
        header('location:work_add.php');
    }
    else{
        $_SESSION ['size'] = 'File size to larg';
        header('location:work_add.php');  
    }
}
else{
    $_SESSION ['extension'] = 'Invalid Extension';
    header('location:work_add.php');    
}


?>