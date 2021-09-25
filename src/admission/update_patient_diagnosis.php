<?php

/* Copyrights by Praxis Infotech (c)2017,2018
 * Product Name: MSHMS V1.0
 * File Name:update_analysis.php
 * File Path:
 * Description: For storing data entered by OPD Consultant.
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
//echo "<script>confirm('Called New Patinet Registration?');</script>";
//    echo 'Called Update Patient Data';
//    echo "<br>POST VALUE:".$_POST['submit'];
if(isset($_POST['submit'])){
//    echo 'Now entered in Self';
    //For Saving New Patient Updates
$patient_id=$_POST['id'];
//$patient_code=$_POST['patient_code'];
//$visit_date_list=$_POST['visit_date_list'];

//From Tab - 1  Patient Reporting (Table: patient_analysis)
$patient_complaint=$_POST['patient_complaint'];
$family_history=$_POST['family_details'];
$past_history=$_POST['past_history'];
$allergies=$_POST['allergies'];
$prev_analysis=$_POST['prev_analysis'];
$prev_treatment=$_POST['prev_treatment'];
$prev_test=$_POST['prev_test'];

//From Tab - 2 Clinical Data (Table: patient_data) 

//From Tab - 3 Principal Diagnosis (Table: patient_analysis)
$other_info=$_POST['other_info'];
$habits=$_POST['habits'];
$disabilities=$_POST['disabilities'];
$analysis=$_POST['analysis'];
$treatment=$_POST['treatment'];
$lab_tests_needed=$_POST['lab_tests_needed'];
$next_action_planned=$_POST['next_action_planned'];
$next_visit_required=$_POST['next_visit_required'];
$next_visit_date=$_POST['next_visit_date'];


//Indirect Data 
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
$doctor_assigned =  $_SESSION['ActiveUserName'];
date_default_timezone_set('asia/kolkata');
$exit_date_time = date("Y-m-d H:i:s");


$table1 = 'patient_analysis';
$table2 = 'patient_data'; //???
$table3= 'queue_data';
include_once '../../connection.php';
$table1_fields = "patient_id,patient_complaint,family_history,past_history,other_info,habits,disabilities,allergies,prev_analysis,prev_treatment,prev_test,analysis,treatment,lab_tests_needed,next_action_planned,next_visit_required,next_visit_date,doctor_assigned";
$table1_values =  "'$patient_id','$patient_complaint','$family_history','$past_history','$other_info','$habits','$disabilities','$allergies','$prev_analysis','$prev_treatment','$prev_test','$analysis','$treatment','$lab_tests_needed','$next_action_planned','$next_visit_required','$next_visit_date','$doctor_assigned'";
$table1_query = "INSERT INTO $table1 (" . $table1_fields . ") VALUES (" . $table1_values . ")";
    echo "Query1 = ".$table1_query;
if(mysqli_query($con, $table1_query)) {
    //STEP-2: Updation to the queue
    $table3_query = "UPDATE `queue_data` SET exit_date_time='$exit_date_time', status = 'check out',enabled='0' WHERE patient_id='$patient_id'";
    mysqli_query($con, $table3_query);

    echo "<br>Query-3 = ".$table3_query;
    //`id`, `patient_id`, `dept_code`, `actor_id`, `entry_date_time`, `exit_date_time`, `status`, `action_link`, `enabled`
echo "<script>alert('Patient Analysis is added successfully to $table1 master');window.location.href='../../dashboard.php';</script>";
} else {
echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='../../dashboard.php';</script>";
}
}

else {
    echo "<br>Not Entering in Code Section";
}
?>