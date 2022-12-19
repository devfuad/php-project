<?php

session_start();

$db_connect = mysqli_connect('localhost', 'root', '', 'prac');

$id = $_POST['id'];
$personal_title = $_POST['personal_title'];
$personal_description = $_POST['personal_description'];
$status = $_POST['status'];

$update_personal= "UPDATE personal SET personal_title='$personal_title',personal_description='$personal_description', status='$status' WHERE id='$id'";

$update_impl= mysqli_query($db_connect, $update_personal);

header('location:view_personal.php');


?>