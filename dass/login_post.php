<?php 
session_start();
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$select_email = "SELECT COUNT(*) as email_exist FROM users WHERE email='$email' ";
$select_email_result = mysqli_query($db_connect, $select_email);
$after_assoc_email = mysqli_fetch_assoc($select_email_result);

if($after_assoc_email['email_exist'] == 1){
    $select_password = "SELECT * FROM users WHERE email='$email' ";
    $select_password_result = mysqli_query($db_connect, $select_password);
    $after_assoc_password = mysqli_fetch_assoc($select_password_result);

    if(password_verify($password,  $after_assoc_password['password'])){
        $_SESSION['dashboard_login'] = "dashboard";
        $_SESSION['name'] = $after_assoc_password['name'];
        $_SESSION['photo'] = $after_assoc_password['pf_photo'];
        $_SESSION['id'] = $after_assoc_password['id'];
        $_SESSION['role'] = $after_assoc_password['role'];
        header('location:dashboard.php');
    }
    else{
        $_SESSION['password_login'] = "worang password";
        header('location:login.php');
    }
}
else{
    $_SESSION['email_login'] = "email dos't exist";
    header('location:login.php');
}

?>