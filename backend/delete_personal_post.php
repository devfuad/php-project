<?php
session_start();

$db_connect = mysqli_connect('localhost', 'root', '', 'prac');

$id = $_GET['id'];


$delete_personal = "DELETE FROM `personal` WHERE id='$id'";
$delete_impl= mysqli_query($db_connect,$delete_personal);
header('location:view_personal.php');


?>