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
        echo "<script>alert(\"Patient Enters for Pre-Exam Checkup\");\"</script>";
if (isset($_GET['id']) && !empty($_GET['id'])) {
$patient_id=$_GET['id'];

include_once 'connection.php';

    $today =  date("Y-m-d");
    $dept_query = "SELECT dept_id, dept_name FROM departments WHERE visible_on_website='1' ";
    $result = mysqli_query($con, $dept_query);
    $dept_id_array=array('0');
    $dept_name_array=array('Select Department');
    $dept_count=0;
    while ($row = mysqli_fetch_array($result)){ 
        $dept_id_array[] = $row['dept_id'];
        $dept_name_array[] = $row['dept_name'];
    $dept_count++; }
    $patient_master_query = "SELECT patient_code, patient_type,first_name,last_name FROM patient_master WHERE patient_id='$patient_id' ";
    $result = mysqli_query($con, $patient_master_query);
    if($row = mysqli_fetch_array($result)){
        $patient_code_type = $row['patient_code']." # ".$row['patient_type'];
        $patient_fullname = $row['first_name']." ".$row['last_name'];
    } else {}
    
}
?>

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Patient Pre Diagnosis Data</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="dashboard.php?page=update_preexam_data&id=<?php echo $patient_id;?>" method="post">
                  <div class="box-body">
                    <div class="form-group col-md-4">
                      <label for="patient_code">Patient Code # type</label>
                      <input type="text" class="form-control" id="patient_code" name="patient_code" readonly value='<?php echo $patient_code_type;?>'>
                    </div>
                    <div class="form-group col-md-8">
                      <label for="patient_code">Patient Name</label>
                      <input type="text" class="form-control" id="patient_fullname" name="patient_fullname" readonly value='<?php echo $patient_fullname;?>'>
                    </div>                      
                    <div class="form-group col-md-3">
                      <label for="patient_data_blood_grp">Blood Group</label>
                      <select class="form-control" id="bloodgrp" name="bloodgrp" >
                          <option value="0">Select Group</option>
                          <option value="O+Ve">O+Ve</option>
                          <option value="O-Ve">O-Ve</option>
                          <option value="A+Ve">A+Ve</option>
                          <option value="A-Ve">A-Ve</option>
                          <option value="B+Ve">B+Ve</option>
                          <option value="B-Ve">B-Ve</option>
                          <option value="AB+Ve">AB+Ve</option>
                          <option value="AB-Ve">AB-Ve</option>
                      </select>
                    </div>
                      <div class="form-group col-md-3">
                      <label for="patient_data_Tempreture">Tempreture(in deg F)</label>
                       <input type="number" class="form-control" id="tempreture" name="tempreture" step="0.1" placeholder="Enter tempreture.">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="patient_data_height">Height (in Cms)</label>
                      <input type="number" class="form-control" id="height" name="height" min="10" max="300">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="weight">Weight (kg)</label>
                      <input type="number" class="form-control" id="weight" name="weight" min="1" max="500" step="0.1">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="patient_data_blood_pressure_systolic">BP Systolic</label>
                      <input type="text" class="form-control" id="blood_pressure_systolic" name="blood_pressure_systolic" placeholder="mmHg.">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="patient_data_blood_pressure_diastolic">BP Diastolic</label>
                      <input type="text" class="form-control" id="blood_pressure_diastolic" name="blood_pressure_diastolic" placeholder="mmHg.">
                    </div>
                      
                    <div class="form-group col-md-3">
                      <label for="patient_data_heart_rate">Heart Rate</label>
                       <input type="text" class="form-control" id="heart_rate" name="heart_rate" placeholder="60-100/min">
                     
                    </div>
                    <div class="form-group col-md-3">
                      <label for="patient_data_resp_rate">Resp Rate</label>
                      <input type="text" class="form-control" id="resp_rate" name="resp_rate" placeholder="12-18/min">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="patient_data_symptoms">Symptoms</label>
                      <textarea class="form-control" rows="2" id="symptoms" name="symptoms"></textarea>
                    </div>
                      <div class="form-group col-md-4">
                          <label for="patient_data__treatment_plan">Treatment Plan</label>
                          <textarea class="form-control" rows="2" id="treatment_plan" name="treatment_plan"></textarea>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="patient_data_next_actions">Next Suggestions</label>
                          <textarea  class="form-control" rows="2" id="next_actions" name="next_actions" value=""></textarea>
                      </div>
                       <div class="form-group col-md-4">
                      <label>
                        <input type="checkbox" name="checkout"> Tickmark if OK to Checkout? OR  
                      </label>
                    </div>                      
                      <div class="form-group col-md-8">
                          <label for="patient_data_dept_assigned">Post-Exam needed from</label>
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

