<?php

$db_connect= mysqli_connect('localhost', 'root', '', 'prac');

$personal_title = $_POST['personal_title'];
$personal_description = $_POST['personal_description'];
$status = $_POST['status'];

$personal_insert_q= "INSERT INTO `personal`(`personal_title`, `personal_description`,`status`) VALUES ('$personal_title','$personal_description','$status')";
$personal_impl= mysqli_query($db_connect, $personal_insert_q);
header('location: personal.php');



// print_r($_POST);



?>