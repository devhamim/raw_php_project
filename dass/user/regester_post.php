<?php  

session_start();

require '../db.php';

$errors = [];
$filde_names = ['name' =>'name required', 'email'=>'email required', 'password'=>'password required', 'confirm_password' => 'confirm_password required'];

foreach($filde_names as $filde_name=>$message){
    if(empty($_POST[$filde_name])){
        $errors [$filde_name] = $message;
    }
}


if(count($errors) == 0){
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['invalid'] = 'invalide email';
        header('location:user_view.php');
    }
    else if($_POST['password'] != $_POST['confirm_password']){
        $_SESSION['pass'] = 'password not match';
        header('location:user_view.php');
    }
    else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $after_hash = password_hash($password, PASSWORD_DEFAULT);
        $role = $_POST['role'];

        $select_email = " SELECT COUNT(*) as email_exist FROM users WHERE email='$email' ";
        $select_email_result = mysqli_query($db_connect, $select_email);
        $after_assoc = mysqli_fetch_assoc($select_email_result);

        if($after_assoc['email_exist'] == 1){
            $_SESSION['email_exist'] = "email alrady exist";
            header("location:user_view.php");
        }
        else{

            $uplode_file = $_FILES ['pf_photo'];
            $after_extension = explode('.', $uplode_file['name']);
            $extension = end($after_extension);
            $allow_extension = ['jpg', 'png'];
            if(in_array($extension, $allow_extension)){
                if($uplode_file['size'] <= 1000000 ){
                    $insart = "INSERT INTO users(name, email, password, role)VALUES('$name', '$email', '$after_hash', '$role')";
                    mysqli_query($db_connect, $insart);
                    $id = mysqli_insert_id($db_connect);
                    $file_name = $id. '.' .$extension;
                    $new_location = '../uplode/user/'. $file_name;
                    move_uploaded_file($uplode_file['tmp_name'], $new_location);
                    $update = " UPDATE users SET pf_photo='$file_name' WHERE id=$id ";
                    $update_result = mysqli_query($db_connect, $update);

                    $_SESSION['success'] = "regester successfully";
                    header('location:user_view.php');
                }
                else{
                    $_SESSION['photo_size'] = "image size is to long";
                    header('location:user_view.php');
                }
            }
            else{
                $_SESSION['photo_extension'] = "invalid extension";
                    header('location:user_view.php');
            }

            
            
        }
    }
}
else{
    $_SESSION['errors'] = $errors;
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    header('location:user_view.php');
}

?>