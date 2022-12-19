<?php
session_start();
$db_connect= mysqli_connect('localhost', 'root', '', 'prac');

$service_title = $_POST['service_title'];
$service_description = $_POST['service_description'];
$service_icon = $_POST['service_icon'];
$status = $_POST['status'];

$service_insert_q= "INSERT INTO `services`(`service_title`, `service_description`, `service_icon`, `status`) VALUES ('$service_title','$service_description','$service_icon','$status')";
$service_impl= mysqli_query($db_connect, $service_insert_q);
$_SESSION['operation_success']= "Operation Success";

header('location: services.php');


?>