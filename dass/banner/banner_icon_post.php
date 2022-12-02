<?php
require '../db.php';

$icon = $_POST['icon'];
$link = $_POST['link'];

$insert = " INSERT INTO banner_icon(icon, link)VALUE('$icon','$link')";
$insert_result = mysqli_query($db_connect, $insert);

header('location:banner_icon.php');

?>