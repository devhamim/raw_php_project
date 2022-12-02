<?php
require '../db.php';
session_start();
$id =$_POST['id'];
$title =$_POST['title'];
$percent =$_POST['percent'];
$year =$_POST['year'];

$edu_update = " UPDATE about_edus SET  title='$title', percent='$percent', year='$year' WHERE id=$id ";
$edu_update_result = mysqli_query($db_connect, $edu_update);

$_SESSION['update'] = 'Education Update Successfully';
header('location:add_edu.php');

?>