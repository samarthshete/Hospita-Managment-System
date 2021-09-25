<?php

/* Copyrights by Praxis Infotech (c)2017,2018
 * Product Name: MSHMS V1.0
 * File Name:
 * File Path:
 * Description:
 * //Purpose :
 * First Created By: Sr. Tech Leader, Praxis Infotech
 * First Created On: Jan 4, 2018 @15:05
 * Modified By:
 * Modified On:
 * Reason for Modifications:
 * 1.
 * Latest Version Label:
 */

// Start Typing from Here ....
$table='employee_master';
if(isset($_POST['submit'])) {
//$emp_id=$_POST['emp_id'];
$reg_no=$_POST['reg_no'];
$prefix=$_POST['emp_prefix'];
$emp_first_name=$_POST['emp_first_name'];
$emp_middle_name=$_POST['emp_middle_name'];
$emp_last_name=$_POST['emp_last_name'];
$gender=$_POST['gender'];
$emp_date_of_birth=$_POST['emp_date_of_birth'];
$address=$_POST['address1'].",".$_POST['address2'];
$city=$_POST['city'];
$pin_zip_code=$_POST['pin_zip_code'];
$state=$_POST['state'];
$country=$_POST['country'];
$mobile_nos=$_POST['mobile_nos'];
$landline_no=$_POST['landline_nos'];
$emp_email_id=$_POST['emp_email_id'];
$emp_aadhar_card_no=$_POST['emp_aadhar_card_no'];
$emp_pancard_no=$_POST['emp_pancard_no'];
$emp_passport_no=$_POST['emp_passport_no'];
$dept_id=$_POST['dept_id'];
$joining_date=$_POST['joining_date'];
$job_type=$_POST['job_type'];
$emp_designation=$_POST['emp_designation'];
$specialities=$_POST['specialities'];
$emp_duty_timing_in=$_POST['emp_duty_timing_in'];
$emp_duty_timing_out=$_POST['emp_duty_timing_out'];
$exit_date=$_POST['exit_date'];
$doc_paths=serialize($_POST['fileToUpload']);
$doc_count=count($doc_paths);
$document_path_list='';
for($i=0;$i<$doc_count;$i++){$document_path_list.=$doc_paths[$i].",";}
//$document_ref_idlist=$_POST['document_ref_idlist'];
//$document_path_list=$_POST['document_path_list'];
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
date_default_timezone_set('asia/kolkata');
$created_by = $_SESSION['ActiveUserId'];
$created_on = date("Y-m-d H:i:s");
print_r($_POST);
if((strlen($emp_first_name)!= 0) && (strlen($emp_last_name)!= 0)){
include_once '../../connection.php';
$table_fields = "reg_no,prefix,emp_first_name,emp_middle_name,emp_last_name,gender,emp_date_of_birth,address,city,pin_zip_code,state,country,mobile_nos,landline_nos,emp_email_id,emp_aadhar_card_no,emp_pancard_no,emp_passport_no,dept_id,joining_date,job_type,emp_designation,specialities,emp_duty_timing_in,emp_duty_timing_out,exit_date,document_path_list";
$table_values =  "'$reg_no','$prefix','$emp_first_name','$emp_middle_name','$emp_last_name','$gender','$emp_date_of_birth','$address','$city','$pin_zip_code','$state','$country','$mobile_nos','$landline_no','$emp_email_id','$emp_aadhar_card_no','$emp_pancard_no','$emp_passport_no','$dept_id','$joining_date','$job_type','$emp_designation','$specialities','$emp_duty_timing_in','$emp_duty_timing_out','$exit_date','$document_path_list'";
$table_query = "INSERT INTO $table (" . $table_fields . ") VALUES (" . $table_values . ")";
echo "<br> Emp Reg Query = ".$table_query;
if(mysqli_query($con, $table_query)) {
    $table2='users';
$table_fields = "role_id,dept_id,username,login,password,email_d,mobile_no,created_by,created_on,updated_by,updated_on,active,last_login_on,last_logout_at,photo,login_status";
$table_values =  "'$role_id','$dept_id','$username','$login','$password','$email_d','$mobile_no','$created_by','$created_on','$updated_by','$updated_on','$active','$last_login_on','$last_logout_at','$photo','$login_status'";
$table_query = "INSERT INTO $table2 (" . $table_fields . ") VALUES (" . $table_values . ")";
if(mysqli_query($con, $table_query)) {
echo "<script>alert('New record is added successfully to $table master');window.location.href='dashboard.php?page=crud_$table';</script>";
} else {
echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=crud_$table';</script>";
}
    echo "<script>alert('New record is added successfully to $table master');window.location.href='dashboard.php';</script>";
} else {
echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php';</script>";
}
}
else {
    echo "<script>alert('ERROR: 002 - Name Fields are empty ...');window.location.href='../../dashboard.php';</script>";

}

}
else {
        echo "<script>alert('Error in Employee Registration E-010: Not Entered in Submit Section ...');//window.location.href='dashboard.php'";
        echo "\n</script>'";
}



