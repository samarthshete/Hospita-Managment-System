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

$table = 'users';

if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    date_default_timezone_set('asia/kolkata');
    $created_by = $_SESSION['ActiveUserId'];
    $created_on = date("Y-m-d H:i:s");
if (isset($_POST['submit']) && empty($_GET['action'])) {
    require_once 'connection.php';
    $strsql = "SELECT MAX(tax_id) uid FROM ".$table;
    $result = mysqli_query($con, $strsql);
    $arr_result = mysqli_fetch_array($result);
    $NextRecordNo = $arr_result['uid'] + 1;
    //echo "Next Rec. = ".$intRecordNo;
    $user_id = $NextRecordNo;
    $role_id=$POST['role_id'];
    $dept_id = $POST['dept_id '];
    $username = $POST['username'];
    $login = $POST['login'];
    $password = md5($POST['password']);
    $email_id = $POST['email_id'];
    $mobile_no = $POST['$mobile_no'];
    $photo = $POST['photo'];
    $active = empty($_POST['active'])?'0':'1';
    $table_fields = "user_id,role_id,dept_id,username,login,password,email_id,mobile_no,active,photo";
    $table_values = "'$user_id','$role_id','$dept_id','$username','$login','$password','$email_id','$mobile_no','$active','$photo'";
    $table_query = "INSERT INTO $table (".$table_fields.") VALUES (".$table_values.")";
    if (mysqli_query($con, $table_query)) {
        echo "<script>alert('New record is added successfully to $table master');window.location.href='dashboard.php?page=tax_test';</script>";
    } else {
        echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=tax_test';</script>";
    }
} elseif (isset($_GET['action'])) {
    
    $action = $_GET['action'];
    if (isset($_GET['id'])) {$id = $_GET['id'];} 
    switch ($action) {
        case 'edit':
            $role_id = $POST['role_id'];
            $dept_id = $POST['dept_id '];
            $username = $POST['username'];
            $login = $POST['login'];
            $password = md5($POST['password']);
            $email_id = $POST['email_id'];
            $mobile_no = $POST['$mobile_no'];
            $photo = $POST['photo'];
            $active = empty($_POST['active']) ? '0' : '1';

            $table_fields_values = "role_id='$role_id',dept_id='$dept_id ',username='$username',login='$login',password = '$password',email_id='$email_id',mobile_no='$mobile_no',photo='$photo',active='$active'";
            $table_query = "UPDATE $table SET $table_fields_values WHERE user_id='$id'";
            if (mysqli_query($con, $table_query)) {
                echo "<script>alert('Record No.$id is Updated successfully to $table');window.location.href='dashboard.php?page=tax_test';</script>";
            } else {
                echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=tax_test';</script>";
            }
            break;
        case 'delete':
            
            $table_query = "DELETE FROM ".$table." WHERE user_id='".$id."'";
            if (mysqli_query($con, $table_query)) {
                echo "<script>alert('Record No.$id is Deleted successfully to $table');window.location.href='dashboard.php?page=tax_test';</script>";
            } else {
                echo "<script>alert('ERROR: 001 - This record can't be added ...');window.location.href='dashboard.php?page=tax_test';</script>";
            }

            break;
        //case 'display': break;
        case 'import': break;
        case 'export': break;
        case 'print': break;
        default: echo 'Entered into DEFAULT CASE PART';
    }
}
?>

    <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Master Records
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $table; ?> Master Records </li>
    </ol>
