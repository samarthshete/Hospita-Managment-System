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
//echo "<script>confirm('Called New Patinet Registration?');</script>";
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
elseif (isset($_GET['id']) && !empty($_GET['id'])) {
$patient_id=$_GET['id'];
include_once 'connection.php';
    $today =  date("Y-m-d");
    $dept_query = "SELECT dept_id, dept_name FROM departments WHERE pre_exam_only='1' ";
    $result = mysqli_query($con, $dept_query);
    $dept_id_array=array('0');
    $dept_name_array=array('Select Department');
    $dept_count=0;
    while ($row = mysqli_fetch_array($result)){ 
        $dept_id_array[] = $row['dept_id'];
        $dept_name_array[] = $row['dept_name'];
    $dept_count++; }

$patient_query = "SELECT * FROM patient_master WHERE patient_id='".$patient_id."'";
$result=  mysqli_query($con, $patient_query);
if($patient_row=mysqli_fetch_array($result)) {
//$patient_code=$_POST['patient_code'];
//$patient_type=$_POST['patient_type'];
//$reg_date_time=$_POST['reg_date_time'];
//$title=$_POST['title'];
$first_name=$patient_row['first_name'];
$middle_name=$patient_row['middle_name'];
$last_name=$patient_row['last_name'];
//$occupation=$_POST['occupation'];
//$aadharcard_no=$_POST['aadharcard_no'];
//$ration_card_no=$_POST['ration_card_no'];
//$gender=$_POST['gender'];
$date_of_birth=$patient_row['date_of_birth'];
//$guardian_name=$_POST['guardian_name'];
$status=$patient_row['status'];
$landline_nos=$patient_row['landline_nos'];
$mobile_nos=$patient_row['mobile_nos'];
$email_id=$patient_row['email_id'];
//$address1=$_POST['address1'];
//$address2=$_POST['address2'];
//$city=$_POST['city'];
//$pincode=$_POST['pincode'];
//$state=$_POST['state'];
//$language=$_POST['language'];
//$referred_by=$_POST['referred_by'];
//$referrer_contact_nos=$_POST['referrer_contact_nos'];
//$doctor_assigned=$_POST['doctor_assigned'];
//$payment_by=$_POST['payment_by'];
//$payee_details=$_POST['payee_details'];
//$payee_contacts=$_POST['payee_contacts'];
//$last_presciption_id=$_POST['last_presciption_id'];
//$previous_prescription_ids=$_POST['previous_prescription_ids'];
//$last_visit_date_time=$_POST['last_visit_date_time'];
//$next_visit_date_time=$_POST['next_visit_date_time'];
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
date_default_timezone_set('asia/kolkata');
$updated_by = $_SESSION['ActiveUserId'];
$updated_on = date("Y-m-d H:i:s");
}
}
 else {
   echo 'Not inside the code section' ;
}
?>

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Patient Registration Updates</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="dashboard.php?page=update_patient_data&id=<?php echo $patient_id;?>" method="post">
                  <div class="box-body">
                    <div class="form-group col-md-4">
                      <label for="patient_master_patient_id">Patient Reg. No</label>
                      <input type="number" class="form-control" id="patient_id" name="patient_id" readonly value='<?php echo $patient_id; ?>'>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="patient_master_patient_code">Patient Code</label>
                      <input type="text" class="form-control" id="patient_code" name="patient_code" placeholder="Enter CodeNo.">
                    </div>
                      <div class="form-group col-md-4">
                      <label for="patient_master_patient_type">Patient Type</label>
                      <select class="form-control" id="patient_type" name="patient_type">
                          <option value="0">Select Type</option>
                          <option value="Day-Patient">Day-Patient</option>
                          <option value="In-Patient">In-Patient</option>
                          <option value="Surgery-Patient">Surgery-Patient</option>
                          <option value="Trauma-Care">Trauma-Care</option>
                          <option value="Overseas-Patient">Overseas-Patient</option>
                          <option value="Homecare-Patient">Homecare-Patient</option>
                          <option value="Other-Type">Other-Type</option>
                          <option value="Unplanned">Unplanned</option>
                      </select>
                    </div>
                      
                    <div class="form-group col-md-2">
                      <label for="patient_master_title">Prefix</label>
                      <select type="number" class="form-control" id="title" name="title">
                          <option value="Mr."> Mr.</option> 
                          <option value="Mrs."> Mrs.</option>  
                          <option value="Miss.">  Miss </option> 
                          <option value="Dr.">  Dr.</option>
                          <option value="Prof."> Prof.</option> 
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="patient_master_first_name">First Name</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="patient_master_first_name">Middle</label>
                      <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name; ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="patient_master_last_name">Last Name</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
                    </div>
                      
                    <div class="form-group col-md-2">
                      <label for="patient_master_gender">Gender</label>
                      <select class="form-control" id="gender" name="gender">
                          <option value="">-Select-</option>
                          <option value="Male">Male</option> 
                          <option value="Female">Female</option>  
                          <option value="ND">ND</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="patient_master_date_of_birth">Birth Date</label>
                      <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="patient_master_aadharcard_no">Aadhar Card No</label>
                      <input type="text" class="form-control" id="aadharcard_no" name="aadharcard_no" placeholder="Enter 12 Digit No.">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="patient_master_ration_card_no">Ration Card No</label>
                      <input type="text" class="form-control" id="ration_card_no" name="ration_card_no" placeholder="Ration Card Number.">
                    </div>

                      <div class="form-group col-md-4">
                          <label for="patient_master_email_id">Email Id</label>
                          <input type="email" class="form-control" id="email_id" name="email_id" value="<?php echo $email_id; ?>">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_landline_nos">Landline No(s)</label>
                          <input type="text" class="form-control" id="landline_nos" name="landline_nos" value="<?php echo $landline_nos; ?>">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_mobile_nos">Mobile No(s)</label>
                          <input type="text" class="form-control" id="mobile_nos" name="mobile_nos" value="<?php echo $mobile_nos; ?>">
                      </div>

                      <div class="form-group col-md-4">
                          <label for="patient_master_address">Address</label>
                          <input type="text" class="form-control" id="address1" name="address1">
                          <input type="text" class="form-control" id="address2" name="address2">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_city_pincode">City & Pin code</label>
                          <input type="text" class="form-control" id="city" name="city" placeholder="City">
                          <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_city_pincode">State & Country</label>
                          <input type="text" class="form-control" id="state" name="state" placeholder="State">
                          <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_referred_by">Referred By</label>
                          <input type="text" class="form-control" id="referred_by" name="referred_by">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_referrer_contact_nos">Referrer Contact.</label>
                          <input type="text" class="form-control" id="referrer_contact_nos" name="referrer_contact_nos">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_address">Pre-Exam Assigned To</label>
                          <select class="form-control" id="dept_assigned" name="dept_assigned">
                          <?php
                          for($i = 0; $i<=$dept_count;$i++) {
                              $assgn_to_id = $dept_id_array[$i];
                              $assgn_to_dept = $dept_name_array[$i];
                              echo '<option value="' . $assgn_to_id . '">' . $assgn_to_dept . '</option>';
                          }
                          ?>
                      </select>                          
                      </div>
                      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
          </div>
</section>



