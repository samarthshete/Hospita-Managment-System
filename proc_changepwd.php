<?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    date_default_timezone_set('asia/kolkata');
    $created_by=$_SESSION['ActiveUserId'];
    $created_datetime = date("Y-m-d H:i:s");
    include 'connection.php';
    $pwd_query="SELECT password FROM users WHERE user_id = '".$_SESSION['ActiveUserId']."'";
    $result = mysqli_query($con,$pwd_query );
    $row = mysqli_fetch_array($result);
    if($row['password'] == md5($_POST['current_pass']))
    {
        if($_POST['new_pass'] == $_POST['retype_pass'])
        {
            $new_password=md5($_POST['new_pass']);
            $pwd_change_query = "UPDATE users SET updated_by = '$created_by', updated_on = '$created_datetime', password = '$new_password' WHERE user_id = '$created_by'";
            if(mysqli_query($con,$pwd_change_query))
            {
                echo "<script>alert('Password Changed Successfully..');window.location.href='dashboard.php';</script>";
            }
            else
            {
                //echo "<script>alert('Wrong Old Password Entered ".$_POST['current_pass']." Please try again...');window.location.href='dashboard.php?page=changepwd';</script>";
                echo "<script>alert('Please try again...');window.location.href='dashboard.php?page=changepwd';</script>";
            }
        }    
        else
        {
            echo "<script>alert('New Password ".$_POST['retype_pass']." and Rentered Password ".  $_POST['new_pass']." Mismatch');window.location.href='dashboard.php?page=changepwd';</script>";
        }
    }
    else
    {
        echo "<script>alert('Current Password Mismatch');window.location.href='dashboard.php?page=changepwd';</script>";
    }
   ?>

