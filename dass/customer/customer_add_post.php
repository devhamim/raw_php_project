<?php

require '../db.php';
session_start();

$title =  $_POST['title'];
$name =  $_POST['name'];
$position =  $_POST['position'];

$upload_file = $_FILES['image'];
$explode = explode('.', $upload_file['name']);
$extension = end($explode);
$file_name = $upload_file['name'];

$allowed_file = array('jpg', 'png', 'jpeg');
if(in_array($extension , $allowed_file)){
    if($upload_file['size']<=1000000){
        $insart = " INSERT INTO customers (title, name, position) VALUES('$title','$name', '$position')";
        $insart_result = mysqli_query($db_connect, $insart);

        $id = mysqli_insert_id($db_connect);
        $image_name = $id. '.' .$extension;
        $new_location = "../uplode/customer/".$image_name;
        move_uploaded_file($upload_file['tmp_name'], $new_location);

        $insart_img = " UPDATE customers SET image='$image_name' WHERE id=$id ";
        $insart_img_result= mysqli_query($db_connect, $insart_img);
        
        $_SESSION ['add_customer'] = 'customer contant add';
        header('location:customer_add.php');
    }
    else{
        $_SESSION ['size'] = 'File size to larg';
        header('location:customer_add.php');  
    }
}
else{
    $_SESSION ['extension'] = 'Invalid Extension';
    header('location:customer_add.php');    
}


?>