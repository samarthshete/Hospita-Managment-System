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

$table_1 = 'queue_data';
$table_2 = 'patient_master';
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    date_default_timezone_set('asia/kolkata');
    $created_by = $_SESSION['ActiveUserId'];
    $created_on = date("Y-m-d H:i:s");
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once '../../connection.php';
    //To get next id for the queue
    $seq_id=$_GET['id'];
    $strsql = "SELECT MAX(patient_id) pid FROM ".$table_2;
    $result = mysqli_query($con, $strsql);
    $arr_result = mysqli_fetch_array($result);
    $NextPatientNo = $arr_result['pid'] + 1;
    //To get next patient_id for the patient_master
    $strsql = "SELECT MAX(id) qid FROM ".$table_1;
    $result = mysqli_query($con, $strsql);
    $arr_result = mysqli_fetch_array($result);
    $NextRecordNo = $arr_result['qid'] + 1;
    
    //Fetch Record from appointments registered
    $appt_select_query = "SELECT * FROM appointments WHERE seq_no='$seq_id'";
    $result = mysqli_query($con, $appt_select_query);
    $appt_row = mysqli_fetch_array($result);
    //echo "Next Rec. = ".$NextRecordNo;
    if($appt_row){ 
        //echo "<br> Entered inside the code";
        //`seq_no`, `first_name`, `middle_name`, `last_name`, `email_id`, `mobile_nos`, `date_of_birth`, `deparment_sought`
    $patient_id = $NextPatientNo;
    $dept_code = $appt_row['deparment_sought'];
     //   $ = $appt_row[''];
    $first_name = $appt_row['first_name'];
    $middle_name = $appt_row['middle_name'];
    $last_name = $appt_row['last_name'];
    $email_id = $appt_row['email_id'];
    $mobile_nos = $appt_row['mobile_nos'];
    $date_of_birth = $appt_row['date_of_birth'];
    $entry_date_time = date("Y-m-d H:i:s");
    $status = 'waiting';
    $action_link = 'dashboard.php?page=new_patient_reg&id='.$patient_id;
    $enabled = '1';
    //`id`, `patient_id`, `dept_code`, `actor_id`, `entry_date_time`, `exit_date_time`, `status`, `action_link`, `enabled`
    $appt_fields = "(patient_id, dept_code, entry_date_time, status, enabled,action_link)";
    $appt_values = "('$patient_id','$dept_code','$entry_date_time','$status','$enabled','$action_link')";
    $appt_to_queue_query = "INSERT INTO queue_data $appt_fields VALUES $appt_values";
    //echo "<br>Query_Query =".$appt_to_queue_query;
       if(mysqli_query($con,$appt_to_queue_query)){
           //echo "<br> Added to queue and updating patinet_master";
           //Now we add record to patient_Master Table
           $patinet_master_fields = "patient_id,first_name,middle_name,last_name,email_id,mobile_nos,date_of_birth,reg_date_time";
           $patient_master_values = "'$patient_id','$first_name','$middle_name','$last_name','$email_id','$mobile_nos','$date_of_birth','$created_on'";
           $patinet_master_query = "INSERT INTO patient_master ($patinet_master_fields) VALUES($patient_master_values)";
           echo "<br>Patient_Master_Query =".$patinet_master_query;
           if(mysqli_query($con,$patinet_master_query)){
           $appt_update_query = "UPDATE appointments SET  confirmed='1', moved_to_queue='1', queue_id='$NextRecordNo',visit_date_time='$created_on'  WHERE seq_no=$seq_id";
           echo "<br>Appintment_update_Query=".$appt_update_query;
           mysqli_query($con,$appt_update_query);
                      echo "<script>alert('Appointment is now moved to queue & Patinet Master successfully ... Thanks');window.location.href='../../dashboard.php'<script>";

           }
           else {
             echo "<br>Filed Patient_Master_Query=".$patinet_master_query;  
           }

           echo "<script>alert('Appointment is now moved to queue & Patinet Master successfully ... Thanks');;window.location.href='../../dashboard.php'<script>";
           }
       else {
           echo "<br> Errpr Not added to queue and updating patinet_master";
           echo "<script>alert('Error in Queue Module: E-001: Not moved from appointment to queue');;window.location.href='../../dashboard.php'<script>";
       }
   }
   else {
           echo "<script>alert('Error From Appointment Module: E-002: Record Not found ...');;window.location.href='../../dashboard.php'<script>";
   }
    
}
 else {
echo "Not in Code Section"  ;  
}
    ?>