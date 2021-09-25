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
if (isset($_GET['id'])) {
// Start Typing from Here ....
    $filename = "data/symptoms-info.txt";
    $handle = fopen($filename, "r");
    $symptom_data = fread($handle, filesize($filename));
    fclose($handle);
    $filename = "data/treatment-info.txt";
    $handle = fopen($filename, "r");
    $treatment_data = fread($handle, filesize($filename));
    fclose($handle);
    $filename = "data/lab-info.txt";
    $handle = fopen($filename, "r");
    $lab_data = fread($handle, filesize($filename));
    fclose($handle);
    $today =  date("d-M-Y :");
    include_once 'connection.php';
    $patient_id = $_GET['id'];
    $check_if_patient_exits_query ="SELECT * FROM `patient_analysis` WHERE patient_id = '$patient_id '";
    $result = mysqli_query($con, $check_if_patient_exits_query);
    if ($row=mysqli_fetch_array($result)) {
        //Means Patient exists here.
        //Action : Copy old data here.
        $patient_complaint=$row['patient_complaint'];
        $family_history =$row['family_history'];
        $past_history = $row['past_history'];
        $other_info = $row['other_info'];
        $habits = $row['habits'];
        $disabilities = $row['disabilities'];
        $allergies = $row['allergies'];
        $prev_analysis = $row['prev_analysis'];
        $prev_treatment = $row['prev_treatment'];
        $prev_test = $row['prev_test'];
        $analysis = $row['analysis'];
        $treatment = $row['treatment'];
        $lab_tests_needed = $row['lab _tests_needed'];
        $next_action_planned = $row['next_action_planned'];
        $next_visit_required = $row['next_visit_required'];
        $next_visit_date = $row['next_visit_date'];
    } else {
        //Patient is visiting first time
        $patient_complaint='';
        $family_history = '';
        $past_history = '';
        $other_info = '';
        $habits = '';
        $disabilities = '';
        $allergies = '';
        $prev_analysis = '';
        $prev_treatment = '';
        $prev_test = '';
        $analysis = '';
        $treatment = '';
        $lab_tests_needed = '';
        $next_action_planned = '';
        $next_visit_required = '';
        $next_visit_date = '';
    }
      
    $patient_master_query = "SELECT patient_code, patient_type,first_name,last_name FROM patient_master WHERE patient_id='$patient_id' ";
    $result = mysqli_query($con, $patient_master_query);
    if ($row = mysqli_fetch_array($result)) {
        $patient_code_type = $row['patient_code'] . " # " . $row['patient_type'];
        $patient_fullname = $row['first_name'] . " " . $row['last_name'];
        $patient_data_query = "SELECT * FROM patient_data WHERE patient_id='$patient_id' ";
        $result = mysqli_query($con, $patient_data_query);
        if ($row = mysqli_fetch_array($result)) {
//        print_r($row);
            $bloodgrp = $row['bloodgrp'];
            $temperature = $row['temperature'];
            $height = $row['height'];
            $weight = $row['weight'];
            $blood_pressure = $row['blood_pressure'];
            $heart_rate = $row['heart_rate'];
            $resp_rate = $row['resp_rate'];
            $symptoms = $row['symptoms'];
            $treatment_plan = $row['treatment_plan'];
            $test_required = $row['test_required'];
        } else {
            echo "<script>alert('This Patinet is not Pre-Examed Yet...');window.location.href='dashboard.php'</script>'";
        }
            
    } else {
        echo "<script>alert('Error Patient Diagnosis Module: Patinet Record in Database is missing');window.location.href='dashboard.php'</script>'";
    }
    ?>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: rgba(255,255,255,0.7) !important;
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            margin-right: 2px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
            border-color: #367fa9;
            padding: 1px 10px;
            color: #fff;
        }  

    </style>
    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <i class="fa fa-list-alt"></i> Tag Words </h3>
                    </div>
                    <div class="box-body">
                        <div class="box-group" id="accordion">
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            for <i class="fa fa-user-plus"></i> Analysis
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="box-body">
    <?php echo $symptom_data; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-danger">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            for <i class="fa fa-user-md"></i> Analysis
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="box-body">
    <?php echo $treatment_data; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-success">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            for <i class="fa fa-flask"></i> LabTests
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="box-body">
    <?php echo $lab_data; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div> 
            <div class="col-md-9">
                <div class="form-group col-md-4">
                    <label for="patient_code">Patient Code # type</label>
                    <input type="text" class="form-control" id="patient_code" name="patient_code" readonly value='<?php echo $patient_code_type; ?>'>
                </div>
                <div class="form-group col-md-8">
                    <label for="patient_code">Patient Name</label>
                    <input type="text" class="form-control" id="patient_fullname" name="patient_fullname" readonly value='<?php echo $patient_fullname; ?>'>
                </div>   
                <form id="new-user-form" action="src/admission/update_patient_diagnosis.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $patient_id;?>">
                    <div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active" id="PR"><a href="#patient-reporting" data-toggle="tab"><i class="fa fa-user"></i> Patient Reporting <span class="badge bg-orange">1</span></a></li>
                                <li id="CD"><a href="#clinical-data" data-toggle="tab"><i class="fa fa-medkit"></i> Clinical Data <span class="badge bg-orange">2</span></a></li>
                                <li id="DA"><a href="#doctoranalysis" data-toggle="tab"><i class="fa fa-user-md"></i> Principal diagnosis <span class="badge bg-orange">3</span></a></li>
                                <li id="LT"><a href="#labtests" data-toggle="tab"><i class="fa fa-flask"></i> Lab-Tests <span class="badge bg-orange">4</span></a></li>
                            </ul>
                            <div class="tab-content" style="min-height: 500px;">
                                <div class="active tab-pane" id="patient-reporting"  style="min-height:450px;">
                                    <div class="row">  
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">Patient Complaint</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" row="3" id="patient_complaint" name="patient_complaint"  value='<?php echo $patient_complaint; ?>'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required ">Family History</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="family_details" name="family_details" value='<?php echo $family_details; ?>'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">Past History</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="past_history" name="past_history" rows="2" cols="30"  value='<?php echo $past_history; ?>'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 required">Allergies</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="allergies" name="allergies" rows="2" cols="30"  value='<?php echo $allergies; ?>'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label  col-md-3 required">Prev._Analysis</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="prev_analysis" name="prev_analysis" rows="2" cols="30"  value='<?php echo $prev_analysis; ?>'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label  col-md-3 required">Prev_Treatment</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="prev_treatment" name="prev_treatment" rows="2" cols="30"  value='<?php echo $prev_treatment; ?>'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 required">Prev_Test</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="prev_test" name="prev_test" rows="2" cols="30"  value='<?php echo $prev_test; ?>'></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.tab-pane Patient Reporting -->
                                <div class="tab-pane" id="clinical-data" style="min-height:450px;">
                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                            <label class="control-label col-md-3 required">Blood Group</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="Bloodgrp"> 
                                                    <option value="0">---  Select  ---</option>
                                                    <option value="1">A +ve</option>";
                                                    <option value="2">B +ve</option>";
                                                    <option value="3">AB +ve</option>";
                                                    <option value="4">O +ve</option>";
                                                    <option value="5">A -ve</option>";
                                                    <option value="6">B -ve</option>";
                                                    <option value="7">AB -ve</option>";
                                                    <option value="8">O -ve</option>";
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">Temperature</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="Temperature" name="Temperature" value="<?php echo $temperature; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">Height</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Height" name="Height" value="<?php echo $height; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">Weight</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Weight" name="Weight" value="<?php echo $weight; ?>">                                     </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Bld Pressure</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control required" id="Blood Pressure" name="Blood Pressure" value="<?php echo $blood_pressure; ?>"> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">HeartRate</label>
                                            <div class="col-sm-9">
                                                <input type="text"class="form-control" id="Heart Rate" name="Heart Rate" value="<?php echo $heart_rate; ?>">                                  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">Resp Rate</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Respiratory Rate" name="Respiratory Rate"value="<?php echo $resp_rate; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">Symptoms Found</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="symptoms" name="symptoms" value="<?php echo $symptoms; ?>"></textarea>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 required">Treatment Plan</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="treatment_plan" name="treatment_plan" value="<?php echo $treatment_plan; ?>"></textarea>
                                            </div>
                                        </div>                                        

                                    </div>
                                </div> 
                                <!--/.tab-pane Clinical Data Records--> 
                                <div class="tab-pane" id="doctoranalysis" style="min-height:450px;">
                                    <div class="form-group ">
                                        <label class="control-label col-md-2 required">Other Info</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="other_info" name="other_info" value='<?php echo $other_info; ?>'>                                 
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-2 required">Habits</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="habits" name="habits" value='<?php echo $habits; ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-2 required">Disabilities</label>
                                        <div class="col-md-10">
                                            <input typr="text" class="form-control" id="disabilities" name="disabilities" value='<?php echo $disabilities; ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-2 required">Analysis</label>
                                        <div class="col-md-10">
                                            <textarea row="3" class="form-control" id="analysis" name="analysis"><?php echo $analysis."\r".$today."\r"; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-2 required">Treatment</label></textarea>
                                        <div class="col-md-10">
                                            <textarea row="3"  class="form-control" id="treatment" name="treatment" ><?php echo $treatment."\r".$today."\r"; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-2 required">Lab Tests<br> Needed</label>
                                        <div class="col-md-10">
                                            <textarea row="3"  class="form-control" id="lab _tests_needed" name="lab_tests_needed"><?php echo $lab_tests_needed."\r".$today."\r"; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-2 col-md-10">
                                        <br>
                                    <a  href="#presciption_modal" type="button" class="btn btn-warning"id="posttests">Create Prescription</a>
                                    <br><br>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 required">Next Action<br>Planned</label>
                                        <div class="col-md-10">
                                            <textarea row="3"  class="form-control" id="next_action_planned" name="next_action_planned"  value='<?php echo $next_action_planned; ?>'></textarea>
                                         </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-md-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="next_visit_required" id="next_visit_required"> Next Visit Planned?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 required">Next Visit<br> Fixed On</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control" id="next_visit_date" name="next_visit_date">
                                        </div>
                                    </div>
                                    <!-- /.tab-pane Doctor Analysis -->
                                </div>
                                <!--</div>-->
                                <!--<h3>Lab Tests Needed</h3>-->
                                <div class="tab-pane" id="labtests" style="min-height:450px;">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Pathology Tests Needed</label>
                                                <select class="form-control select2" id="labtests" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
    <?php
    ////Table: lab_test_master//`test_id`, `test_name`
    include_once 'connection.php';
    $lab_test_query = "SELECT test_id, test_name, lab_test_groups.lab_test_group_title FROM lab_test_master JOIN lab_test_groups ON test_group_id=`lab_test_group_id` WHERE is_pathology_test='1'";
    $result = mysqli_query($con, $lab_test_query);
    while ($lab_test_array = mysqli_fetch_array($result)) {
        echo "<option value='" . $lab_test_array['test_id'] . "'>" . $lab_test_array['lab_test_group_title'] . "-" . $lab_test_array['test_name'] . "</option>";
    }
    ?>
                                                </select>  </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Radiology Tests Needed</label>
                                                <select class="form-control select2"id="radiotests" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
    <?php
    ////Table: lab_test_master//`test_id`, `test_name`
    include_once 'connection.php';
    $lab_test_query = "SELECT `test_id`, `test_name` FROM lab_test_master  WHERE is_radiology_test='1'";
    $result = mysqli_query($con, $lab_test_query);
    while ($lab_test_array = mysqli_fetch_array($result)) {
        echo "<option value='" . $lab_test_array['test_id'] . "'>" . $lab_test_array['test_name'] . "</option>";
    }
    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="checktests"> Post Lab Tests?
                                            </label>
                                        </div>
                                        <button type="button" class="btn btn-primary"id="posttests">Post Lab Tests</button>
                                        <p id="txtHint"></p>
                                    </div><!-- /.tab-pane Tests  -->

                                </div><!-- /.nav-tabs-custom -->
                            </div>
                        </div></div>
                    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding edusecArLangCss"> 
                        <div class="col-xs-6"> 
                            <button type="submit" name="submit" class="btn btn-block btn-primary" width="60px;">Save Data</button>
                        </div> 
                        <div class="col-xs-6"> 
                            <a class="btn btn-default btn-block" href="dashboard.php">Cancel</a></div> 
                    </div> 
                </form>
            </div><!-- /.col -->
        </div>
    </section><!-- /.content -->

    </section>
    </div><!-- /.col -->
    </div><!-- /.content-wrapper -->
<?php
    if (file_exists("modals/prescription_modal.php")) {
        include_once 'modals/prescription_modal.php';
    }
} else {
    echo "<script>alert('Error Patient Diagnosis Module: Paatient Id is Missing');window.location.href='dashboard.php'</script>'";
}
?>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#posttests").click(function () {
            var check_tests = $("#checktests").val();
            var lab_tests = toString($("#labtests").val());
            var radio_tests = $("#radiotests").val();


            alert('chkeck_tests :' + check_tests);
            alert('lab_tests :' + toString($("#labtests").val()));
        })
    })
</script>