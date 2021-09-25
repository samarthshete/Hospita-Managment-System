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
    echo 'Now entered in Self';
    //For Saving New Patient Updates
$patient_id=$_POST['patient_id'];
$patient_code=$_POST['patient_code'];
$patient_type=$_POST['patient_type'];
$title=$_POST['title'];
$first_name=$_POST['first_name'];
$middle_name=$_POST['middle_name'];
$last_name=$_POST['last_name'];
//$occupation=$_POST['occupation'];
$aadharcard_no=$_POST['aadharcard_no'];
$ration_card_no=$_POST['ration_card_no'];
$gender=$_POST['gender'];
$date_of_birth=$_POST['date_of_birth'];
$guardian_name=$_POST['guardian_name'];
//$status=$_POST['status'];
$landline_nos=$_POST['landline_nos'];
$mobile_nos=$_POST['mobile_nos'];
$email_id=$_POST['email_id'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$state=$_POST['state'];
$country=$_POST['country'];
$dept_assigned=$_POST['dept_assigned'];
$referred_by=$_POST['referred_by'];
$referrer_contact_nos=$_POST['referrer_contact_nos'];
//$doctor_assigned=$_POST['doctor_assigned'];
$set_value_list = "patient_code='$patient_code',patient_type='$patient_type',title='$title',first_name='$first_name',middle_name='$middle_name',last_name='$last_name',aadharcard_no='$aadharcard_no',ration_card_no='$ration_card_no',gender='$gender',date_of_birth='$date_of_birth',landline_nos='$landline_nos',mobile_nos='$mobile_nos',email_id='$email_id',address1='$address1',address2='$address2',city='$city',pincode='$pincode',state='$state',country='$country',referred_by='$referred_by',referrer_contact_nos='$referrer_contact_nos'";
$patient_query = "UPDATE patient_master SET $set_value_list WHERE patient_id='".$patient_id."'";
if($result=  mysqli_query($con, $patient_query)){
    $queue_update_query="UPDATE queue_data SET actor_id='$dept_assigned',action_link='dashboard.php?page=update_patient_data&id=$patient_id',status='in process'";
    if($result=  mysqli_query($con, $queue_update_query)){
        echo "<script>alert(\"Patinet has been transferred to Next Queue\");window.location.href=\"dashboard.php\"</script>";
    }
} else {
            echo "<script>alert('Error E-010: Module new_patinet_reg to Next Queue');window.location.href='dashboard.php'</script>'";
    }
        
}


?>