</section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!------CONTROL TABS START------>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li><button class="btn btn-block btn-warning" href="import.php?action=import&t=<?php echo $table; ?>" target="_blank"><i class="fa fa-upload"></i>&nbsp;&nbsp;Import</button>&nbsp;&nbsp;<li>
                        <li><button class="btn btn-block btn-warning" href="printpdf.php?action=print&t=<?php echo $table; ?>" target="_blank"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</button>&nbsp;&nbsp;<li>
                        <li><button class="btn btn-block btn-primary" href="export.php?action=export&t=<?php echo $table; ?>" target="_blank"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;CSV</button>&nbsp;&nbsp;</li>
                        <li><a href="#add" data-toggle="tab" class="btn bg-green-active"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;New <?php echo $table; ?></a></li>
                        <li class="active"><a href="#list" data-toggle="tab" class="btn bg-primary"><i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo $table; ?> List </a></li>
                        <li class="pull-left header"><i class="fa fa-th"></i> Manage <?php echo $table; ?><li>
                    </ul> 
                    <div class="tab-content">
                        <!----TABLE LISTING STARTS-->
                        <div class="tab-pane active" id="list">
                            <div class="box">
                                <div class="box-body table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>user_id</th>
                                                    <th>role_id</th>
                                                    <th>department_id</th>
                                                    <th>username</th>
                                                    <th>login</th>
                                                    <th>password</th>
                                                    <th>email_d</th>
                                                    <th>mobile_no</th>
                                                    <th>active</th>
                                                    <th>photo</th>
                                                    <th class="text-right">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once 'connection.php';
                                                $table_query = "select * FROM ".$table;
                                                $result = mysqli_query($con, $table_query);
                                                while ($uresult_array = mysqli_fetch_array($result)) {
                                                    echo "<tr>";
                                                    echo "<td>".$uresult_array['user_id']."</td>";
                                                    echo "<td>".$uresult_array['role_id']."</td>";
                                                    echo "<td>".$uresult_array['dept_id']."</td>";
                                                    echo "<td>".$uresult_array['username']."</td>";
                                                    echo "<td>".$uresult_array['login']."</td>";
                                                    echo "<td>".$uresult_array['password']."</td>";
                                                    echo "<td>".$uresult_array['email_d']."</td>";
                                                    echo "<td>".$uresult_array['mobile_no']."</td>";
                                                    echo "<td>".$uresult_array['active']."</td>";
                                                    echo "<td>".$uresult_array['photo']."</td>";
                                                    echo "<td>";
                                                    echo '<a data-id="'.$uresult_array['user_id'].'-'.$uresult_array['role_id'].'-'.$uresult_array['dept_id'].'-'.$uresult_array['username'] .'-'.$uresult_array['email_d'] .'-'.$uresult_array['mobile_no'].'-'.$uresult_array['photo'].'-'.$uresult_array['active'].'" title="Add this item" class="open-ReceiveDuesDialog btn btn-info btn-flat btn-xs" href="#UserModal">Edit</a>';
                                                    echo '&nbsp;&nbsp<a onclick="return delFunction();"  class="btn btn-warning btn-flat btn-xs" href="dashboard.php?page=tax_test&action=delete&id='. $uresult_array['user_id'] .'" >Delete</a>';
                                                    echo "</td>";
                                                    echo "<tr>";
                                                }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="add" style="padding: 5px">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">New <?php echo $table; ?> Form</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" action="" method="post">
                                    <div class="box-body">
                                        <input type="hidden" name="tax_id" id="tax_id" value="">
                                        <div class="form-group">
                                            <label for="tax_master-tax_title" class="col-sm-2 control-label">Tax Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tax_title" name="tax_title" placeholder="Enter Tax Title">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tax_master-tax_code" class="col-sm-2 control-label">Tax Short Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tax_code" name="tax_code" placeholder="Enter Short Name for Tax">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tax_master-tax_calc_mode" class="col-sm-2 control-label">Tax Calculation Mode</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="tax_calc_mode" name="tax_calc_mode">
                                                    <option value="fixed">Fixed Rate</option>
                                                    <option value="percent">As % of value</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax_master-rate" class="col-sm-2 control-label">Percent Rate /Value</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="0.01" class="form-control" id="rate" name="rate" placeholder="Percent Rate /Value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <!--input type="hidden" name="approvals_display" value="0" -->
                                                    <input type="checkbox" name="active" checked> Activate this Tax Item?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="reset" onclick="window.location.href = 'dashboard.php';" class="btn btn-warning"><i class="fa fa-ban">  </i> Cancel</button>
                                <button type="submit" class="btn btn-info pull-right" name="submit"><i class="fa fa-database">  </i> Save New <?php echo $table; ?> Record</button>
                            </div><!-- /.box-footer -->
                            </form>
                        </div><!-- /.box -->             

                    </div>
                </div>
            </div>
        </div>
    </section>
 <!-- Modal -->
<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <!--form id="crud_form" class="form-horizontal" role="form" action="src/accounts/take.php" method="post"-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">User Record Updation</h4>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal" role="form" action="dashboard.php?page=crud_user&action=edit" method="post">
                      <div class="col-md-12">
                          <div class="col-md-4">
                          <div class="form-group">
                              <label for="takefee-rollno">User Id</label>
                              <input type="text" class="form-control" name="user_id" id="user_Id" readonly>
                          </div>
                          </div>
                          <div class="col-md-4">
                          <div class="form-group">
                              <label for="takefee-name">Role Id</label>
                              <input type="text" class="form-control"name="role_id" id="role_Id" readonly="">
                          </div>
                          </div>
                          <div class="col-md-4">
                          <div class="form-group">
                              <label for="takefee-name">Dept_Id</label>
                              <input type="text" class="form-control"name="dept_id" id="dept_Id" >
                          </div>
                          </div>
                          <div class="form-group">
                              <label for="takefee-name">Email Id</label>
                              <input type="text" class="form-control"name="username" id="user_name" >
                          </div> 
                          <div class="form-group">
                              <label for="takefee-name">Email Id</label>
                              <input type="text" class="form-control"name="email_id" id="email_Id" >
                          </div> 
                          <div class="form-group">
                              <label for="takefee-name">Mobile No</label>
                              <input type="text" class="form-control"name="mobile_no" id="mobile_No" >
                          </div>
                          <div class="form-group">
                              <label for="takefee-rollno">Photo Name</label>
                              <input type="text" class="form-control" name="photo" id="Photo">
                          </div>
                          <div>
                              <label>
                                  <input type="number" id='active'  name="active" min='0' max='1' step='1'> Current Activation
                              </label>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit for Updation</button>
                  </form>
              </div>
          </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="assets/js/jquery.min.js"></script>
<script>
    $(document).on("click", ".open-ReceiveDuesDialog", function (e) {
e.preventDefault();
var _self = $(this);
var myData = _self.data('id');
$("#userId").val(myData);
var res = myData.split("-");
$("#user_Id").val(res[0]);
$("#role_Id").val(res[1]);
$("#dept_Id").val(res[2]);
$("#user_name").val(res[3]);
$("#email_Id").val(res[4]);
$("#mobile_No").val(res[5]);
$("#Photo").val(res[6]);
$("#active").val(res[7]);
$(_self.attr('href')).modal('show');
});
</script>
<script>
function delFunction() {
    return confirm("Do you want to delete this record?");
}
document.getElementById("demo").innerHTML = myFunction(4, 3);
</script>

   <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>




