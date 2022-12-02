<?php
session_start();

require '../db.php';


$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($password)){
    $uplode_file = $_FILES ['pf_photo'];
    if($uplode_file['name']==''){
        $update = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        $update_result = mysqli_query($db_connect, $update);
        $_SESSION['success_edit']='update success';
        header('location:user_view.php');
    }
    else{
        $after_extension = explode('.', $uplode_file['name']);
        $extension = end($after_extension);
        $allow_extension = ['jpg', 'png'];
        if(in_array($extension, $allow_extension)){
            if($uplode_file['size'] <= 1000000){
                $select = "SELECT * FROM users WHERE id=$id";
                $select_result = mysqli_query($db_connect, $select);
                $after_assoc = mysqli_fetch_assoc($select_result);
                $delete_img = '../uplode/user/'.$after_assoc['pf_photo'];
                unlink($delete_img);

                $file_name = $id. '.' .$extension;
                $new_location = '../uplode/user/'. $file_name;
                move_uploaded_file($uplode_file['tmp_name'], $new_location);

                $update = "UPDATE users SET name='$name', email='$email', pf_photo='$file_name' WHERE id=$id";
                $update_result = mysqli_query($db_connect, $update);
                header('location:user_view.php');
                $_SESSION['success_edit']='update success';
            }
            else{
                $_SESSION['photo_size'] = "image size is to long";
                header('location:edit_user.php?id='.$id);
            }
        }
        else{
            $_SESSION['photo_extension'] = "invalid extension";
            header('location:edit_user.php?id='.$id);
        }
    }
    
}
else{
    $uplode_file = $_FILES ['pf_photo'];
    if($uplode_file['name']==''){
        $update = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        $update_result = mysqli_query($db_connect, $update);
        $_SESSION['success_edit']='update success';
        header('location:user_view.php');
    }
    else{
        $after_extension = explode('.', $uplode_file['name']);
        $extension = end($after_extension);
        $allow_extension = ['jpg', 'png'];
        if(in_array($extension, $allow_extension)){
            if($uplode_file['size'] <= 1000000){
                $select = "SELECT * FROM users WHERE id=$id";
                $select_result = mysqli_query($db_connect, $select);
                $after_assoc = mysqli_fetch_assoc($select_result);
                $delete_img = '../uplode/user/'.$after_assoc['pf_photo'];
                unlink($delete_img);

                $file_name = $id. '.' .$extension;
                $new_location = '../uplode/user/'. $file_name;
                move_uploaded_file($uplode_file['tmp_name'], $new_location);

                $update = "UPDATE users SET name='$name', email='$email', password='$password', pf_photo='$file_name' WHERE id=$id";
                $update_result = mysqli_query($db_connect, $update);
                $_SESSION['success_edit']='update success';
                header('location:user_view.php');
            }
            else{
                $_SESSION['photo_size'] = "image size is to long";
                header('location:edit_user.php?id='.$id);
            }
        }
        else{
            $_SESSION['photo_extension'] = "invalid extension";
            header('location:edit_user.php?id='.$id);
        }
    }




}

?>