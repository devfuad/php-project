<?php
session_start();

$db_connect = mysqli_connect('localhost', 'root', '', 'prac');

$id=$_GET['id'];

$select_data= "SELECT * FROM personal WHERE id='$id'";
$select_impl= mysqli_query($db_connect, $select_data);
$after_impl_assoc= mysqli_fetch_assoc($select_impl);


if ($after_impl_assoc['status']=='active') {
    $update_status="UPDATE personal SET status='deactive' WHERE id='$id'";
    $update_status_impl=mysqli_query($db_connect, $update_status);
    header('location:view_personal.php');
}else{
    $update_status="UPDATE personal SET status='active' WHERE id='$id'";
    $update_status_impl=mysqli_query($db_connect, $update_status);
    header('location:view_personal.php');
}





?>