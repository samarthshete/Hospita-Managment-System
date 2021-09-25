<?php
include_once '../../connection.php';
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
// table : appointments
//'seq_no,first_name,middle_name,last_name,email_id,mobile_nos,date_of_birth,deparment_sought,reason_for_appointment,request_date,time_slot,patient_password,appointment_id'
////'$seq_no','$first_name','$middle_name','$last_name','$email_id','$mobile_nos','$date_of_birth','$deparment_sought','$reason_for_appointment','$request_date','$time_slot','$patient_password','$appointment_id'
echo '<script>confirm("Proceed to book the appointment?");</script>';
include_once '../../src/common/mshmslib.php';
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$email_id = $_POST['email_id'];
$mobile_nos = $_POST['mobile_nos'];
$date_of_birth = $_POST['date_of_birth'];
$deparment_sought = $_POST['deparment_sought'];
$reason_for_appointment = $_POST['reason_for_appointment'];
$request_date = $_POST['request_date'];
$time_slot_array = explode('-',$_POST['time_slot']);
$time_slot=$time_slot_array[0].":00:00";
$patient_password=random_code(8);
// $patient_password=$_POST['patient_password'];
//$strQuery="INSERT into prescription(prscdate, patientid, medicinelist,medicine_count)values('$dtPresDate','$intPatientId','$strMedicineList','$intMedicineCount')";

$appointment_query="insert into appointments(first_name,middle_name,last_name,email_id,mobile_nos,date_of_birth,deparment_sought,reason_for_appointment,request_date,time_slot,patient_password)values('$first_name','$middle_name',' $last_name','$email_id','$mobile_nos',' $date_of_birth','$deparment_sought',' $reason_for_appointment',' $request_date','$time_slot','$patient_password')";
echo "Query = ".$appointment_query;
 
 if($res=  mysqli_query($con, $appointment_query)) {
     echo "No Error has occurred";
 } else {
     echo "Error has occurred"; }


header("Location:../../dashboard.php");
?>


