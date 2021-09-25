
  <?php
// Program to authenticate user by checking login & password from table users
if ($_POST) {
    $database_table = 'users';
    include('connection.php');
    // Fetch the fields from database table from POST
    $login = $_POST['login'];
    $password = md5($_POST["password"]);
    // Create query - run query - fetch results into query array
    $login_query = "SELECT * FROM ".$database_table." WHERE login='$login' and password='$password'";
    $login_result = mysqli_query($con, $login_query);
    $login_result_array = mysqli_fetch_array($login_result);
    //Check if the user exists
    if($login_result_array){
        $is_user_active = $login_result_array['active'];
         if($is_user_active){
             if(session_status() !== PHP_SESSION_ACTIVE) session_start();
             date_default_timezone_set('asia/kolkata');
             $_SESSION['ActiveUserId'] = $login_result_array['user_id'];
             $_SESSION['ActiveUserName'] = $login_result_array['username'];
             $created_on_dttm=strtotime($login_result_array['created_on']);
             $_SESSION['ActiveUserCreatedOn'] = date('d/m/y H:i:s', $created_on_dttm);
             $_SESSION['ActiveUserRole'] = $login_result_array['role_id'];
             $_SESSION['ActiveUserDepartment'] = $login_result_array['dept_id'];
             $current_dt_tm= date("Y-m-d H:i:s");
             $Update_login_status_query = "UPDATE users SET login_status='1',last_login_on='" . $current_dt_tm . "' WHERE user_id=" . $_SESSION['ActiveUserId'];
             $Update_Result = mysqli_query($con, $Update_login_status_query);
             echo "Update_Result =".$Update_Result;
                          mysqli_close($con);
             print_r($_SESSION);
             // Allow to enter into dashboard if login status is updated
             header("Location:dashboard.php");
             //else echo "<script>alert('ERROR-AUTH-004: System is busy, Please login after 10 minuts');window.location.href='login.php';</script>";
         }
         else {
             echo "<script>alert('ERROR-AUTH-003: User is NOT ACTIVATED. Contact Administrator');window.location.href='login.php';</script>";
         }
    }
    else {
       echo "<script>alert('ERROR-AUTH-002: Entered Wrong username or password, Please Check..');window.location.href='login.php';</script>";
    }
  }
 
else { 
    echo "<script>alert('ERROR-AUTH-001: Not entered into Authentication Code ');window.location.href='login.php';</script>";
}
?>   
