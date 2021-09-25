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

include_once 'connection.php';
$pid_query = "SELECT MAX(patient_id) as pid FROM patient_master";
$result=  mysqli_query($con, $pid_query);
$row=mysqli_fetch_array($result);
$next_patient_id = $row['pid']+1;
//echo "New Patient Id = ". $next_patient_id;

$room_bed_query="SELECT rbid,room_no, bed_no FROM `room_beds_master` WHERE `occupied_now`='0'";
$result=mysqli_query($con,$room_bed_query);
$room_bed_array=mysqli_fetch_all($result,MYSQLI_ASSOC);
$rb_count=count($room_bed_array);
//print_r($room_bed_array);


$op_dr_query="SELECT emp_id, emp_first_name, emp_middle_name, emp_last_name FROM employee_master WHERE prefix='Dr.'";
//echo "Dr. Query = ".$op_dr_query;
$result=mysqli_query($con,$op_dr_query);
$op_dr_array=mysqli_fetch_all($result,MYSQLI_ASSOC);
$op_dr_count=count($op_dr_array);
//print_r($nursing_staff_array);


$nursing_staff_query="SELECT emp_id, emp_first_name, emp_middle_name, emp_last_name FROM employee_master WHERE emp_designation LIKE '%IPD Nurse%'";
//echo "Nursing Query = ".$nursing_staff_query;
$result=mysqli_query($con,$nursing_staff_query);
$nursing_staff_array=mysqli_fetch_all($result,MYSQLI_ASSOC);
$nursing_staff_count=count($nursing_staff_array);
//print_r($nursing_staff_array);
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
                <form role="form" action="dashboard.php?page=save_ipd_registration" method="post">
                  <div class="box-body">
                    <div class="form-group col-md-4">
                      <label for="patient_master_patient_id">Patient Reg. No</label>
                      <input type="number" class="form-control" id="patient_id" name="patient_id" readonly value='<?php echo $next_patient_id; ?>'>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="patient_master_patient_code">Patient Code</label>
                      <input type="text" class="form-control" id="patient_code" name="patient_code" placeholder="Enter CodeNo.">
                    </div>
                      <div class="form-group col-md-4">
                      <label for="patient_master_patient_type">Patient Type</label>
                      <select class="form-control" id="patient_type" name="patient_type">
                          <option value="0">Select Type</option>
                          <option value="In-Patient">In-Patient</option>
                          <option value="Surgery-Patient">Surgery-Patient</option>
                          <option value="Trauma-Care">Trauma-Care</option>
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
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Your First Name">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="patient_master_first_name">Middle</label>
                      <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Your Middle Name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="patient_master_last_name">Last Name</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Your Last Name">
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
                          <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Your Email Id">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_landline_nos">Landline No(s)</label>
                          <input type="text" class="form-control" id="landline_nos" name="landline_nos" placeholder="Your Landline No.">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_master_mobile_nos">Mobile No(s)</label>
                          <input type="text" class="form-control" id="mobile_nos" name="mobile_nos" placeholder="Your Mobile No.">
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
                <div class="col-xs-4 col-sm-4 col-md4">
                        <label>IPD Admission Date</label>
                        <input type="datetime-local" name="ipd_admission_date" id="operation_reqd" class="form-control" value="<?php echo $nowdatetime; ?>">
                        <div class="validation"></div>
                    </div>  

                <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>Attending Doctor Name</label>
                        <select name="ipd_attending_doctor_id" id="ipd_attending_doctor_id" class="form-control input-md" >
                             <option value=''> -- Select IPD Doctor Name -- </option>
                        <?php 
                        for($i=0;$i<$op_dr_count;$i++){
                            $rb_key=$op_dr_array[$i]['emp_id'];
                            $rb_value=$op_dr_array[$i]['emp_first_name']." ".$op_dr_array[$i]['emp_last_name'];
                            echo "<option value='".$rb_key."'>".$rb_value."</option>";
                        }
                        ?>
                        </select>
                    </div>
                </div>  
               <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>Attending Nurses List</label>
                        <select multiple name="ipd_gen_staff_list[]" class="form-control input-md">
                        <option value=''> -- Select Nursing Staff -- </option>
                        <?php 
                        for($i=0;$i<$nursing_staff_count;$i++){
                            $rb_key=$nursing_staff_array[$i]['emp_id'];
                            $rb_value=$nursing_staff_array[$i]['emp_first_name']." ".$nursing_staff_array[$i]['emp_last_name'];
                            echo "<option value='".$rb_key."'>".$rb_value."</option>";
                        }
                        ?>
                        </select>
                    </div>
                </div>
 
                <div class="col-sm-4">
                    <label>Bed/Room Allocation</label>
                    <select type="text" name="rbid" id="rbid" class="form-control input-md" >
                        <option value=''> -- Select Room/Bed -- </option>
                        <?php 
                        for($i=0;$i<$rb_count;$i++){
                            $rb_key=$room_bed_array[$i]['rbid'];
                            $rb_value=$room_bed_array[$i]['room_no']."-".$room_bed_array[$i]['bed_no'];
                            echo "<option value='".$rb_key."'>".$rb_value."</option>";
                        }
                        ?>
                    </select>
                      </div>                
                <div class="col-sm-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="operation_reqd"> Operation Required?
                          </label>
                        </div>
                    <!-- Operating Doctor Name ??? -->
                    
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



