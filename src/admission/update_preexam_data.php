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
if(isset($_POST['submit'])){
//    echo 'Now entered in Self';
    //For Saving New Patient Updates
$table = 'patient_data';
    $patient_id=$_GET['id'];

$bloodgrp=$_POST['bloodgrp'];
$tempreture=$_POST['tempreture'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$blood_pressure=$_POST['blood_pressure_systolic']." - ".$_POST['blood_pressure_diastolic'];
$heart_rate=$_POST['heart_rate'];
$resp_rate=$_POST['resp_rate'];
$symptoms=$_POST['symptoms'];
$treatment_plan=$_POST['treatment_plan'];
$test_required="None";
//$next_action=$_POST['next_actions'];
include_once 'connection.php';
$table_fields = "patient_id,bloodgrp,temperature,height,weight,blood_pressure,heart_rate,resp_rate,symptoms,treatment_plan,test_required,next_actions,next_queue_dept";
$table_values =  "'$patient_id','$bloodgrp','$temperature','$height','$weight','$blood_pressure','$heart_rate','$resp_rate','$symptoms','$treatment_plan','$test_required','$next_actions','$next_queue_dept'";
$table_query = "INSERT INTO $table (" . $table_fields . ") VALUES (" . $table_values . ")";
if(mysqli_query($con, $table_query)) {
$queue_update_query="UPDATE queue_data SET actor_id='$dept_assigned',action_link='dashboard.php?page=patient_diagnosis&id=$patient_id',status='consulting' WHERE patient_id='".$patient_id."'";
    echo "<br>Queue Update Query = ".$queue_update_query;
    if($result=  mysqli_query($con, $queue_update_query)){
        echo "<script>alert(\"Patinet has been transferred to Next Queue\");window.location.href=\"dashboard.php\"</script>";
    }    
else {
echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=crud_$table';</script>";
}

} else {
           echo "<script>alert('Error E-010: Module new_patinet_reg to Next Queue');window.location.href='dashboard.php'</script>'";
    }
      
}
else {
    echo "<br>Not Entering in Code Section";
}
?>

