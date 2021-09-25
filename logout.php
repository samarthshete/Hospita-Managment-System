<?php
include_once 'connection.php';
echo "Logging Out Now.";
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
date_default_timezone_set('asia/kolkata');
$datetimeLastLogout= date("Y-m-d H:i:s");
$txtUpdate = "UPDATE users SET login_status='0',last_logout_at='". $datetimeLastLogout."' where user_id='".$_SESSION['ActiveUserId']."'";
$str= mysqli_query($con,$txtUpdate);
unset($_SESSION['loginuser']);
unset($_SESSION['ActiveUserName']);
unset($_SESSION['ActiveUserId']);
unset($_SESSION['ActiveUserCreatedOn']);
unset($_SESSION['role']);
unset($_SESSION['ActiveUserDepartment']);

 header("Location:login.php");
?>