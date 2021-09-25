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
if (isset($_POST['submit'])) {
    $table1 = 'patient_master'    ;
    // For table: patient_master ...
    $patient_id = $_POST['patient_id'];
    $patient_code = $_POST['patient_code'];
    $patient_type = $_POST['patient_type'];
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $aadharcard_no = $_POST['aadharcard_no'];
    $ration_card_no = $_POST['ration_card_no'];
    $email_id = $_POST['email_id'];
    $landline_nos = $_POST['landline_nos'];
    $mobile_nos = $_POST['mobile_nos'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $referred_by = $_POST['referred_by'];
    $referrer_contact_nos = $_POST['referrer_contact_nos'];

    print_r($_POST);
    $reg_date_time = date("Y-m-d");
    $pm_table_fields = "patient_id,patient_code,patient_type,reg_date_time,title,first_name,middle_name,last_name,aadharcard_no,ration_card_no,gender,date_of_birth,landline_nos,mobile_nos,email_id,address1,address2,city,pincode,state,country,referred_by,referrer_contact_nos";
    $pm_table_values = "'$patient_id','$patient_code','$patient_type','$reg_date_time','$title','$first_name','$middle_name','$last_name','$aadharcard_no','$ration_card_no','$gender','$date_of_birth','$landline_nos','$mobile_nos','$email_id','$address1','$address2','$city','$pincode','$state','$country','$referred_by','$referrer_contact_nos'";
    $pm_table_query = "INSERT INTO $table1 (" . $pm_table_fields . ") VALUES (" . $pm_table_values . ")";
//    echo "PM Query = " . $pm_table_query;
    // For table: ipd_general_master...
    $ipd_admission_date = $_POST['ipd_admission_date'];
    $ipd_attending_doctor_id = $_POST['ipd_attending_doctor_id'];
    $ipd_gen_staff_list = implode(',', $_POST['ipd_gen_staff_list']);
    $bed_allocation_id = $_POST['rbid'];
    //$operation_reqd = $_POST['operation_reqd'];
    //For manipulating date variables
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    date_default_timezone_set('asia/kolkata');
    $created_by = $_SESSION['ActiveUserId'];
    $created_on = date("Y-m-d H:i:s");
    $block_from_date = strtotime($ipd_admission_date);
    $block_from_date_str = date("Y-m-d H:i:s", strtotime($ipd_admission_date));
    $block_till_date = date("Y-m-d", strtotime("+2 days", $block_from_date));
    $ipd_gen_status = "admitted";
    $table2 = 'ipd_general_master';
    $igm_table_fields = "patient_id,ipd_gen_status,ipd_admission_date,bed_allocation_id,ipd_attending_doctor_id,ipd_gen_staff_list,created_by,created_on";
    $igm_table_values = "'$patient_id','$ipd_gen_status','$ipd_admission_date','$bed_allocation_id','$ipd_attending_doctor_id','$ipd_gen_staff_list','$created_by','$created_on'";
    $igm_table_query = "INSERT INTO $table2 (" . $igm_table_fields . ") VALUES (" . $igm_table_values . ")";
//echo "<br>IPD GEN MST Query = " . $igm_table_query;


    $table3 = 'room_beds_master';
    $rbm_table_query = "UPDATE $table3 SET occupied_now='1',block_from_date='$block_from_date_str',block_till_date='$block_till_date',patient_id='$patient_id' WHERE rbid='$bed_allocation_id'";
//echo "<br>RBM  Query = " . $rbm_table_query;

    include_once 'connection.php';
    if (mysqli_query($con, $pm_table_query)) {
        if (mysqli_query($con, $igm_table_query)) {
            echo "<br>RBM  Query = " . $rbm_table_query;
            if (mysqli_query($con, $rbm_table_query)) {
                echo "<script>alert('Patient is admitted successfully');window.location.href='dashboard.php;</script>";
            }
        }
    } else {
        echo "<script>alert('ERROR: 001 - This Patient record can't be added ...');window.location.href='dashboard.php';</script>";
    }
} else {
    echo "Warning: Not in Save IPD Registration Code Section ...";
}
?>

