<?php
session_start();
$db_connect= mysqli_connect('localhost', 'root', '', 'prac');







if (isset($_POST['name_cng_btn'])) {
    $name= $_POST['name_cng'];
    $id= $_SESSION['db_id'];
    $name_update_query= "UPDATE users SET name='$name' WHERE id='$id'";
    mysqli_query($db_connect,$name_update_query);
    $_SESSION['db_name']=$name;
    header('location:profile.php');
    $_SESSION['name_cng_success']="Name change Success";
}


if (isset($_POST['pass_cng_btn'])) {
    $old_pass= md5($_POST['old_password']);
    $id= $_SESSION['db_id'];
    $old_pass_select="SELECT COUNT(*) AS old_pass FROM users WHERE password= '$old_pass' AND id= '$id'";
    $old_pass_query= mysqli_query($db_connect,$old_pass_select);
    
    $old_pass_after_assoc= mysqli_fetch_assoc($old_pass_query);  
    // print_r($old_pass_after_assoc['old_pass']); 
    
    if ($old_pass_after_assoc['old_pass']==1) {
        
        $new_pass= md5($_POST['new_password']);
        $confirm_pass= md5($_POST['confirm_password']);

        if ($new_pass==$confirm_pass) {
            $new_pass_update_q= "UPDATE users SET password='$new_pass' WHERE id='$id'";
            $new_pass_query= mysqli_query($db_connect,$new_pass_update_q);
            header('location:profile.php');
            $_SESSION['new_confirm_pass_success']="Password updated";
            
            
        }
        else {
            header('location:profile.php');
            $_SESSION['new_confirm_pass_error']="New n confirm not match";
           
        }
         
    }
    else{
        header('location:profile.php');
        $_SESSION['old_pass_error']="Wrong old password";
        
    }
}

if (isset($_POST['img_up_btn'])) {
    $id= $_SESSION['db_id'];

    $naming_part= $_FILES['img_up']['name'];

    $expo= explode('.',$naming_part);
    $extension= end($expo);

    $full_name= $id.'.'.$extension;

    $temp_location= $_FILES['img_up']['tmp_name'];
    $new_location=  "uploads/profile_photos/" . $full_name;

    move_uploaded_file($temp_location, $new_location);

    // update pro pic part start 
    $profile_pic_update_query= "UPDATE users SET default_profile_image='$full_name' WHERE id='$id'";
    $proile_pic_query_db= mysqli_query($db_connect, $profile_pic_update_query);
    $_SESSION['pro_pic_success']= "Profile pic uploaded successfully";

    header('location:profile.php');



    // print_r($temp_location);

    echo "done";


}







?>