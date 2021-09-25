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
$nowdatetime = strftime('%Y-%m-%dT%H:%M:%S', strtotime(date("Y-m-d")));
?>
<section class="content-header">
    <h1>IPD Registration</h1>
    <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">IPD Master Records </li>
    </ol>
</section>
<div class="container">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">IPD Patient Reg. Form</h3>
    </div><!-- /.box-header -->
    <!-- form start -->

    <form class="form-horizontal" action="src/queue_handler/save_appointment_direct.php" method="post">
        <div class="box-body">
            <div class="col-md-12">
                <div class="row">
                 <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="first_name" name="first_name" id="first_name" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                        
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                        <div class="validation"></div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                        <div class="validation"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-3">
                    <div class="form-group">
                        <label>Email Id</label>
                        <input type="email_id" name="email_id" id="email_id" class="form-control input-md" data-rule="email" data-msg="Please enter a valid email_id">
                        <div class="validation"></div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-4 col-md4">
                        <label>IPD Admission Date</label>
                        <input type="datetime-local" name="ipd_admission_date" id="operation_reqd" class="form-control" value="2018-02-23T00:00:00">
                        <div class="validation"></div>
                    </div>
                 <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>Mobile number</label>
                        <input type="text" name="mobile_nos" id="mobile_nose" class="form-control input-md" data-rule="required" data-msg="The  number is required">
                        <div class="validation"></div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control input-md" data-rule="required" data-msg="The  number is required">
                        <div class="validation"></div>
                    </div>  
                </div>
                <div class="col-xs-4 col-sm-4 col-md4">
                        <label>IPD Admission Date</label>
                        <input type="datetime-local" name="ipd_admission_date" id="operation_reqd" class="form-control" value="<?php echo $nowdatetime; ?>">
                        <div class="validation"></div>
                    </div>  
                </div>

                <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>Attending Doctor Name</label>
                        <input type="text" name="ipd_attending_doctor_id" id="ipd_attending_doctor_id" class="form-control input-md" data-rule="required" data-msg="The  number is required">
                        <div class="validation"></div>
                    </div>
                </div>  
               <div class="col-xs-4 col-sm-4 col-md4">
                    <div class="form-group">
                        <label>Attending Nurses List</label>
                        <input type="text" name="ipd_gen_staff_list" id="ipd_gen_staff_list" class="form-control input-md" data-rule="required" data-msg="The  number is required">
                        <div class="validation"></div>
                    </div>
                </div>
 
                <div class="col-sm-4">
                    <label>Bed/Room Allocation</label>
                        <input type="text" name="ipd_gen_staff_list" id="ipd_gen_staff_list" class="form-control input-md" data-rule="required" data-msg="The  number is required">
                      </div>                
            </div>
                <div class="col-sm-6">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="operation_reqd"> Operation Required?
                          </label>
                        </div>
                    <!-- Operating Doctor Name ??? -->
                    
                      </div>             
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <button type="reset" onclick="window.location.href = 'dashboard.php';" class="btn btn-warning"><i class="fa fa-ban">  </i> Cancel</button>
            <button type="submit" class="btn btn-info pull-right" name="submit"><i class="fa fa-database">  </i> Save New appointments Record</button>
        </div><!-- /.box-footer -->
    </form>
</div><!-- /.box -->
</div>

