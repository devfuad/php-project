<?php
session_start();


// print_r($_POST);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$preg = preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password);
$flag = false;

if ($name) {

    if(ctype_alpha($name)){
    $_SESSION['old_name'] = $name;
    }
    else{
        $flag = true;
        $_SESSION['name_error'] = "Name is invalid";
    }
    
} 
else {
    $flag = true;
    $_SESSION['name_error'] = "Name is missing";
    
}

// name end 

if ($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['old_email'] = $email;
    }
    else{
        $flag = true;
        $_SESSION['email_error'] = "Email is invalid";
    }
    
} 
else {
    $flag = true;
    $_SESSION['email_error'] = "Email is missing";
    
}

// email end 

if ($password) {

    if (strlen($password) > 8) {

        if($preg !=1){
            $_SESSION['password_error'] = "Password Should have C, S, N, Schr";
        }
    
    }
    else{
        $flag = true;
        $_SESSION['password_error'] = "Password should be more than 8 char";
    }
    
} 
else {
    $flag = true;
    $_SESSION['password_error'] = "Password is missing";
    
}

// password end 

if ($confirm_password) {
    
    
} 
else {
    $flag = true;
    $_SESSION['confirm_password_error'] = "Confirm password is missing";
    
}

// confirm password end 

if ($password != $confirm_password) {
    $_SESSION['password_error'] = "Password Not matched";
}


if ($flag) {
    header('location: signup.php');
}
else{
    $encrypt_password = md5($password);
    $db_connect = mysqli_connect('localhost', 'root', '', 'prac');
    

    $duplicate_email_select = "SELECT COUNT(*) AS 'duplicate_email' FROM users WHERE email='$email';";
    $duplicate_email_connect= mysqli_query($db_connect, $duplicate_email_select);
    $dupli_email_query= mysqli_fetch_assoc($duplicate_email_connect);
    // print_r($dupli_email_query['email']);

    if ($dupli_email_query['duplicate_email']==1) {
        header('location:signup.php');
        $_SESSION['email_exist'] = "This email already exist";
    //    echo "This email already exist";
    }
    else{$insert_query = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$encrypt_password')";   
        $query_db_connect = mysqli_query($db_connect, $insert_query);
        header('location:signin.php');
        $_SESSION['signup_success'] = "Your account has been created Successfully";}
    

}






?>