<?php
session_start();

// print_r($_POST);

$email = $_POST['email'];
$password = md5($_POST['password']);

$db_connect= mysqli_connect('localhost', 'root', '', 'prac');
$select_query= "SELECT COUNT(*) AS 'result' FROM users WHERE email='$email' AND password='$password'";
$query_db_connect= mysqli_query($db_connect, $select_query);
$db_query_assoc= mysqli_fetch_assoc($query_db_connect);
// print_r($db_query_assoc['result']);

// die();

if ($db_query_assoc['result']==1) {
    
    $select_name_id_query= "SELECT id, name FROM users WHERE email='$email'";
    $select_name_id_db_connect= mysqli_query($db_connect, $select_name_id_query);
    $after_assoc= mysqli_fetch_assoc($select_name_id_db_connect);
    // print_r($after_assoc);

   
    $_SESSION['db_id']= $after_assoc['id'];
    $_SESSION['db_name']= $after_assoc['name'];
    $_SESSION['db_email']= $email;



    header('location: backend/dashboard.php');
    $_SESSION['login_success']="Welcome to dashboard";

    
}
else{
    header('location: signin.php');
    $_SESSION['login_error']="Email or password not match";

}



?>