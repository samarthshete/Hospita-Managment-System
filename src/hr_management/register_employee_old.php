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
include_once 'connection.php';
$document_query="SELECT `id`, `document_name`, `document_folder` FROM document_master";
$result = mysqli_query($con, $document_query);
$doc_array = mysqli_fetch_all($result,MYSQLI_ASSOC);
$doc_count=count($doc_array);
//for($i=0;$i<$doc_count;$i++){
//    echo "Array 0 =".$doc_array[$i]['id']." ".$doc_array[$i]['document_name'].'<br>';
//}
$dept_query="SELECT `dept_id`, `dept_name` FROM departments";
$result = mysqli_query($con, $dept_query);
$dept_array = mysqli_fetch_all($result,MYSQLI_ASSOC);
$dept_count = count($dept_array);

?>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Employee Registration</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="src/hr_management/update_emp_data.php" method="post">
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active" id="GI"><a href="#general-info" data-toggle="tab"><i class="fa fa-user"></i> General Info <span class="badge bg-orange"> STEP-1</span></a></li>
                                <li id="Document"><a href="#document" data-toggle="tab"><i class="fa fa-file-o"></i> Documents <span class="badge bg-orange">STEP-2</span></a></li>
                                <li id="OI"><a href="#official-info" data-toggle="tab"><i class="fa fa-user-plus"></i> Official Data <span class="badge bg-orange">STEP-3</span></a></li>
                                <li id="Approval"><a href="#approval" data-toggle="tab"><i class="fa fa-check-square"></i> HR Approvals <span class="badge bg-orange">STEP-4</span></a></li>

                            </ul>
                            </ul>
                            <div class="tab-content" style="min-height: 300px;">
                                <div class="active tab-pane" id="general-info"  style="min-height:250px;">
                                    <div class="row">  
                                        <div class="form-group col-md-1">
                                            <label for="register_employee_prefix">Prefix</label>
                                            <select class="form-control" id="emp_prefix" name="emp_prefix">
                                                <option value="">-Select-</option>
                                                <option value="Mr.">Mr.</option> 
                                                <option value="Mrs.">Mrs.</option>  
                                                <option value="Ms.">Ms.</option>  
                                                <option value="Dr.">Dr.</option>
                                                <option value="Prof.">Prof.</option>  
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="register_employee_first_name">First Name</label>
                                            <input type="text" class="form-control" id="emp_first_name" name="emp_first_name" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="register_employee_first_name">Middle</label>
                                            <input type="text" class="form-control" id="emp_middle_name" name="emp_middle_name" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="register_employee_last_name">Last Name</label>
                                            <input type="text" class="form-control" id="emp_last_name" name="emp_last_name" value="">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="register_employee_gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">-Select-</option>
                                                <option value="Male">Male</option> 
                                                <option value="Female">Female</option>  
                                                <option value="ND">ND</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="register_employee_address">Address</label>
                                            <input type="text" class="form-control" id="address1" name="address1">
                                            <input type="text" class="form-control" id="address2" name="address2">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="register_employee_city_pincode">City & Pin code</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="register_employee_state_country">State & Country</label>
                                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                                            <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label for="register_employee_mobile_nos">Mobile No(s)</label>
                                            <input type="text" class="form-control" id="mobile_nos" name="mobile_nos" value="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="register_employee_landline_nos">Landline No(s)</label>
                                            <input type="text" class="form-control" id="landline_nos" name="landline_nos" value="">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="register_employee_email_id">Email Id</label>
                                            <input type="email" class="form-control" id="emp_email_id" name="emp_email_id" value="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="register_employee_aadharcard_no">Aadhar Card No</label>
                                            <input type="text" class="form-control" id="emp_aadhar_card_no" name="emp_aadhar_card_no" placeholder="Enter 12 Digit No.">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="register_employee_emp_pancard_no">Pan Card No</label>
                                            <input type="text" class="form-control" id="emp_pancard_no" name="emp_pancard_no" placeholder="Enter 12 Digit No.">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="register_employee_emp_passport_no">Passport No</label>
                                            <input type="text" class="form-control" id="emp_passport_no" name="emp_passport_no" placeholder="Enter 12 Digit No.">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="document"  style="min-height:250px;">
                                    <div class="row">  
                                        <table class=" table table-responsive">
                                            <thead>
                                            <th>File Type </th><th>Action</th>
                                            </thead>
                                            
                                        <?php
                                        for($i=0;$i<$doc_count;$i++){
                                            echo '<tr>';
                                            echo '<td>'.$doc_array[$i]['document_name'].'</td>';
                                            echo '<td> <input type="file" name="fileToUpload[]"></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="official-info"  style="min-height:250px;">
                                    <div class="row">  
                                      
                                        <div class="form-group col-md-6">
                                            <label for="register_employee_dept_id">Department ID</label>
                                            <select type="text" class="form-control" id="dept_id" name="dept_id">
                                                <option value="">Select Department</option>
                                                                                    <?php
                                        for($i=0;$i<$dept_count;$i++){
                                            echo '<option value="'.$dept_array[$i]['dept_id'].'">'.$dept_array[$i]['dept_name'].'</option>';
                                        }
                                        ?>
                                                </select>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="register_employee_type">Job Type</label>
                                            <select class="form-control" id="job_type" name="job_type">
                                                <option value="0">Select Type</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Part_Time">Part_Time</option>
                                                <option value="Consultant">Consultant</option>
                                                <option value="Visiting Doctors">Visiting Doctors</option>
                                                <option value="Internt">Intern</option>
                                                <option value="Others">Others</option>

                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label for="register_employee_type_emp_designation">Employee Designation</label>
                                            <select class="form-control" id="emp_designation" name="emp_designation">
                                                <option value="0">Select</option>
                                                <option value=" Medical Staff"> Medical Staff</option>
                                                <option value=" Nurses"> Lab Staff</option>
                                                <option value=" Nurses"> Nursing Staff</option>
                                                <option value="Clerical staff">Clerical staff</option>
                                                <option value="Information technology staff">Information technology staff</option>
                                                <option value="Food services staff">Food services staff</option>
                                                <option value="Pharmacy staff">Pharmacy staff</option> </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="register_employee_specialities">Specialities</label>
                                            <input type="text" class="form-control" id="specialities" name="specialities" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="register_employee_date_of_birth">Birth Date</label>
                                            <input type="date" class="form-control" id="emp_date_of_birth" name="emp_date_of_birth" value="<?php echo $emp_date_of_birth; ?>">
                                        </div> 
                                        <div class="form-group col-md-3">
                                            <label for="register_employee_joining_date">Joining Date</label>
                                            <input type="date" class="form-control" id="joining_date" name="joining_date" value="">
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="approval"  style="min-height:250px;">
                                    <div class="row col-md-12">
                                        <div class="form-group col-md-2">
                                            <label for="register_employee_id">Emp Reg. No</label>
                                            <input type="number" class="form-control" id="reg_no" name="reg_no"  placeholder="Reg.No/Code">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="register_employee_emp_duty_timing_in">Emp Duty Timing_in</label>
                                            <input type="time" class="form-control" id="emp_duty_timing_in" name="emp_duty_timing_in" value="">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="register_employee_emp_duty_timing_out">Emp Duty Timing Out</label>
                                            <input type="time" class="form-control" id="emp_duty_timing_out" name="emp_duty_timing_out">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="register_employee_exit_date">Exit Date</label>
                                            <input type="date" class="form-control" id="exit_date" name="exit_date">
                                        </div>
                                        <!--div class="form-group col-md-3">
                                            <label for="register_employee_document_ref_idlist">Document Ref<br> ID List</label>
                                            <input type="text" class="form-control" id="document_ref_idlist" name="document_ref_idlist">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="register_employee_document_path_list">Document Path<br> List</label>
                                            <input type="text" class="form-control" id="document_path_list" name="document_path_list">
                                        </div-->

                                    </div>
                                </div>
                            </div>
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


