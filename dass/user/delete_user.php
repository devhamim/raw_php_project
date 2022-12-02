<?php 

require '../db.php';

session_start();
$id = $_GET['id'];

$select = "SELECT * FROM users WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);
$delete_img = '../uplode/user/'.$after_assoc['pf_photo'];
unlink($delete_img);

$delete = "DELETE FROM users WHERE id=$id";
$delete_user = mysqli_query($db_connect ,$delete );


$_SESSION['del'] = 'delete successfully';
header('location:user_view.php');

?>

