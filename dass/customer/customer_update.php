<?php
require '../db.php';
session_start();
$id =$_POST['id'];
$title =  $_POST['title'];
$name =  $_POST['name'];
$position =  $_POST['position'];


$uplode_file = $_FILES ['image'];
    if($uplode_file['name']==''){
        $update = "UPDATE customers SET title='$title', name='$name', position='$position' WHERE id=$id";
        $update_result = mysqli_query($db_connect, $update);
        $_SESSION['success']='update success';
        header('location:customer_add.php');
    }
    else{
        $after_extension = explode('.', $uplode_file['name']);
        $extension = end($after_extension);
        $allow_extension = ['jpg', 'png'];
        if(in_array($extension, $allow_extension)){
            if($uplode_file['size'] <= 1000000){
                $select = "SELECT * FROM customers WHERE id=$id";
                $select_result = mysqli_query($db_connect, $select);
                $after_assoc = mysqli_fetch_assoc($select_result);
                $delete_img = '../uplode/customer/'.$after_assoc['image'];
                unlink($delete_img);

                $file_name = $id. '.' .$extension;
                $new_location = '../uplode/customer/'. $file_name;
                move_uploaded_file($uplode_file['tmp_name'], $new_location);

                $update = "UPDATE customers SET title='$title', name='$name', position='$position', image='$file_name' WHERE id=$id";
                $update_result = mysqli_query($db_connect, $update);
                header('location:customer_edit.php?id='.$id);
                $_SESSION['success']='update success';
            }
            else{
                $_SESSION['size'] = "image size is to long";
                header('location:customer_edit.php?id='.$id);
            }
        }
        else{
            $_SESSION['extension'] = "invalid extension";
            header('location:customer_edit.php?id='.$id);
        }
    }















// $upload_file = $_FILES['image'];
// $explode = explode('.', $upload_file['name']);
// $extension = end($explode);
// $file_name = $upload_file['name'];

// $allowed_file = array('jpg', 'png', 'jpeg');
// if(in_array($extension , $allowed_file)){
//     if($upload_file['size']<=1000000){
//         $customer_update = " UPDATE customers SET title='$title', name='$name', position='$position'' WHERE id=$id ";
//         $customer_update_result = mysqli_query($db_connect, $customer_update);

//         $id = mysqli_insert_id($db_connect);
//         $image_name = $id. '.' .$extension;
//         $new_location = "../uplode/customer/".$image_name;
//         move_uploaded_file($upload_file['tmp_name'], $new_location);

//         $insart_img = " UPDATE customers SET image='$image_name' WHERE id=$id ";
//         $insart_img_result= mysqli_query($db_connect, $insart_img);
        
//         $_SESSION ['update'] = 'customer contant update';
//         header('location:customer_add.php');
//     }
//     else{
//         $_SESSION ['size'] = 'File size to';
//         header('location:customer_add.php');  
//     }
// }
// else{
//     $_SESSION ['extension'] = 'Invalid Extension';
//     header('location:customer_edit.php?id='.$id);    
// }






// $customer_update = " UPDATE customers SET  title='$title', name='$name', position='$position' WHERE id=$id ";
// $customer_update_result = mysqli_query($db_connect, $customer_update);

// $_SESSION['update'] = 'customer Update Successfully';
// header('location:customer_add.php');


?>